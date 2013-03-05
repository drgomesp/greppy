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

    public function __toString()
    {
        return '/' . $this->symbols . '/';
    }
}