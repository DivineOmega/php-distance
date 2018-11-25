<?php

namespace DivineOmega\Distance;

/**
 * Class Point
 * @package DivineOmega\Distance
 */
class Point
{
    /**
     * @var array
     */
    private $coordinates;

    /**
     * Point constructor.
     * @param mixed ...$coordinates
     */
    public function __construct(... $coordinates)
    {
        $this->coordinates = $coordinates;
        $this->sanityCheck();
    }

    /**
     * @return int
     */
    public function getDimensions()
    {
        return count($this->getCoordinates());
    }

    /**
     * @return array|mixed[]
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     *
     */
    private function sanityCheck()
    {
        foreach ($this->coordinates as $coordinate) {
            if (!is_numeric($coordinate)) {
                throw new \InvalidArgumentException('Coordinate value must be numeric.');
            }
        }
    }
}