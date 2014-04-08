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
 * Class Pattern
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Greppy
 */
class Pattern implements PatternInterface
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
     * {@inheritdoc}
     */
    public function __toString()
    {
        $pattern = sprintf("%s%s%s", self::DELIMITER_SLASH, $this->pattern, self::DELIMITER_SLASH);
        return $pattern;
    }

    /**
     * Ends the flow by matching an input string subject.
     * 
     * @param string $subject
     * @return bool 
     */
    public function match($subject)
    {
        $matcher = new Matcher($subject);
        $match = $matcher->matches($this);
        $this->pattern = null;
        return $match;
    }

    /**
     * Dumps the pattern.
     *
     * @return string
     */
    public function dump()
    {
        $pattern = $this->assemblePattern();
        $this->pattern = null;
        return $pattern;
    }

    /**
     * @return \Relax\Greppy\Pattern
     */
    public function any()
    {
        $this->pattern .= ".";
        return $this;
    }

    /**
     * @return \Relax\Greppy\Pattern
     */
    public function digit()
    {
        $this->pattern .= "\d";
        return $this;
    }

    /**
     * @return \Relax\Greppy\Pattern
     */
    public function literal()
    {
        $characters = func_get_args();
        $pattern = count($characters) > 1 ? "[%s]" : "%s";
        
        $escapedCharacters = array();
        
        foreach ($characters as $c) {
            $escapedCharacters[] = ctype_alnum($c) ? $c : sprintf("\%s", $c);
        }
        
        $this->pattern .= sprintf($pattern, implode("", $escapedCharacters));
        return $this;
    }

    /**
     * @param int|string $from
     * @param int|string $to
     * @return \Relax\Greppy\Pattern
     */
    public function range($from, $to)
    {
        $this->pattern .= sprintf("[%s-%s]", $from, $to);
        return $this;
    }

    /**
     * @param string $character
     * @param int $min
     * @param int $max
     * @return \Relax\Greppy\Pattern
     */
    public function repetition($character, $min, $max = null)
    {
        if (is_null($max)) {
            $this->pattern .= sprintf("%s{%s}", $character, $min);
            return $this;    
        }
        
        $this->pattern .= sprintf("%s{%s,%s}", $character, $min, $max);
        return $this;
    }

    /**
     * @return string
     */
    protected function assemblePattern()
    {
        return sprintf("%s%s%s", self::DELIMITER_SLASH, $this->pattern, self::DELIMITER_SLASH);
    }
}
