<?php

namespace DivineOmega\Distance;

use DivineOmega\Distance\Interfaces\TypeInterface;
use DivineOmega\Distance\Types\Euclidean;

/**
 * Class Distance
 * @package DivineOmega\Distance
 */
class Distance
{
    /**
     * @var TypeInterface
     */
    private $type;
    /**
     * @var Point
     */
    private $from;
    /**
     * @var Point
     */
    private $to;

    /**
     * Distance constructor.
     */
    public function __construct()
    {
        $this->type = new Euclidean();
    }

    /**
     * @param TypeInterface $type
     * @return Distance
     */
    public function type(TypeInterface $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param Point $from
     * @return Distance
     */
    public function from(Point $from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param Point $to
     * @return Distance
     */
    public function to(Point $to)
    {
        $this->to = $to;
        return $this;

    }

    /**
     * @return mixed
     */
    public function get()
    {
        $this->sanityCheck();

        return $this->type->calculate($this->from, $this->to);
    }

    /**
     *
     */
    private function sanityCheck()
    {
        if ($this->from->getDimensions() !== $this->to->getDimensions()) {
            throw new \InvalidArgumentException('Points must have the same number of dimensions.');
        }
    }
}