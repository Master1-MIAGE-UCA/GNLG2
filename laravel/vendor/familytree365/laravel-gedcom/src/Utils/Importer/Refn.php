<?php

namespace FamilyTree365\LaravelGedcom\Utils\Importer;

use FamilyTree365\LaravelGedcom\Models\Refn as MRefn;

class Refn
{
    /**
     * Gedcom\Record\Refn $noteref
     * String $group
     * Integer $group_id.
     */
    public static function read($conn, \Gedcom\Record\Refn $refn, $group = '', $group_id = 0)
    {
        $_refn = $refn->getRefn();
        $type = $refn->getType();
        // store refn
        $key = ['group'=>$group, 'gid'=>$group_id, 'refn'=>$_refn, 'type'=>$type];
        $data = ['group'=>$group, 'gid'=>$group_id, 'refn'=>$_refn, 'type'=>$type];
        $record = MRefn::on($conn)->updateOrCreate($key, $data);
    }
}
