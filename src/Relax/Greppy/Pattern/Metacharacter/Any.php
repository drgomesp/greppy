<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Relax\Greppy\Pattern\Metacharacter;

use Relax\Greppy\Pattern\ElementInterface;

/**
 * Any character element.
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Relax\Relax\Greppy\Pattern\Metacharacter
 */
class Any implements ElementInterface
{
    /**
     * Gets the string representation of the element for usage inside patterns.
     *
     * @return string
     */
    public function __toString()
    {
        return ".";
    }
}
