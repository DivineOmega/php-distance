<?php

require_once __DIR__.'/vendor/autoload.php';

use DivineOmega\Distance\Point;
use DivineOmega\Distance\Distance;
use DivineOmega\Distance\Types\Euclidean;

$a = new Point(1, 1);
$b = new Point(2, 2);

$distance = (new Distance())
    ->type(new Euclidean())
    ->from($a)
    ->to($b)
    ->get();

echo $distance;
echo PHP_EOL;