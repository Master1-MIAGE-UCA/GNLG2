<?php

namespace FamilyTree365\LaravelGedcom\Utils;

use FamilyTree365\LaravelGedcom\Models\Family;
use FamilyTree365\LaravelGedcom\Models\Person;
use Gedcom\Gedcom;
use Gedcom\Record\Fam;
use Gedcom\Record\Fam\Even;
use Gedcom\Record\Fam\Slgs;
use Gedcom\Record\Head;
use Gedcom\Record\Head\Sour;
use Gedcom\Record\Indi;
use Gedcom\Record\Indi\Even as Personal;
use Gedcom\Record\Indi\Fams;
use Gedcom\Record\Indi\Name;
use Gedcom\Record\NoteRef;
use Gedcom\Record\ObjeRef;
use Gedcom\Record\SourRef;
use Gedcom\Record\Subm;
use Gedcom\Writer;

class GedcomGenerator
{
    protected $family_id;
    protected $p_id;
    protected $up_nest;
    protected $down_nest;
    protected $arr_indi_id = [];
    protected $arr_fam_id = [];
    protected $_gedcom = null;
    protected $log = "\n";

    /**
     * Constructor with family_id.
     *
     * @param int $p_id
     * @param int $family_id
     * @param int $up_nest
     * @param int $down_nest
     */
    public function __construct($p_id = 0, $family_id = 0, $up_nest = 0, $down_nest = 0)
    {
        $this->family_id = $family_id;
        $this->p_id = $p_id;
        $this->up_nest = $up_nest;
        $this->down_nest = $down_nest;
        $this->arr_indi_id = [];
        $this->arr_fam_id = [];
        $this->_gedcom = new Gedcom();
    }

    public function getGedcomFamily()
    {
        $this->setHead();
        $writer = new Writer();

        return $writer->convert($this->_gedcom);
    }

    public function getGedcomPerson()
    {
        $this->setHead();
        $this->addUpData($this->p_id);
        $writer = new Writer();

        return $writer->convert($this->_gedcom);
    }

    public function addUpData($p_id, $nest = 0)
    {
        if (empty($p_id) || $p_id < 1) {
            return;
        }

        if ($this->up_nest < $nest) {
            return;
        }

        /* $person = Person::query()->find($p_id);
        if ($person == null) {
            return;
        } */
        $persons = Person::query()->get();
        if ($persons == null) {
            return;
        }
        foreach ($persons as $key => $person) {
            $this->setIndi($person->id);
        }

        // add self to indi
        /* if (!in_array($p_id, $this->arr_indi_id)) {
            array_push($this->arr_indi_id, $p_id);
            $this->setIndi($p_id);
        } else {
            // already processed this person
            return;
        } */

        // process family ( partner, children )
        /* $_families = Family::query()->where('husband_id', $p_id)->orwhere('wife_id', $p_id)->get();
        foreach ($_families as $item) {
            // add family
            $f_id = $item->id;
            if (!in_array($f_id, $this->arr_fam_id)) {
                array_push($this->arr_fam_id, $f_id);
                $this->setFam($f_id);
            }

            // add partner to indi
            $husb_id = $item->husband_id;
            $wife_id = $item->wife_id;
            $this->log .= $nest.' f_id='.$f_id."\n";
            $this->log .= $nest.' husb_id='.$husb_id."\n";
            $this->log .= $nest.' wife_id='.$wife_id."\n";
            $this->addUpData($husb_id, $nest);
            $this->addUpData($wife_id, $nest);

            // add chidrent to indi
            $children = Person::query()->where('child_in_family_id', $f_id)->get();
            foreach ($children as $item2) {
                $child_id = $item2->id;
                if (!in_array($child_id, $this->arr_indi_id)) {
                    array_push($this->arr_indi_id, $child_id);
                    $this->setIndi($child_id);
                }
            }
        } */

        /* $parent_family_id = $person->child_in_family_id;
        $p_family = Family::query()->find($parent_family_id);

        // there is not parent data.
        if ($p_family === null) {
            return;
        }

        // process siblings
        $siblings = Person::query()->where('child_in_family_id', $parent_family_id)->get();
        foreach ($siblings as $item3) {
            $sibling_id = $item3->id;
            if (!in_array($sibling_id, $this->arr_indi_id)) {
                array_push($this->arr_indi_id, $sibling_id);
                $this->setIndi($sibling_id);
            }
        }

        // process parent
        $nest++;
        $father_id = $p_family->husband_id;
        $mother_id = $p_family->wife_id;
        $this->addUpData($father_id, $nest);
        $this->addUpData($mother_id, $nest); */
    }

    public function addDownData($p_id, $nest = 0)
    {
        if (empty($p_id) || $p_id < 1) {
            return;
        }
        if ($this->down_nest < $nest) {
            return;
        }

        $person = Person::query()->find($p_id);
        if ($person == null) {
            return;
        }

        // process self
        if (!in_array($p_id, $this->arr_indi_id)) {
            // add to indi array
            array_push($this->arr_indi_id, $p_id);
            $this->setIndi($p_id);
        }

        $_families = Family::query()->where('husband_id', $p_id)->orwhere('wife_id', $p_id)->get();
        foreach ($_families as $item) {
            // add family
            $f_id = $item->id;
            if (!in_array($f_id, $this->arr_fam_id)) {
                array_push($this->arr_fam_id, $f_id);
                $this->setFam($f_id);
            }
            // process partner
            $husband_id = $item->husband_id;
            $wife_id = $item->wife_id;
            $this->addDownData($husband_id, $nest);
            $this->addDownData($wife_id, $nest);

            // process child
            $children = Person::query()->where('child_in_family_id', $item->id);
            foreach ($children as $item2) {
                $child_id = $item2->id;
                $nest_next = $nest + 1;
                $this->addDownData($child_id, $nest_next);
            }
        }

        // process parent
        $parent_family_id = $person->child_in_family_id;
        $parent_family = Family::query()->find($parent_family_id);
        if ($parent_family != null) {
            $father_id = $parent_family->husband_id;
            $mother_id = $parent_family->wife_id;
            if (!in_array($father_id, $this->arr_indi_id)) {
                array_push($this->arr_indi_id, $father_id);
                $this->setIndi($father_id);
            }
            if (!in_array($mother_id, $this->arr_indi_id)) {
                array_push($this->arr_indi_id, $mother_id);
                $this->setIndi($mother_id);
            }
        }
        // process siblings
        $siblings = Person::query()->where('child_in_family_id', $parent_family_id)->get();
        foreach ($siblings as $item3) {
            $sibling_id = $item3->id;
            if (!in_array($sibling_id, $this->arr_indi_id)) {
                $this->addDownData($sibling_id, $nest);
            }
        }
    }

    protected function setHead()
    {
        $head = new Head();
        /**
         * @var Sour
         */
        $sour = new Sour();
        $sour->setSour(env('APP_NAME', ''));
        $sour->setVersion('1.0');
        $head->setSour($sour);
        /**
         * @var string
         */
        $dest = null;
        $head->setDest($dest);
        /**
         * @var Head\Date
         */
        $date = null;
        $head->setDate($date);
        /**
         * @var string
         */
        $subm = null;
        $head->setSubm($subm);
        /**
         * @var string
         */
        $subn = null;
        $head->setSubn($subn);
        /**
         * @var string
         */
        $file = null;
        $head->setFile($file);
        /**
         * @var string
         */
        $copr = null;
        $head->setCopr($copr);
        /**
         * @var Head\Gedc
         */
        $gedc = null;
        $head->setGedc($gedc);
        /**
         * @var Head\Char
         */
        $char = null;
        $head->setChar($char);
        /**
         * @var string
         */
        $lang = null;
        $head->setLang($lang);
        /**
         * @var Head\Plac
         */
        $plac = null;
        $head->setPlac($plac);
        /**
         * @var string
         */
        $note = null;
        $head->setNote($note);
        $this->_gedcom->setHead($head);
    }

    protected function setIndi($p_id)
    {
        $indi = new Indi();
        $person = Person::query()->find($p_id);
        if ($person == null) {
            return;
        }
        /**
         * @var string
         */
        $id = $person->id;
        $indi->setId($id);

        $_name = new Name();
        $_name->setName($person->name);
        $indi->addName($_name);

        /**
         * @var string
         */
        $sex = $person->sex;
        $indi->setSex($sex);

        $place = PersonEvent::query()->find($p_id);
        $_plac = new Personal();
        if (!empty($place->type)) {
            $_plac->setType($place->type);
        }
        if (!empty($place->date)) {
            $date = \FamilyTree365\LaravelGedcom\Utils\Importer\Date::read('', $place->date);
            $_plac->setDate($date);
        }
        if (!empty($place->type) && !empty($place->date)) {
            $indi->getAllEven($_plac);
        }

        /**
         * @var Fams[]
         */
        /* $fams = Family::query()->where('husband_id', $p_id)->orwhere('wife_id', $p_id)->get();
        foreach ($fams as $item) {
            $fam = new Fams();
            $fam->setFams($item->id);
            $indi->addFams($fam);
        } */

        $this->_gedcom->addIndi($indi);
    }

    protected function setFam($family_id)
    {
        $famData = Family::query()->where('id', $family_id)->first();
        if ($famData == null) {
            return null;
        }
        $fam = new Fam();
        $_id = $famData->id;
        $fam->setId($_id);

        $_chan = null;
        $fam->setChan($_chan);

        $_husb = $famData->husband_id;
        $fam->setHusb($_husb);

        // add husb individual
        // $this->setIndi($_husb, $family_id);

        $_wife = $famData->wife_id;
        $fam->setWife($_wife);

        // add wife individual
        // $this->setIndi($_wife, $family_id);

        $_nchi = null;
        $fam->setNchi($_nchi);

        $_chil = Person::query()->where('child_in_family_id', $family_id)->get();
        foreach ($_chil as $item) {
            $fam->addChil($item->id);
            // $this->setIndi($item->id);
        }

        $_even = [];
        foreach ($_even as $item) {
            $even = new Even();
            $_type = null; // string
            $_date = null; // string
            $_plac = null; // \Gedcom\Record\Indi\Even\Plac
            $_caus = null; // string
            $_age = null;  // string
            $_addr = null; // \Gedcom\Record\Addr
            $_phon = []; // \Gedcom\Record\Phon
            $_agnc = null; // string
            $_husb = null; // \Gedcom\Record\Fam\Even\Husb
            $_wife = null; // \Gedcom\Record\Fam\Even\Wife
            $_obje = []; // \Gedcom\Writer\ObjeRef
            $_sour = []; // \Gedcom\Writer\SourRef
            $_note = []; // \Gedcom\Writer\NoteRef
            $even->setType($_type);
            $even->setDate($_date);
            $even->setPlac($_plac);
            $even->setCaus($_caus);
            $even->setAddr($_addr);
            $even->setPhon($_phon);
            $even->setAgnc($_agnc);
            $even->setHusb($_husb);
            $even->setWife($_wife);
            $even->setObje($_obje);
            $even->setSour($_sour);
            $even->setNote($_note);
            $fam->addEven($even);
        }

        $_slgs = [];
        foreach ($_slgs as $item) {
            $slgs = new Slgs();
            $_stat = null;
            $_date = null;
            $_plac = null;
            $_temp = null;
            $_sour = [];
            $_note = [];

            $slgs->setStat($_stat);
            $slgs->setDate($_date);
            $slgs->setPlac($_plac);
            $slgs->setTemp($_temp);
            $slgs->setSour($_sour);
            $slgs->setNote($_note);
            $fam->addSlgs($slgs);
        }

        $_subm = [];
        foreach ($_subm as $item) {
            $subm = new Subm();
            $subm_id = null;
            $chan = null; // @var Record\Chan
            $name = null;
            $addr = null; //@var Record\Addr
            $rin = null;
            $rfn = null;
            $lang = [];
            $phon = [];
            $obje = [];
            $note = [];

            $subm->setSubm($subm_id);
            $subm->setChan($chan);
            $subm->setName($name);
            $subm->setAddr($addr);
            $subm->setRin($rin);
            $subm->setRfn($rfn);

            $subm->setLang($lang);
            $subm->setPhon($phon);
            $subm->setObje($obje);
            $subm->setNote($note);

            $fam->addSubm($subm);
        }

        $_refn = [];
        foreach ($_refn as $item) {
            $refn = null;
            $type = null;

            $subm->setRefn($refn);
            $subm->setType($type);

            $fam->addRefn($refn);
        }

        $_rin = null;
        $fam->setRin($_rin);

        $_note = [];
        foreach ($_note as $item) {
            $note = new NoteRef();
            $fam->addNote($note);
        }

        $_sour = [];
        foreach ($_sour as $item) {
            $sour = new SourRef();
            $fam->addSour($sour);
        }

        $_obje = [];
        foreach ($_obje as $item) {
            $obje = new ObjeRef();
            $fam->addObje($obje);
        }
        $this->_gedcom->addFam($fam);

        return $fam;
    }

    protected function setSubn()
    {
    }

    protected function setSubM()
    {
    }

    protected function setSour()
    {
    }

    protected function setNote()
    {
    }

    protected function setRepo()
    {
    }

    protected function setObje()
    {
    }
}
