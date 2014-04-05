Greppy
==================
[![Build Status](https://travis-ci.org/drgomesp/Greppy.svg?branch=master)](https://travis-ci.org/drgomesp/Greppy)

Feature Guide
-------------

### Bootstrap

```php
$p = new Greppy\Pattern;
```

### Matching any single character

The PHP way:
```php
preg_match("/./", "any"); // 1
```
The Greppy way:
```php
$p->any()->match("any"); // true
```

### Matching any digit

The PHP way:
```php
preg_match("/\d/", "5"); // 1
```
The Greppy way:
```php
$p->digit()->match("5"); // true
```

### Matching an exact character

The PHP way:
```php
preg_match("/e/", "hey"); // 1
```
The Greppy way:
```php
$p->exact("e")->match("hey"); // true
```

### Matching an exact group of characters

The PHP way:
```php
preg_match("/[abc]/", "anthem"); // 1
```
The Greppy way:
```php
$p->exact(array("a", "b", "c"))->match("anthem"); // true
```

### Matching a range

The PHP way:
```php
preg_match("/[a-z]/", "any"); // 1
preg_match("/[4-6]/", "5"); // 1
```
The Greppy way:
```php
$p->range("a", "z")->match("any"); // true
$p->range(4, 6)->match("5"); // true
```

### Matching a repetition

The PHP way:
```php
preg_match("/z{3}/", "wazzzup"); // 1
preg_match("/z{2,4}/", "wazzzzup"); // 1
```
The Greppy way:
```php
$p->repetition("z", 3)->match("wazzzup"); // true
$p->repetition("z", 2, 4)->match("wazzzzup"); // true
```
