<?php

declare(strict_types=1);

namespace Codenames\Card;

use Codenames\Dimension\Dimensions;

class CardGrid
{
    /** @var Dimensions */
    private $dimensions;

    /** @var array */
    private $grid = [];

    /**
     * Create a new card grid instance.
     *
     * @param Dimensions $dimensions
     * @param array      $grid
     *
     * @throws CardException if the grid width does not match the dimensions width
     * @throws CardException if the grid height does not match the dimensions height
     * @throws CardException if the grid values are not valid card values
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
     * Get the value of the card grid at the given coordinates.
     *
     * @param int $x
     * @param int $y
     *
     * @return Card
     *
     * @throws CardException if the x value is out of bounds
     * @throws CardException if the y value is out of bounds
     */
    public function getValue(int $x, int $y): Card
    {
        $this->checkX($x);
        $this->checkY($y);

        return $this->grid[$x][$y];
    }

    /**
     * @param array      $grid
     * @param Dimensions $dimensions
     *
     * @throws CardException if the grid width does not match the dimensions width
     */
    private function checkGridWidth(array $grid, Dimensions $dimensions): void
    {
        if (count($grid) !== $dimensions->getWidth()) {
            throw new CardException('Grid width does not match dimensions width.');
        }
    }

    /**
     * @param array      $grid
     * @param Dimensions $dimensions
     *
     * @throws CardException if the grid height does not match the dimensions height
     */
    private function checkGridHeight(array $grid, Dimensions $dimensions): void
    {
        $height = $dimensions->getHeight();

        foreach ($grid as $column) {
            if (count($column) !== $height) {
                throw new CardException('Grid height does not match dimensions height.');
            }
        }
    }

    /**
     * @param array $grid
     *
     * @throws CardException if the grid values are not valid cards
     */
    private function checkGridValues(array $grid): void
    {
        foreach ($grid as $column) {
            foreach ($column as $value) {
                if (!$value instanceof Card) {
                    throw new CardException('Invalid card value.');
                }
            }
        }
    }

    /**
     * @param int $x
     *
     * @throws CardException if the x value is out of bounds
     */
    private function checkX(int $x): void
    {
        if ($x < 0 || $x >= $this->dimensions->getWidth()) {
            throw new CardException('X value out of bounds.');
        }
    }

    /**
     * @param int $y
     *
     * @throws CardException if the y value is out of bounds
     */
    private function checkY(int $y): void
    {
        if ($y < 0 || $y >= $this->dimensions->getHeight()) {
            throw new CardException('Y value out of bounds.');
        }
    }
}
