Greppy
==================
>## Deprecation Notice

>Greppy is going to be phased away in favor of the [PHPVerbalExpressions](https://github.com/VerbalExpressions/PHPVerbalExpressions) project.

[![Build Status](https://travis-ci.org/drgomesp/Greppy.svg?branch=master)](https://travis-ci.org/drgomesp/greppy)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/drgomesp/Greppy/badges/quality-score.png?s=2ee65804cbc0c223711d96c14367dd37a202824d)](https://scrutinizer-ci.com/g/drgomesp/Greppy/)
[![Latest Unstable Version](https://poser.pugx.org/relaxphp/greppy/v/unstable.png)](https://packagist.org/packages/relaxphp/greppy) 
[![License](https://poser.pugx.org/relaxphp/greppy/license.png)](https://packagist.org/packages/relaxphp/greppy)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/4aec493b-b7f3-4e43-8412-361b84a32c6f/mini.png)](https://insight.sensiolabs.com/projects/4aec493b-b7f3-4e43-8412-361b84a32c6f/mini.png)

Why use Greppy?
-------------
- Isolate your regex patterns and matching so they can be easily mocked inside unit tests
- Represent important and recurrent patterns with custom pattern classes
- Write more human-readable regular expressions with a fluent API using the `FluentPattern` object.

Feature Guide
-------------

### Bootstrap

```php
$p = new Relax\Greppy\Pattern();
```

### Custom pattern objects

With Greppy, you can define pattern objects – types – to easily define, reuse and maintain common
patterns used in web applications.

If you use regex to match domain, for instance, instead of doing:

```php
preg_match("/^(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?/i", $subject);
```

You may define a `DomainPattern` type, such as:
 
```php
namespace Your\Namespace;

use Relax\Greppy\Pattern;

class DomainPattern implements Pattern
{
    public function __toString()
    {
        return "/^(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?/";
    }
}
```

And use it like this:
 
```php
$domain = new Your\Namespace\DomainPattern();
$m = new Relax\Greppy\SimpleMatcher("http://www.google.com");
$m->caseless()->matches($domain); // true
```

### The predefined Pattern object

#### Matching any single character

The PHP way:
```php
preg_match("/./", "any"); // 1
```
The Greppy way:
```php
$m = new Relax\Greppy\SimpleMatcher("any");
$m->matches($p->any()); // true
```

#### Matching any digit

The PHP way:
```php
preg_match("/\d/", "5"); // 1
```
The Greppy way:
```php
$m = new Relax\Greppy\SimpleMatcher("5");
$m->matches($p->digit()); // true
```

#### Matching a literal

The PHP way:
```php
preg_match("/e/", "hey"); // 1
```
The Greppy way:
```php
$m = new Relax\Greppy\SimpleMatcher("hey");
$m->matches($p->literal("e")); // true
```

#### Matching a group of literals

The PHP way:
```php
preg_match("/[abc]/", "anthem"); // 1
```
The Greppy way:
```php
$m = new Relax\Greppy\SimpleMatcher("anthem");
$m->matches($p->literal("a", "b", "c")); // true
```

#### Matching a range

The PHP way:
```php
preg_match("/[a-z]/", "any"); // 1
```
The Greppy way:
```php
$m = new Relax\Greppy\SimpleMatcher("any");
$m->matches($p->range("a", "z")); // true
```

#### Matching a repetition

The PHP way:
```php
preg_match("/z{3}/", "wazzzup"); // 1
preg_match("/z{2,4}/", "wazzzzup"); // 1
```
The Greppy way:
```php
$m = new Relax\Greppy\SimpleMatcher("wazzzup");
$m->matches($p->repetition("z", 3)); // true

$m = new Relax\Greppy\SimpleMatcher("wazzzzup"); 
$m->matches($p->repetition("z", 2, 4)); // true
```
