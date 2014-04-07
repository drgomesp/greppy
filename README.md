Greppy
==================
[![Build Status](https://travis-ci.org/RelaxPHP/Greppy.svg?branch=master)](https://travis-ci.org/RelaxPHP/Greppy)

Feature Guide
-------------

### Bootstrap

```php
$p = new Greppy\Pattern();
```

### Matching any single character

The PHP way:
```php
preg_match("/./", "any"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("any");
$m->matches($p->any()); // true
```

### Matching any digit

The PHP way:
```php
preg_match("/\d/", "5"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("5");
$m->matches($p->digit()); // true
```

### Matching a literal

The PHP way:
```php
preg_match("/e/", "hey"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("hey");
$m->matches($p->literal("e")); // true
```

### Matching a group of literals

The PHP way:
```php
preg_match("/[abc]/", "anthem"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("anthem");
$m->matches($p->literal("a", "b", "c")); // true
```

### Matching a range

The PHP way:
```php
preg_match("/[a-z]/", "any"); // 1
```
The Greppy way:
```php
$m = new Greppy\Matcher("any");
$m->matches($p->range("a", "z")); // true
```

### Matching a repetition

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
