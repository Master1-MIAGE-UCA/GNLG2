<?php

namespace FamilyTree365\LaravelGedcom\Utils;

use DB;
use FamilyTree365\LaravelGedcom\Events\GedComProgressSent;
use FamilyTree365\LaravelGedcom\Models\PersonAlia;
use FamilyTree365\LaravelGedcom\Models\PersonAsso;
use FamilyTree365\LaravelGedcom\Utils\Importer\Note;
use FamilyTree365\LaravelGedcom\Utils\Importer\Obje;
use FamilyTree365\LaravelGedcom\Utils\Importer\Repo;
use FamilyTree365\LaravelGedcom\Utils\Importer\Sour;
use FamilyTree365\LaravelGedcom\Utils\Importer\Subm;
use FamilyTree365\LaravelGedcom\Utils\Importer\Subn;
use Gedcom\Parser;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\StreamOutput;

class GedcomParser
{
    /**
     * Array of persons ID
     * key - old GEDCOM ID
     * value - new autoincrement ID.
     *
     * @var string
     */
    protected $persons_id = [];
    protected $subm_ids = [];
    protected $sour_ids = [];
    protected $obje_ids = [];
    protected $note_ids = [];
    protected $repo_ids = [];
    protected $conn = '';

    public function parse(
        $conn,
        string $filename,
        string $slug,
        bool $progressBar = null,
        $channel = ['name' => 'gedcom-progress1', 'eventName' => 'newMessage']
    ) {
        DB::disableQueryLog();
        //start calculating the time
        $time_start = microtime(true);
        $this->conn = $conn;
        //start calculating the memory - https://www.php.net/manual/en/function.memory-get-usage.php
        $startMemoryUse = round(memory_get_usage() / 1048576, 2);

        error_log("\n Memory Usage: ".$startMemoryUse.' MB');
        error_log('PARSE LOG : +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++'.$conn);
        $parser = new Parser();
        $gedcom = @$parser->parse($filename);

        /**
         * work.
         */
        $subn = [];
        $subm = [];
        $sour = [];
        $note = [];
        $repo = [];
        $obje = [];

        if ($gedcom->getSubn()) {
            $subn = $gedcom->getSubn();
        }
        if ($gedcom->getSubm()) {
            $subm = $gedcom->getSubm();
        }
        if ($gedcom->getSour()) {
            $sour = $gedcom->getSour();
        }
        if ($gedcom->getNote()) {
            $note = $gedcom->getNote();
        }
        if ($gedcom->getRepo()) {
            $repo = $gedcom->getRepo();
        }
        if ($gedcom->getObje()) {
            $obje = $gedcom->getObje();
        }

        /**
         * work end.
         */
        $c_subn = 0;
        $c_subm = count($subm);
        $c_sour = count($sour);
        $c_note = count($note);
        $c_repo = count($repo);
        $c_obje = count($obje);
        if ($subn != null) {
            $c_subn = 1;
        }
        $beforeInsert = round(memory_get_usage() / 1048576, 2);

        $individuals = $gedcom->getIndi();
        $families = $gedcom->getFam();
        $indCount = count($individuals);
        $famCount = count($families);
        $total = $indCount + $famCount + $c_subn + $c_subm + $c_sour + $c_note + $c_repo + $c_obje;
        $complete = 0;
        if ($progressBar === true) {
            $bar = $this->getProgressBar($indCount + $famCount);
            event(new GedComProgressSent($slug, $total, $complete, $channel));
        }
        Log::info('Individual:'.$indCount);
        Log::info('Families:'.$famCount);
        Log::info('Subn:'.$c_subn);
        Log::info('Subm:'.$c_subm);
        Log::info('Sour:'.$c_sour);
        Log::info('Note:'.$c_note);
        Log::info('Repo:'.$c_repo);

        try {
            // store all the media objects that are contained within the GEDCOM file.
            foreach ($obje as $item) {
                // $this->getObje($item);
                if ($item) {
                    $_obje_id = $item->getId();
                    $obje_id = Obje::read($this->conn, $item);
                    if ($obje_id != 0) {
                        $this->obje_ids[$_obje_id] = $obje_id;
                    }
                }
                if ($progressBar === true) {
                    $bar->advance();
                    $complete++;
                    event(new GedComProgressSent($slug, $total, $complete, $channel));
                }
            }
            // store information about all the submitters to the GEDCOM file.
            foreach ($subm as $item) {
                if ($item) {
                    $_subm_id = $item->getSubm();
                    $subm_id = Subm::read($this->conn, $item, null, null, $this->obje_ids);
                    $this->subm_ids[$_subm_id] = $subm_id;
                }
                if ($progressBar === true) {
                    $bar->advance();
                    $complete++;
                    event(new GedComProgressSent($slug, $total, $complete, $channel));
                }
            }

            if ($subn != null) {
                // store the submission information for the GEDCOM file.
                // $this->getSubn($subn);
                Subn::read($this->conn, $subn, $this->subm_ids);
                if ($progressBar === true) {
                    $bar->advance();
                    $complete++;
                    event(new GedComProgressSent($slug, $total, $complete, $channel));
                }
            }

            // store all the notes contained within the GEDCOM file that are not inline.
            foreach ($note as $item) {
                // $this->getNote($item);
                if ($item) {
                    $note_id = $item->getId();
                    $_note_id = Note::read($this->conn, $item);
                    $this->note_ids[$note_id] = $_note_id;
                }
                if ($progressBar === true) {
                    $bar->advance();
                    $complete++;
                    event(new GedComProgressSent($slug, $total, $complete, $channel));
                }
            }

            // store all repositories that are contained within the GEDCOM file and referenced by sources.
            foreach ($repo as $item) {
                // $this->getRepo($item);
                if ($item) {
                    $repo_id = $item->getRepo();
                    $_repo_id = Repo::read($this->conn, $item);
                    $this->repo_ids[$repo_id] = $_repo_id;
                }
                if ($progressBar === true) {
                    $bar->advance();
                    $complete++;
                    event(new GedComProgressSent($slug, $total, $complete, $channel));
                }
            }

            // store sources cited throughout the GEDCOM file.
            // obje import before sour import
            foreach ($sour as $item) {
                // $this->getSour($item);
                if ($item) {
                    $_sour_id = $item->getSour();
                    $sour_id = Sour::read($this->conn, $item, $this->obje_ids);
                    if ($sour_id != 0) {
                        $this->sour_ids[$_sour_id] = $sour_id;
                    }
                }
                if ($progressBar === true) {
                    $bar->advance();
                    $complete++;
                    event(new GedComProgressSent($slug, $total, $complete, $channel));
                }
            }
            ParentData::getPerson($this->conn, $individuals, $this->obje_ids, $this->sour_ids);

            foreach ($individuals as $individual) {
                // ParentData::getPerson($this->conn, $individual, $this->obje_ids);
                if ($progressBar === true) {
                    $bar->advance();
                    $complete++;
                    event(new GedComProgressSent($slug, $total, $complete, $channel));
                }
            }

            // complete person-alia and person-asso table with person table
            $alia_list = PersonAlia::on($conn)->select('alia')->where('group', 'indi')->where('import_confirm', 0)->get();
            foreach ($alia_list as $item) {
                $alia = $item->alia;
                if (isset($this->person_ids[$alia])) {
                    $item->alia = $this->person_ids[$alia];
                    $item->import_confirm = 1;
                    $item->save();
                } else {
                    $item->delete();
                }
            }

            $asso_list = PersonAsso::on($conn)->select('indi')->where('group', 'indi')->where('import_confirm', 0)->get();
            foreach ($asso_list as $item) {
                $_indi = $item->indi;
                if (isset($this->person_ids[$_indi])) {
                    $item->indi = $this->person_ids[$_indi];
                    $item->import_confirm = 1;
                    $item->save();
                } else {
                    $item->delete();
                }
            }

            FamilyData::getFamily($this->conn, $families, $this->obje_ids, $this->sour_ids, $this->persons_id, $this->note_ids, $this->repo_ids);

            foreach ($families as $family) {
                //     // $this->getFamily($family);
                // FamilyData::getFamily($this->conn, $family, $this->obje_ids);
                if ($progressBar === true) {
                    $bar->advance();
                    $complete++;
                    event(new GedComProgressSent($slug, $total, $complete, $channel));
                }
            }
        } catch (\Exception $e) {
            $error = $e->getMessage();

            return \Log::error($error);
        }

        if ($progressBar === true) {
            $time_end = microtime(true);
            $endMemoryUse = round(memory_get_usage() / 1048576, 2);
            $execution_time = ($time_end - $time_start);
            $beform_insert_memory = $beforeInsert - $startMemoryUse;
            $memory_usage = $endMemoryUse - $startMemoryUse;
            error_log("\nTotal Execution Time: ".round($execution_time).' Seconds');
            error_log("\nMemory Usage: ".$memory_usage.''.' MB');
            $bar->finish();
        }
    }

    private function getProgressBar(int $max)
    {
        return (new OutputStyle(
            new StringInput(''),
            new StreamOutput(fopen('php://stdout', 'w'))
        ))->createProgressBar($max);
    }
}
