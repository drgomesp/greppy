<?php

namespace Greppy;

class Pattern
{
    const DELIMITER_HASH = '#';
    const DELIMITER_TILD = '~';
    const DELIMITER_SLASH = '/';

    private $delimiter;
    private $symbols;

    public function __construct($delimiter = self::DELIMITER_SLASH)
    {
        $this->delimiter = $delimiter;
    }

    public function any()
    {
        $this->symbols .= '.';

        return $this;
    }

    public function literal($literal)
    {
        $this->symbols .= preg_quote($literal, $this->delimiter);

        return $this;
    }

    public function range($start, $end)
    {
        $this->symbols .= "[{$start}-{$end}]";

        return $this;
    }

    public function alternatives(array $alternatives)
    {
        $this->symbols .= '(' . implode('|', $alternatives) . ')';

        return $this;
    }

    public function word()
    {
        $this->symbols .= '\w';

        return $this;
    }

    public function nonWord()
    {
        $this->symbols .= '\W';

        return $this;
    }

    public function whitespace()
    {
        $this->symbols .= '\s';

        return $this;
    }

    public function nonWhitespace()
    {
        $this->symbols .= '\S';

        return $this;
    }

    public function digit()
    {
        $this->symbols .= '\d';

        return $this;
    }

    public function nonDigit()
    {
        $this->symbols .= '\D';

        return $this;
    }

    public function zeroOrMore()
    {
        $this->symbols .= '*';

        return $this;
    }

    public function oneOrMore()
    {
        $this->symbols .= '+';

        return $this;
    }

    public function optional()
    {
        $this->symbols .= '?';

        return $this;
    }

    public function repeatInterval($minimum, $maximum)
    {
        $this->symbols .= "{{$minimum},{$maximum}}";

        return $this;
    }

    public function assemble()
    {
        return $this->delimiter . $this->symbols . $this->delimiter;
    }

    public function __toString()
    {
        $string = '';
        try {
            $string = $this->assemble();
        } catch (\Exception $exception) {
            trigger_error($exception->getMessage(), E_USER_ERROR);
        }

        return $string;
    }

}