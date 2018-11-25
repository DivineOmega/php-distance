<?php

require_once __DIR__.'/vendor/autoload.php';

use DivineOmega\Distance\Point;
use DivineOmega\Distance\Distance;

$a = new Point(1, 1);
$b = new Point(1, 1);

$distance = (new Distance())
    ->from($a)
    ->to($b)
    ->get();

echo $distance;
echo PHP_EOL;