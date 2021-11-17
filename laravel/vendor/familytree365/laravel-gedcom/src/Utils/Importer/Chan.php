<?php

namespace FamilyTree365\LaravelGedcom\Utils\Importer;

use FamilyTree365\LaravelGedcom\Models\Chan as MChan;

class Chan
{
    /**
     * Gedcom\Record\Chan $chan
     * String $group
     * Integer $group_id.
     */
    public static function read($conn, \Gedcom\Record\Chan $chan, $group = '', $group_id = 0)
    {
        $date = $chan->getDate();
        $time = $chan->getTime();

        // store chan
        $key = ['group'=>$group, 'gid'=>$group_id, 'date'=>$date, 'time'=>$time];
        $data = ['group'=>$group, 'gid'=>$group_id,  'date'=>$date, 'time'=>$time];
        $record = MChan::on($conn)->updateOrCreate($key, $data);

        // store Sources of Note
        $_group = 'chan';
        $_gid = $record->id;
        // SourRef array
        $note = $chan->getNote();
        if ($note && count($note) > 0) {
            foreach ($note as $item) {
                if ($item) {
                    NoteRef::read($conn, $item, $_group, $_gid);
                }
            }
        }
    }
}
