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

namespace Gedcom\Record\Indi\Even;

use \Gedcom\Record;

/**
 * Class Plac.
 */
class Plac extends \Gedcom\Record implements Record\Noteable, Record\Sourceable
{
    /**
     * @var string
     */
    protected $plac;

    /**
     * @var string
     */
    protected $form;

    /**
     * @var array
     */
    protected $note = [];

    /**
     * @var array
     */
    protected $sour = [];

    /**
     * @param string $form
     *
     * @return Plac
     */
    public function setForm($form = '')
    {
        $this->form = $form;

        return $this;
    }

    /**
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param string $plac
     *
     * @return Plac
     */
    public function setPlac($plac = '')
    {
        $this->plac = $plac;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlac()
    {
        return $this->plac;
    }

    /**
     * @return array
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param Record\NoteRef $note
     *
     * @return Plac
     */
    public function addNote($note = [])
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return array
     */
    public function getSour()
    {
        return $this->sour;
    }

    /**
     * @param Record\SourRef $sour
     *
     * @return Plac
     */
    public function addSour($sour = [])
    {
        $this->sour[] = $sour;

        return $this;
    }
}
