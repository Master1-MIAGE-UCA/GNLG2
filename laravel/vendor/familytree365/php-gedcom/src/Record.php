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

namespace Gedcom;

abstract class Record
{
    public function __call($method, $args)
    {
        if (substr($method, 0, 3) == 'add') {
            $arr = strtolower(substr($method, 3));

            if (!property_exists($this, '_'.$arr) || !is_array($this->{'_'.$arr})) {
                throw new \Gedcom\Exception('Unknown '.get_class($this).'::'.$arr);
            }

            if (!is_array($args)) {
                throw new \Gedcom\Exception('Incorrect arguments to '.$method);
            }

            if (!isset($args[0])) {
                // Argument can be empty since we trim it's value
                return;
            }

            if (is_object($args[0])) {
                // Type safety?
            }

            $this->{'_'.$arr}[] = $args[0];

            return $this;
        } elseif (substr($method, 0, 3) == 'set') {
            $arr = strtolower(substr($method, 3));

            if (!property_exists($this, '_'.$arr)) {
                throw new \Gedcom\Exception('Unknown '.get_class($this).'::'.$arr);
            }

            if (!is_array($args)) {
                throw new \Gedcom\Exception('Incorrect arguments to '.$method);
            }

            if (!isset($args[0])) {
                // Argument can be empty since we trim it's value
                return;
            }

            if (is_object($args[0])) {
                // Type safety?
            }

            $this->{'_'.$arr} = $args[0];

            return $this;
        } elseif (substr($method, 0, 3) == 'get') {
            $arr = strtolower(substr($method, 3));

            // hotfix getData
            if ('data' == $arr) {
                if (!property_exists($this, '_text')) {
                    throw new \Gedcom\Exception('Unknown '.get_class($this).'::'.$arr);
                }

                return $this->{'_text'};
            }

            if (!property_exists($this, '_'.$arr)) {
                throw new \Gedcom\Exception('Unknown '.get_class($this).'::'.$arr);
            }

            return $this->{'_'.$arr};
        } else {
            throw new \Gedcom\Exception('Unknown method called: '.$method);
        }
    }

    public function __set($var, $val)
    {
        // this class does not have any public vars
        throw new \Gedcom\Exception('Undefined property '.get_class().'::'.$var);
    }

    /**
     * Checks if this GEDCOM object has the provided attribute (ie, if the provided
     * attribute exists below the current object in its tree).
     *
     * @param string $var The name of the attribute
     *
     * @return bool True if this object has the provided attribute
     */
    public function hasAttribute($var)
    {
        return property_exists($this, '_'.$var) || property_exists($this, $var);
    }
}
