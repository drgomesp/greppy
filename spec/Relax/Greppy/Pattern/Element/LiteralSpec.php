<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Relax\Greppy\Pattern\Element;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class LiteralSpec extends ObjectBehavior
{   
    function let()
    {
        $this->beConstructedWith("a");
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Relax\Greppy\Pattern\Element\Literal');
    }
    
    function it_should_not_escape_non_alphanumeric_literal()
    {
        $this->__toString()->shouldReturn("a");
    }

    function it_should_escape_non_alphanumeric_literal()
    {
        $this->beConstructedWith("@");
        $this->__toString()->shouldReturn("\@");
    }
}
