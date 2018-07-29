<?php

declare(strict_types=1);

namespace Codenames\Card;

use Codenames\Grid\Grid;

class CardGrid
{
    /** @var Grid */
    private $grid;

    /**
     * Create a new card grid instance.
     *
     * @param Grid $grid
     *
     * @throws CardException if the grid values are not card objects
     */
    public function __construct(Grid $grid)
    {
        $this->checkValues($grid->getValues());

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

        $values = $this->grid->getValues();

        return $values[$x][$y];
    }

    /**
     * @param array $values
     *
     * @throws CardException if the grid values are not card objects
     */
    private function checkValues(array $values): void
    {
        foreach ($values as $column) {
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
        $dimensions = $this->grid->getDimensions();

        if (!$dimensions->isValidX($x)) {
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
        $dimensions = $this->grid->getDimensions();

        if (!$dimensions->isValidY($y)) {
            throw new CardException('Y value out of bounds.');
        }
    }
}
