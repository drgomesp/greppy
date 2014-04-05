<?php

/*
* This file is part of the Greppy package.
*
* (c) Daniel Ribeiro <drgomesp@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace spec\Greppy\Pattern\Metacharacter;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class DigitSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Greppy\Pattern\Metacharacter\Digit');
    }

    function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn("\d");
    }
}
