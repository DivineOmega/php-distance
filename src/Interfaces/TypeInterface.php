<?php

namespace DivineOmega\Distance\Interfaces;

use DivineOmega\Distance\Point;

/**
 * Interface TypeInterface
 * @package DivineOmega\Distance\Interfaces
 */
interface TypeInterface
{
    /**
     * @param Point $a
     * @param Point $b
     * @return mixed
     */
    public function calculate(Point $a, Point $b);
}