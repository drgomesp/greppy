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

class PatternSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Greppy\Pattern');
    }
    
    function it_should_dump_the_pattern()
    {
        $this->any()->dump()->shouldReturn("/./");
        $this->digit()->dump()->shouldReturn("/\d/");
        $this->literal("@")->dump()->shouldReturn("/\@/");
        $this->literal("c", "m", "f")->dump()->shouldReturn("/[cmf]/");
    }

    function it_should_match_any_single_character()
    {
        $this->any()->match("a")->shouldReturn(true);
        $this->any()->match("")->shouldReturn(false);
    }
    
    function it_should_match_any_digit()
    {
        $this->digit()->match("1")->shouldReturn(true);
        $this->digit()->match("12")->shouldReturn(true);
        $this->digit()->match("123")->shouldReturn(true);
    }
    
    function it_should_match_literal_character()
    {
        $this->literal(".")->match(".")->shouldReturn(true);
        $this->literal(".")->match(",")->shouldReturn(false);
    }
    
    function it_should_match_literal_characters()
    {
        $this->literal("c", "m", "f")->match("can")->shouldReturn(true);
        $this->literal("c", "m", "f")->match("man")->shouldReturn(true);
        $this->literal("c", "m", "f")->match("fan")->shouldReturn(true);

        $this->literal("c", "m", "f")->match("dan")->shouldReturn(false);
        $this->literal("c", "m", "f")->match("ran")->shouldReturn(false);
        $this->literal("c", "m", "f")->match("pan")->shouldReturn(false);
    }
    
    function it_should_match_range()
    {
        $this->range(0, 6)->match("3")->shouldReturn(true);
        $this->range(4, 6)->match("3")->shouldReturn(false);
        $this->range("a", "z")->match("any")->shouldReturn(true);
        $this->range("a", "z")->match("ANY")->shouldReturn(false);
    }
    
    function it_should_match_repetition()
    {
        $this->repetition("z", 4)->match("wazzzzup")->shouldReturn(true);
        $this->repetition("z", 2, 4)->match("wazzzzup")->shouldReturn(true);
        $this->repetition("z", 2, 4)->match("wazzzup")->shouldReturn(true);
        $this->repetition("z", 2, 4)->match("wazup")->shouldReturn(false);
    }
}
