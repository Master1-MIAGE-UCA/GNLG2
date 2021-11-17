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

namespace Gedcom\Record\Head\Sour;

class Corp extends \Gedcom\Record
{
    protected $_corp = null;
    protected $_addr = null;

    protected $_phon = [];

    public function addPhon($phon = [])
    {
        $this->_phon[] = $phon;
    }
}
