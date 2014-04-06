<?php

/*
 * This file is part of the Greppy package.
 *
 * (c) Daniel Ribeiro <drgomesp@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Greppy;

/**
 * A basic regex matcher.
 *
 * @author Daniel Ribeiro <drgomesp@gmail.com>
 * @package Greppy
 */
final class Matcher implements MatcherInterface
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @param string $subject The subject to match against
     * @throws \InvalidArgumentException
     */
    public function __construct($subject)
    {
        if (!is_string($subject)) {
            throw new \InvalidArgumentException(sprintf("Expected string subject, got %s.", $subject));
        }
        
        $this->subject = $subject;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * {@inheritdoc}
     */
    public function matches(PatternInterface $pattern)
    {
        return (bool) preg_match((string) $pattern, $this->getSubject());
    }
}
 