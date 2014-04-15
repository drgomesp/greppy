Greppy
==================
[![Build Status](https://travis-ci.org/drgomesp/Greppy.png?branch=master)](https://travis-ci.org/drgomesp/Greppy) [![Latest Unstable Version](https://poser.pugx.org/relaxphp/greppy/v/unstable.png)](https://packagist.org/packages/relaxphp/greppy) [![License](https://poser.pugx.org/relaxphp/greppy/license.png)](https://packagist.org/packages/relaxphp/greppy)

Feature Guide
-------------

### Bootstrap

```php
$p = new Greppy\Pattern();
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

use Relax\Greppy\PatternInterface;

class DomainPattern implements PatternInterface
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
$m = new Greppy\Matcher("http://www.google.com");
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
$m = new Greppy\Matcher("any");
$m->matches($p->any()); // true
```

#### Matching any digit

The PHP way:
```php
preg_match("/\d/", "5"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("5");
$m->matches($p->digit()); // true
```

#### Matching a literal

The PHP way:
```php
preg_match("/e/", "hey"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("hey");
$m->matches($p->literal("e")); // true
```

#### Matching a group of literals

The PHP way:
```php
preg_match("/[abc]/", "anthem"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("anthem");
$m->matches($p->literal("a", "b", "c")); // true
```

#### Matching a range

The PHP way:
```php
preg_match("/[a-z]/", "any"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("any");
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
$m = new Greppy\Matcher("wazzzup");
$m->matches($p->repetition("z", 3)); // true

$m = new Greppy\Matcher("wazzzzup"); 
$m->matches($p->repetition("z", 2, 4)); // true
```
