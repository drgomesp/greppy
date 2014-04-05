<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Greppy;

/**
 * Class Pattern
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Greppy
 */
class Pattern
{
    /**
     * @var string
     */
    const DELIMITER_SLASH = "/";
    
    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $pattern;
    
    /**
     * Ends the flow by matching an input string subject.
     * 
     * @param string $subject
     * @return bool 
     */
    public function match($subject)
    {
        $this->subject = $subject;
        
        return (bool) preg_match(
            sprintf("%s%s%s", self::DELIMITER_SLASH, $this->pattern, self::DELIMITER_SLASH), 
            $subject
        );
    }

    /**
     * @return \Greppy\Pattern
     */
    public function any()
    {
        $this->pattern .= ".";
        return $this;
    }

    /**
     * @return \Greppy\Pattern
     */
    public function digit()
    {
        $this->pattern .= "\d";
        return $this;
    }

    /**
     * @param string $character
     * @return \Greppy\Pattern
     */
    public function exactly($character)
    {
        $this->pattern .= $character;
        return $this;
    }
}
