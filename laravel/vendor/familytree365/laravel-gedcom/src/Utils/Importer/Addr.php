<?php

namespace FamilyTree365\LaravelGedcom\Utils\Importer;

use FamilyTree365\LaravelGedcom\Models\Addr as MAddr;

class Addr
{
    /**
     * Gedcom\Record\Refn $noteref
     * String $group
     * Integer $group_id.
     */
    public static function read($conn, $addr)
    {
        $id = null;
        if ($addr == null) {
            return $id;
        }
        $adr1 = $addr->getAdr1();
        $adr2 = $addr->getAdr2();
        $city = $addr->getCity();
        $stae = $addr->getStae();
        $post = $addr->getPost();
        $ctry = $addr->getCtry();

        $addr = MAddr::on($conn)->where([
            ['adr1', '=', $adr1],
            ['adr2', '=', $adr2],
            ['city', '=', $city],

            ['stae', '=', $stae],
            ['post', '=', $post],
            ['ctry', '=', $ctry],
        ])->first();
        if ($addr !== null) {
            $id = $addr->id;
        } else {
            $addr = MAddr::on($conn)->create(compact('adr1', 'adr2', 'city', 'stae', 'post', 'ctry'));
            $id = $addr->id;
        }

        return $id;
    }
}
