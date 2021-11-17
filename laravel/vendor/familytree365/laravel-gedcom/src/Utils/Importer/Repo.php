<?php

namespace FamilyTree365\LaravelGedcom\Utils\Importer;

use FamilyTree365\LaravelGedcom\Models\Repository;

class Repo
{
    /**
     * Gedcom\Record\Repo $repo
     * String $group
     * Integer $group_id.
     */
    public static function read($conn, \Gedcom\Record\Repo $repo, $group = '', $group_id = 0)
    {
        if ($repo == null) {
            return;
        }
        $name = $repo->getName(); // string
        $rin = $repo->getRin(); // string
        $addr = $repo->getAddr(); // Record/Addr
        $addr_id = \FamilyTree365\LaravelGedcom\Utils\Importer\Addr::read($conn, $addr);
        $_phon = $repo->getPhon(); // Record/Phon array
        $phon = implode(',', $_phon);
        $_email = $repo->getEmail();
        $email = implode(',', $_email);
        $_fax = $repo->getFax();
        $fax = implode(',', $_fax);
        $_www = $repo->getWww();
        $www = implode(',', $_www);
        // store Source
        $key = [
            'group'   => $group,
            'gid'     => $group_id,
            'name'    => $name,
            'rin'     => $rin,
            'addr_id' => $addr_id,
            'phon'    => $phon,
            'email'   => $email,
            'fax'     => $fax,
            'www'     => $www,
        ];
        $data = [
            'group'   => $group,
            'gid'     => $group_id,
            'name'    => $name,
            'rin'     => $rin,
            'addr_id' => $addr_id,
            'phon'    => $phon,
            'email'   => $email,
            'fax'     => $fax,
            'www'     => $www,
        ];

        $record = Repository::on($conn)->updateOrCreate($key, $data);

        $_group = 'repo';
        $_gid = $record->id;
        // store Note
        $note = $repo->getNote(); // Record/NoteRef array
        if ($note && count($note) > 0) {
            foreach ($note as $item) {
                NoteRef::read($conn, $item, $_group, $_gid);
            }
        }
        $refn = $repo->getRefn(); // Record/Refn array
        if ($refn && count($refn) > 0) {
            foreach ($refn as $item) {
                Refn::read($conn, $item, $_group, $_gid);
            }
        }

        $chan = $repo->getChan(); // Recore/Chan
        if ($chan !== null) {
            \FamilyTree365\LaravelGedcom\Utils\Importer\Chan::read($conn, $chan, $_group, $_gid);
        }

        return $_gid;
    }
}
