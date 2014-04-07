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
use Relax\Greppy\PatternInterface;

class MatcherSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith("subject");
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Relax\Greppy\MatcherInterface');
    }
    
    function it_should_not_be_constructed_with_non_string_subject()
    {
        $this->shouldThrow(
            new \InvalidArgumentException("Expected string subject, got 1.")
        )->during('__construct', array(1));
    }
    
    function it_should_return_subject()
    {
        $this->getSubject()->shouldReturn("subject");
    }
    
    function it_should_match_pattern_against_subject(PatternInterface $pattern)
    {
        $pattern->__toString()->willReturn("/./");
        $this->matches($pattern)->shouldReturn(true);

        $pattern->__toString()->willReturn("/different/");
        $this->matches($pattern)->shouldReturn(false);
    }
}
