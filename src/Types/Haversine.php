<?php

namespace DivineOmega\Distance\Types;

use DivineOmega\Distance\Interfaces\TypeInterface;
use DivineOmega\Distance\Point;

/**
 * Class Euclidean
 * @package DivineOmega\Distance\Types
 */
class Haversine implements TypeInterface
{
    private $greatCircleRadius;

    /**
     * Haversine constructor.
     *
     * Defaults the great circle radius to Earth's radius in kilometres (km).
     *
     * @param int $greatCircleRadius
     */
    public function __construct(int $greatCircleRadius = 6371)
    {
        if ($greatCircleRadius <= 0) {
            throw new \InvalidArgumentException('Great circle radius must be positive.');
        }

        $this->greatCircleRadius = $greatCircleRadius;
    }

    /**
     * @param Point $a
     * @param Point $b
     * @return float|int
     */
    public function calculate(Point $a, Point $b)
    {
        if ($a->getDimensions() !== 2 || $b->getDimensions() !== 2) {
            throw new \InvalidArgumentException(
                'Geographic coordinate points can only have 2 dimensions, latitude and longitude.'
            );
        }

        $aCoords = $a->getCoordinates();
        $bCoords = $b->getCoordinates();

        $fromLatitude = deg2rad($aCoords[0]);
        $fromLongitude = deg2rad($aCoords[1]);
        $toLatitude = deg2rad($bCoords[0]);
        $toLongitude = deg2rad($bCoords[1]);

        $latitudeDelta = $toLatitude - $fromLatitude;
        $longitudeDelta = $toLongitude - $fromLongitude;

        $angle = 2 * asin(sqrt(pow(sin($latitudeDelta / 2), 2) +
                cos($fromLatitude) * cos($toLatitude) * pow(sin($longitudeDelta / 2), 2)));

        return $angle * $this->greatCircleRadius;
    }
}