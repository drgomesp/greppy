<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Greppy\Pattern;

/**
 * Defines an interface for a pattern element.
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Greppy\Pattern
 */
interface Element
{
    /**
     * Gets the string representation of the element for usage inside patterns.
     * 
     * @return mixed
     */
    public function __toString();
}
