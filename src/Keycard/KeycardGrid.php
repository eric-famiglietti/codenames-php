<?php

declare(strict_types=1);

namespace Codenames\Keycard;

class KeycardGrid
{
    /** @var KeycardGridDimensions */
    private $dimensions;

    /** @var array */
    private $grid;

    /**
     * Create a new keycard grid instance.
     *
     * @param KeycardGridDimensions $dimensions
     * @param array                 $grid
     */
    public function __construct(KeycardGridDimensions $dimensions, array $grid)
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
     */
    public function getValue(int $x, int $y): int
    {
        $this->checkBounds($x, $y);

        return $this->grid[$x][$y];
    }

    /**
     * @param array                 $grid
     * @param KeycardGridDimensions $dimensions
     *
     * @throws KeycardException
     */
    private function checkGridWidth(array $grid, KeycardGridDimensions $dimensions): void
    {
        if (count($grid) !== $dimensions->getWidth()) {
            throw new KeycardException('Grid width does not match dimensions width.');
        }
    }

    /**
     * @param array                 $grid
     * @param KeycardGridDimensions $dimensions
     *
     * @throws KeycardException
     */
    private function checkGridHeight(array $grid, KeycardGridDimensions $dimensions): void
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
     * @throws KeycardException
     */
    private function checkGridValues(array $grid): void
    {
        foreach ($grid as $column) {
            foreach ($column as $value) {
                if (!KeycardValues::isValidValue($value)) {
                    throw new KeycardException('Invalid value.');
                }
            }
        }
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @throws KeycardException
     */
    private function checkBounds(int $x, int $y): void
    {
        if ($x < 0 || $x >= $this->dimensions->getWidth()) {
            throw new KeycardException('X value out of bounds.');
        }

        if ($y < 0 || $y >= $this->dimensions->getHeight()) {
            throw new KeycardException('Y value out of bounds.');
        }
    }
}
