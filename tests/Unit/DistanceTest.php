<?php

namespace DivineOmega\Distance\Tests;

use DivineOmega\Distance\Distance;
use DivineOmega\Distance\Point;
use DivineOmega\Distance\Types\Euclidean;
use DivineOmega\Distance\Types\EuclideanSquare;
use DivineOmega\Distance\Types\Haversine;
use PHPUnit\Framework\TestCase;

class DistanceTest extends TestCase
{
    public function distanceTypeProvider()
    {
        return [
            [new Euclidean(), 28.284271247462],
            [new EuclideanSquare(), 800],
            [new Haversine(), 3040.6028180682],
        ];
    }

    /**
     * @dataProvider distanceTypeProvider
     */
    public function testGetWithSpecificDistance($distanceType, $expectedDistance)
    {
        $a = new Point(10, 20);
        $b = new Point(30, 40);
        $distance = new Distance();
        $actualDistance = $distance
            ->type($distanceType)
            ->from($a)
            ->to($b)
            ->get();

        $this->assertSame($expectedDistance, $actualDistance);
    }

    public function testGetWithDifferentCoordinateDimension()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Points must have the same number of dimensions.');

        $a = new Point(10, 20, 30);
        $b = new Point(30, 40);
        $distance = new Distance();
        $distance
            ->from($a)
            ->to($b)
            ->get();
    }

    public function testGetWithDifferentCoordinateDimensionOnHaversine()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Geographic coordinate points can only have 2 dimensions, latitude and longitude.');

        $a = new Point(10, 20, 30);
        $b = new Point(10, 20, 30);

        $distance = new Distance();
        $distance
            ->type(new Haversine())
            ->from($a)
            ->to($b)
            ->get();
    }
}
