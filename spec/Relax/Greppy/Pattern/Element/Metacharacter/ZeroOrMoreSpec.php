<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Relax\Greppy\Pattern\Element\Metacharacter;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class ZeroOrMoreSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Relax\Greppy\Pattern\Element\Metacharacter\ZeroOrMore');
    }

    function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn("*");
    }
}
