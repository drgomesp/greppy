Greppy
==================
[![Build Status](https://travis-ci.org/drgomesp/Greppy.svg?branch=master)](https://travis-ci.org/drgomesp/Greppy)

Feature Guide
-------------

### Matching any single character

The PHP way:
```php
preg_match("/./", "any"); // 1
```
The Greppy way:
```php
p::any()->match("any"); // true
```

### Matching any digit

The PHP way:
```php
preg_match("/\d/", "5"); // 1
```
The Greppy way:
```php
p::digit()->match("5"); // true
```

### Matching an exact character

The PHP way:
```php
preg_match("/e/", "hey"); // 1
```
The Greppy way:
```php
p::exact("e")->match("hey"); // true
```
