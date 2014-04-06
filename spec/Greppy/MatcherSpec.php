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

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class MatcherSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith("some subject string to match");
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Greppy\MatcherInterface');
    }
    
    function it_should_not_be_constructed_with_non_string_subject()
    {
        $this->shouldThrow(
            new \InvalidArgumentException("Expected string subject, got 1.")
        )->during('__construct', array(1));
    }
}
