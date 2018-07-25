<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Dimension\Dimensions;

class KeycardGrid
{
    /** @var Dimensions */
    private $dimensions;

    /** @var array */
    private $grid = [];

    /**
     * Create a new keycard grid instance.
     *
     * @param Dimensions $dimensions
     * @param array      $grid
     *
     * @throws KeycardException if the grid width does not match the dimensions width
     * @throws KeycardException if the grid height does not match the dimensions height
     * @throws KeycardException if the grid values are not valid keycard values
     */
    public function __construct(Dimensions $dimensions, array $grid)
    {
        $this->checkGridWidth($grid, $dimensions);
        $this->checkGridHeight($grid, $dimensions);
        $this->checkGridValues($grid);

        $this->dimensions = $dimensions;
        $this->grid = $grid;
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

        return $this->grid[$x][$y];
    }

    /**
     * @param array      $grid
     * @param Dimensions $dimensions
     *
     * @throws KeycardException if the grid width does not match the dimensions width
     */
    private function checkGridWidth(array $grid, Dimensions $dimensions): void
    {
        if (count($grid) !== $dimensions->getWidth()) {
            throw new KeycardException('Grid width does not match dimensions width.');
        }
    }

    /**
     * @param array      $grid
     * @param Dimensions $dimensions
     *
     * @throws KeycardException if the grid height does not match the dimensions height
     */
    private function checkGridHeight(array $grid, Dimensions $dimensions): void
    {
        $height = $dimensions->getHeight();

        foreach ($grid as $column) {
            if (count($column) !== $height) {
                throw new KeycardException('Grid height does not match dimensions height.');
            }
        }
    }

    /**
     * @param array $grid
     *
     * @throws KeycardException if the grid values are not valid keycard values
     */
    private function checkGridValues(array $grid): void
    {
        foreach ($grid as $column) {
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
        if ($x < 0 || $x >= $this->dimensions->getWidth()) {
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
        if ($y < 0 || $y >= $this->dimensions->getHeight()) {
            throw new KeycardException('Y value out of bounds.');
        }
    }
}
