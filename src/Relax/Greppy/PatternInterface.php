<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Relax\Greppy;

/**
 * Defines an interface for a regex pattern.
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Greppy
 */
interface PatternInterface
{
    /**
     * Dumps the pattern as a string.
     * 
     * @return string
     */
    public function __toString();
}
