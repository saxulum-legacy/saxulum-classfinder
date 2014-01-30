saxulum-classfinder
===================

[![Build Status](https://api.travis-ci.org/saxulum/saxulum-classfinder.png?branch=master)](https://travis-ci.org/saxulum/saxulum-classfinder)
[![Total Downloads](https://poser.pugx.org/saxulum/saxulum-classfinder/downloads.png)](https://packagist.org/packages/saxulum/saxulum-classfinder)
[![Latest Stable Version](https://poser.pugx.org/saxulum/saxulum-classfinder/v/stable.png)](https://packagist.org/packages/saxulum/saxulum-classfinder)

Features
--------

* Search all classes within a given php code as string

Requirements
------------

 * PHP 5.3+

Installation
------------

Through [Composer](http://getcomposer.org) as [saxulum/saxulum-classfinder][1].

Usage
-----

Get classes as an array

``` {.php}
$phpCode = file_get_contents(__DIR__ . '/../../../data/Sample.php');
$classes = ClassFinder::findClasses($phpCode);
```

Copyright
---------
* Dominik Zogg <dominik.zogg@gmail.com>

[1]: https://packagist.org/packages/saxulum/saxulum-classfinder