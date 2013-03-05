<?php

namespace Greppy\Tests;

use Greppy\Pattern;

class PatternTest extends \PHPUnit_Framework_TestCase
{
    protected function assertPreConditions()
    {
        $this->assertTrue(class_exists($class = 'Greppy\Pattern'),
            'Class not found: ' . $class);
    }

    public function providerPatterns()
    {
        $p = new Pattern();

        return array(
            array($p->any(), '/./'),
        );
    }

    /**
     * @dataProvider providerPatterns
     */
    public function testToString(Pattern $greppyPatternObject ,$pattern)
    {
        $this->assertEquals((string) $greppyPatternObject, $pattern);
    }
}