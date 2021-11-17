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

namespace Gedcom\Parser\ObjeRef;

class File extends \Gedcom\Parser\Component
{
    public static function parse(\Gedcom\Parser $parser)
    {
        $file = new \Gedcom\Record\ObjeRef\File();
        $record = $parser->getCurrentLineRecord();
        $depth = (int) $record[0];
        if (isset($record[2])) {
            $file->setFile($record[2]);
        } else {
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
                case 'FORM':
                    $file->setDate(\Parser\ObjeRef\File\Form::parse($parser));
                    break;
                case 'TITL':
                    $file->setTitl(trim($record[2]));
                default:
                    $parser->logUnhandledRecord(get_class().' @ '.__LINE__);
            }

            $parser->forward();
        }

        return $file;
    }
}
