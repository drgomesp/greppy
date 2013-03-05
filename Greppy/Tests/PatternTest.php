<?php

namespace Greppy\Tests;

use Greppy\Pattern;

class PatternTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Greppy\Pattern
     */
    protected $pattern;

    protected function assertPreConditions()
    {
        $this->assertTrue(class_exists($class = 'Greppy\Pattern'),
            'Class not found: ' . $class);
    }

    public function providerPatterns()
    {
        return [
            [(new Pattern())->any(), '/./'],
            [(new Pattern())->literal('foo'), '/foo/'],
            [(new Pattern())->range('A', 'Z'), '/A-Z/'],
            [(new Pattern())->alternatives(['foo', 'bar']), '/foo|bar/'],
            [(new Pattern())->word(), '/\w/'],
        ];
    }

    /**
     * @dataProvider providerPatterns
     */
    public function testToString(Pattern $greppyPatternObject, $pattern)
    {
        $this->assertEquals($greppyPatternObject, $pattern);
    }
}