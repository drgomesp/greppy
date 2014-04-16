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
 * Defines an interface for a regex matcher object.
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Greppy
 */
interface Matcher
{
    /**
     * Get the subject to match against.
     * 
     * @return string
     */
    public function getSubject();
    
    /**
     * Checks if the subject matches the pattern.
     * 
     * @param \Relax\Greppy\Pattern $pattern
     * @return bool
     */
    public function matches(Pattern $pattern);
}
