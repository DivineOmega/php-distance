<?php

namespace DivineOmega\Distance\Tests;

use DivineOmega\Distance\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testGetDimensions()
    {
        $point = new Point(10, 20);

        $this->assertSame(2, $point->getDimensions());
    }

    public function testGetCoordinates()
    {
        $point = new Point(10, 20);

        $this->assertSame([10, 20], $point->getCoordinates());
    }

    public function testConstructorWithNonNumericValue()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Coordinate value must be numeric.');

        new Point('value1', 'value2');
    }
}
