<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Dimension\Dimensions;
use Codenames\Grid\Grid;

class KeycardGrid
{
    /** @var Grid */
    private $grid;

    /**
     * Create a new keycard grid instance.
     *
     * @param Grid $grid
     *
     * @throws KeycardException if the grid values are not keycard values
     */
    public function __construct(Grid $grid)
    {
        $this->checkValues($grid->getValues());

        $this->grid = $grid;
    }

    /**
     * Get the keycard grid's dimensions.
     *
     * @return Dimensions
     */
    public function getDimensions(): Dimensions
    {
        return $this->grid->getDimensions();
    }

    /**
     * Get the value of the keycard grid at the given coordinates.
     *
     * @param int $x
     * @param int $y
     *
     * @return int
     *
     * @throws KeycardException if the x value is out of bounds
     * @throws KeycardException if the y value is out of bounds
     */
    public function getValue(int $x, int $y): int
    {
        $this->checkX($x);
        $this->checkY($y);

        $values = $this->grid->getValues();

        return $values[$x][$y];
    }

    /**
     * @param array $values
     *
     * @throws KeycardException if the grid values are not keycard values
     */
    private function checkValues(array $values): void
    {
        foreach ($values as $column) {
            foreach ($column as $value) {
                if (!KeycardValues::isValidValue($value)) {
                    throw new KeycardException('Invalid keycard value.');
                }
            }
        }
    }

    /**
     * @param int $x
     *
     * @throws KeycardException if the x value is out of bounds
     */
    private function checkX(int $x): void
    {
        $dimensions = $this->grid->getDimensions();

        if (!$dimensions->isValidX($x)) {
            throw new KeycardException('X value out of bounds.');
        }
    }

    /**
     * @param int $y
     *
     * @throws KeycardException if the y value is out of bounds
     */
    private function checkY(int $y): void
    {
        $dimensions = $this->grid->getDimensions();

        if (!$dimensions->isValidY($y)) {
            throw new KeycardException('Y value out of bounds.');
        }
    }
}
