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

namespace Gedcom\Record\Sour;

use \Gedcom\Record\Noteable;

class Data extends \Gedcom\Record implements Noteable
{
    protected $_even = [];
    protected $_agnc = null;
    protected $_date = null;

    protected $_text = null;

    protected $_note = [];

    public function addNote($note = [])
    {
        $this->_note[] = $note;
    }
}
