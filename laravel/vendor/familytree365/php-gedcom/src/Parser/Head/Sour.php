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

namespace Gedcom\Parser\Head;

class Sour extends \Gedcom\Parser\Component
{
    public static function parse(\Gedcom\Parser $parser)
    {
        $record = $parser->getCurrentLineRecord();
        $depth = (int) $record[0];
        if (isset($record[2])) {
            $source = new \Gedcom\Record\Head\Sour();
            $source->setSour(trim($record[2]));
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
                case 'VERS':
                    $source->setVers(trim($record[2]));
                    break;
                case 'NAME':
                    $source->setName(trim($record[2]));
                    break;
                case 'CORP':
                    $corp = Parser\Head\Sour\Corp::parse($parser);
                    $source->setCorp($corp);
                    break;
                case 'DATA':
                    $data = Parser\Head\Sour\Data::parse($parser);
                    $source->setData($data);
                    break;
                default:
                    $parser->logUnhandledRecord(get_class().' @ '.__LINE__);
            }

            $parser->forward();
        }

        return $source;
    }
}
