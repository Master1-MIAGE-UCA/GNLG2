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

class SourRef extends \Gedcom\Record
{
    protected $_isRef = false;

    protected $_sour = null;
    protected $_page = null;
    protected $_even = null;
    protected $_data = null;
    protected $_quay = null;
    protected $_text = null;

    protected $_obje = [];
    protected $_note = [];
}
