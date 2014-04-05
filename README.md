Greppy
==================
[![Build Status](https://travis-ci.org/drgomesp/Greppy.svg?branch=master)](https://travis-ci.org/drgomesp/Greppy)

Feature Guide
-------------

### Matching any single character

The PHP way:
```php
preg_match("/./", "some text to match");
```
The Greppy way:
```php
p::any()->match("some text to match");
```

### Matching any digit

The PHP way:
```php
preg_match("/\d/", "some text that contains a digit: 10");
```
The Greppy way:
```php
p::digit()->match("some text that contains a digit: 10");
```
