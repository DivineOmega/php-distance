<?php

namespace DivineOmega\Distance\Types;

use DivineOmega\Distance\Interfaces\TypeInterface;
use DivineOmega\Distance\Point;

/**
 * Class Euclidean
 * @package DivineOmega\Distance\Types
 */
class Euclidean implements TypeInterface
{
    /**
     * @param Point $a
     * @param Point $b
     * @return float|int
     */
    public function calculate(Point $a, Point $b)
    {
        $dimensions = $a->getDimensions();
        $aCoords = $a->getCoordinates();
        $bCoords = $b->getCoordinates();

        $distance = 0;

        for($i = 0; $i < $dimensions; $i++) {
            $distance += ($bCoords[$i] - $aCoords[$i]) ** 2;
        }

        $distance = sqrt($distance);

        return $distance;
    }
}