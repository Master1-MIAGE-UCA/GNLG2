<?php
/**
 * php-gedcom.
 *
 * php-gedcom is a library for parsing, manipulating, importing and exporting
 * GEDCOM 5.5 files in PHP 5.3+.
 *
 * @author          Kristopher Wilson <kristopherwilson@gmail.com>
 * @copyright       Copyright (c) 2010-2013, Kristopher Wilson
 * @license         MIT
 *
 * @link            http://github.com/mrkrstphr/php-gedcom
 */

namespace Gedcom\Parser\ObjeRef\File;

class Form extends \Gedcom\Parser\Component
{
    public static function parse(\Gedcom\Parser $parser)
    {
        $form = new \Gedcom\Record\ObjeRef\File\Form();
        $record = $parser->getCurrentLineRecord();
        $depth = (int) $record[0];
        if (isset($record[2])) {
            $form->setForm($record[2]);
        } else {
            $parser->skipToNextLevel($depth);

            return null;
        }
        $parser->forward();

        while (!$parser->eof()) {
            $record = $parser->getCurrentLineRecord();
            $recordType = strtoupper(trim($record[1]));
            $currentDepth = (int) $record[0];

            if ($currentDepth <= $depth) {
                $parser->back();
                break;
            }

            switch ($recordType) {
                case 'MEDI':
                    $form->setMedi(trim($record[2]));
                    break;
                case 'TYPE':
                    $form->setType(trim($record[2]));
                    break;
                default:
                    $parser->logUnhandledRecord(get_class().' @ '.__LINE__);
            }

            $parser->forward();
        }

        return $form;
    }
}
