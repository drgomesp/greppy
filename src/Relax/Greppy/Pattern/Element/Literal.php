<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Relax\Greppy\Pattern\Element;

use Relax\Greppy\Pattern\ElementInterface;

/**
 * Class Literal
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Relax\Greppy\Pattern\Element
 */
class Literal implements ElementInterface
{
    /**
     * @var string
     */
    private $literal;

    /**
     * @param $literal
     */
    public function __construct($literal)
    {
        $this->literal = $literal;
    }
    
    /**
     * Gets the string representation of the element for usage inside patterns.
     *
     * @return mixed
     */
    public function __toString()
    {
        if (ctype_alnum($this->literal)) {
            return $this->literal;
        }
        
        return sprintf("\%s", $this->literal);
    }
}
