# PHP Distance

[![Build Status](https://travis-ci.org/DivineOmega/php-distance.svg?branch=master)](https://travis-ci.org/DivineOmega/php-distance)
[![Coverage Status](https://coveralls.io/repos/github/DivineOmega/php-distance/badge.svg?branch=master)](https://coveralls.io/github/DivineOmega/php-distance?branch=master)
[![Packagist](https://img.shields.io/packagist/dt/divineomega/php-distance.svg)](https://packagist.org/packages/divineomega/php-distance/stats)

The PHP Distance library allows for calculation of many types of distance between points.

## Installation

PHP Distance can be easily installed using Composer. Just run the following command from the root of your project.

```
composer require divineomega/php-distance
```

If you have never used the Composer dependency manager before, head to the [Composer website](https://getcomposer.org/) for more information on how to get started.

## Usage

See the following code snippet that demonstates how to use this library.

```php
$a = new Point($x1, $y1);
$b = new Point($x2, $y2);
$c = new Point($x3, $y3, $z3); # Infinite dimensions supported by some distance types

$distanceType = new Euclidean();
$distanceType = new EuclideanSquare();
$distanceType = new Haversine();	# For GPS coordinates (latitude and longitude)

$distance = (new Distance())
		->type(new Euclidean())	# Type is optional, and defaults to Euclidean distance
		->from($a)
		->to($b)
		->get();
```
