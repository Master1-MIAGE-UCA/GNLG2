<?php
/**
 * php-gedcom.
 *
 * php-gedcom is a library for parsing, manipulating, importing and exporting
 * GEDCOM 5.5 files in PHP 5.3+.
 *
 * @author          Xiang Ming <wenqiangliu344@gmail.com>
 * @copyright       Copyright (c) 2010-2013, Xiang Ming
 * @license         MIT
 *
 * @link            http://github.com/mrkrstphr/php-gedcom
 */

namespace Gedcom\Writer;

class NoteRef
{
    /**
     * @param \Gedcom\Record\NoteRef $note
     * @param int                       $level
     *
     * @return string
     */
    public static function convert (\Gedcom\Record\NoteRef &$note, $level)
    {
        $output = '';

        // $_note
        $_note = $note->getNote();
        if (!empty($_note)) {
            $output .= $level.' NOTE '.$_note."\n";
        }

        $level++;
        // $sour
        $sour = $note->getSour();
        if ($sour && count($sour) > 0) {
            foreach ($sour as $item) {
                $_convert = \Gedcom\Writer\SourRef::convert($item, $level);
                $output .= $_convert;
            }
        }

        return $output;
    }
}
