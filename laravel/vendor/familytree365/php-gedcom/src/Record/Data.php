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

namespace Gedcom\Record;

use \Gedcom\Record;

/**
 * Class Data.
 */
class Data extends \Gedcom\Record
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $date;

    /**
     * @param string $text
     *
     * @return Data
     */
    public function setText($text = '')
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $date
     *
     * @return Data
     */
    public function setDate($date = '')
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
}
