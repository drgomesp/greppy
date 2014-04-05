<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Greppy;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Pattern spec.
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package spec\Greppy
 */
class PatternSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Greppy\Pattern');
    }

    function it_should_match_any_single_character()
    {
        $this->any()->match("123")->shouldReturn(true);
        $this->any()->match("abc")->shouldReturn(true);
        $this->any()->match("?=+")->shouldReturn(true);
    }
    
    function it_should_match_any_digit()
    {
        $this->digit()->match("1")->shouldReturn(true);
        $this->digit()->match("12")->shouldReturn(true);
        $this->digit()->match("123")->shouldReturn(true);
    }
    
    function it_should_match_exactly_character()
    {
        $this->exactly(".")->match(".")->shouldReturn(true);
        $this->exactly(".")->match(",")->shouldReturn(false);
    }
    
    function it_should_match_exactly_characters()
    {
        $characters = array("c", "m", "f");
        
        $this->exactly($characters)->match("can")->shouldReturn(true);
        $this->exactly($characters)->match("man")->shouldReturn(true);
        $this->exactly($characters)->match("fan")->shouldReturn(true);
        
        $this->exactly($characters)->match("dan")->shouldReturn(false);
        $this->exactly($characters)->match("ran")->shouldReturn(false);
        $this->exactly($characters)->match("pan")->shouldReturn(false);
    }
}
