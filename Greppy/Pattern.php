<?php

namespace Greppy;

class Pattern
{
    private $symbols;

    public function any()
    {
        $this->symbols .= '.';
        return $this;
    }

    public function literal($literal)
    {
        $this->symbols .= $literal;
        return $this;
    }

    public function range($start, $end)
    {
        $this->symbols .= "$start-$end";
        return $this;
    }

    public function alternatives(array $alternatives)
    {
        $this->symbols .= implode('|', $alternatives);
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

    public function __toString()
    {
        return '/' . $this->symbols . '/';
    }
}