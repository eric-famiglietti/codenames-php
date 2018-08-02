<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Color\Color;
use Codenames\Color\ColorValues;
use Codenames\Dimension\Dimensions;
use Codenames\Grid\Grid;

class KeycardFactory implements KeycardFactoryInterface
{
    /** @var array */
    const COLOR_VALUES = [ColorValues::RED, ColorValues::BLUE];

    /** @var int */
    const DEFAULT_GRID_VALUE = KeycardValues::BYSTANDER;

    /** @var int */
    const STARTING_COLOR_MODIFIER = 1;

    /** @var Dimensions */
    private $dimensions;

    /** @var KeycardValueCounts */
    private $keycardValueCounts;

    /**
     * Create a new keycard factory instance.
     *
     * @param Dimensions         $dimensions
     * @param KeycardValueCounts $keycardValueCounts
     *
     * @throws KeycardException if the number of values exceeds the size of the grid
     */
    public function __construct(Dimensions $dimensions, KeycardValueCounts $keycardValueCounts)
    {
        $this->checkValueCounts($dimensions, $keycardValueCounts);

        $this->dimensions = $dimensions;
        $this->keycardValueCounts = $keycardValueCounts;
    }

    /**
     * Create a new keycard instance.
     *
     * @return Keycard
     */
    public function makeKeycard(): Keycard
    {
        $color = $this->makeRandomColor();
        $keycardGrid = $this->makeKeycardGrid($color);

        return new Keycard($color, $keycardGrid);
    }

    /**
     * @param Dimensions         $dimensions
     * @param KeycardValueCounts $keycardValueCounts
     *
     * @throws KeycardException if the number of values exceeds the size of the grid
     */
    private function checkValueCounts(Dimensions $dimensions, KeycardValueCounts $keycardValueCounts): void
    {
        $area = $dimensions->getArea();
        $totalCount = $keycardValueCounts->getTotalCount() + self::STARTING_COLOR_MODIFIER;

        if ($totalCount > $area) {
            throw new KeycardException('The number of values exceeds the size of the grid.');
        }
    }

    /**
     * @return Color
     */
    private function makeRandomColor(): Color
    {
        $value = self::COLOR_VALUES[array_rand(self::COLOR_VALUES)];

        return new Color($value);
    }

    /**
     * @param Color $color
     *
     * @return KeycardGrid
     */
    private function makeKeycardGrid(Color $color): KeycardGrid
    {
        $values = $this->makeValues();
        $values = $this->populateValues($values, $color);

        $grid = $this->makeGrid($values);

        return new KeycardGrid($grid);
    }

    /**
     * @return array
     */
    private function makeValues(): array
    {
        $values = [];

        foreach (range(0, $this->dimensions->getWidth() - 1) as $x) {
            foreach (range(0, $this->dimensions->getHeight() - 1) as $y) {
                $values[$x][$y] = self::DEFAULT_GRID_VALUE;
            }
        }

        return $values;
    }

    /**
     * @param array $values
     * @param Color $color
     *
     * @return array
     */
    private function populateValues(array $values, Color $color): array
    {
        $redsCount = $this->calculateRedsCount($color);
        $bluesCount = $this->calculateBluesCount($color);
        $assassinsCount = $this->keycardValueCounts->getAssassinsCount();

        $values = $this->placeValuesRandomly($values, KeycardValues::RED, $redsCount);
        $values = $this->placeValuesRandomly($values, KeycardValues::BLUE, $bluesCount);
        $values = $this->placeValuesRandomly($values, KeycardValues::ASSASSIN, $assassinsCount);

        return $values;
    }

    /**
     * @param Color $color
     *
     * @return int
     */
    private function calculateRedsCount(Color $color): int
    {
        $redsCount = $this->keycardValueCounts->getRedsCount();

        return $color->isRed() ? $redsCount : $redsCount + self::STARTING_COLOR_MODIFIER;
    }

    /**
     * @param Color $color
     *
     * @return int
     */
    private function calculateBluesCount(Color $color): int
    {
        $bluesCount = $this->keycardValueCounts->getBluesCount();

        return $color->isBlue() ? $bluesCount : $bluesCount + self::STARTING_COLOR_MODIFIER;
    }

    /**
     * @param array $values
     * @param int   $value
     * @param int   $count
     *
     * @return array
     */
    private function placeValuesRandomly(array $values, int $value, int $count): array
    {
        foreach (range(0, $count - 1) as $i) {
            $values = $this->placeValueRandomly($values, $value);
        }

        return $values;
    }

    /**
     * @param array $values
     * @param int   $value
     *
     * @return array
     */
    private function placeValueRandomly(array $values, int $value): array
    {
        while (true) {
            $x = array_rand($values);
            $y = array_rand($values[$x]);

            if (self::DEFAULT_GRID_VALUE === $values[$x][$y]) {
                $values[$x][$y] = $value;

                return $values;
            }
        }
    }

    /**
     * @param array $values
     *
     * @return Grid
     */
    private function makeGrid(array $values): Grid
    {
        return new Grid($this->dimensions, $values);
    }
}
