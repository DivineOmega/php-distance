<?php

require_once __DIR__.'/vendor/autoload.php';

use DivineOmega\Distance\Point;
use DivineOmega\Distance\Distance;
use DivineOmega\Distance\Types\Haversine;

$a = new Point(41.8350, 12.470);
$b = new Point(41.9133741000, 12.5203944000);

$distance = (new Distance())
    ->type(new Haversine())
    ->from($a)
    ->to($b)
    ->get();

echo $distance;
echo PHP_EOL;