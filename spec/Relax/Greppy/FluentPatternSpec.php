<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Relax\Greppy;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class PatternSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Relax\Greppy\Pattern');
    }
    
    function it_should_be_castable_to_string()
    {
        $this->any()->digit()->literal("c", "m", "f")->__toString()->shouldReturn("/.\d[cmf]/");
    }
    
    function it_should_assemble_right_pattern_with_any()
    {
        $this->any()->__toString()->shouldReturn('/./');
    }

    function it_should_assemble_right_pattern_with_digit()
    {
        $this->digit()->__toString()->shouldReturn('/\d/');
    }

    function it_should_assemble_right_pattern_with_literal()
    {
        $this->literal("a")->__toString()->shouldReturn('/a/');
    }

    function it_should_assemble_right_pattern_with_literals()
    {
        $this->literal("a", "b", "c")->__toString()->shouldReturn('/[abc]/');
    }

    function it_should_assemble_right_pattern_with_range()
    {
        $this->range("a", "z")->__toString()->shouldReturn('/[a-z]/');
    }

    function it_should_assemble_right_pattern_with_repetition()
    {
        $this->repetition("z", 2, 4)->__toString()->shouldReturn('/z{2,4}/');
    }
}
