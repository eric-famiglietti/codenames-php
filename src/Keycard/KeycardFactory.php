<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Color\Color;
use Codenames\Color\ColorValues;
use Codenames\Dimension\Dimensions;
use Codenames\Grid\Grid;

class KeycardFactory
{
    /** @var array */
    const COLOR_VALUES = [ColorValues::RED, ColorValues::BLUE];

    /** @var int */
    const DEFAULT_GRID_VALUE = KeycardValues::BYSTANDER;

    /**
     * Create a new keycard instance.
     *
     * @param Dimensions         $dimensions
     * @param KeycardValueCounts $keycardValueCounts
     *
     * @return Keycard
     */
    public function makeKeycard(Dimensions $dimensions, KeycardValueCounts $keycardValueCounts): Keycard
    {
        $color = $this->makeRandomColor();
        $keycardGrid = $this->makeKeycardGrid($dimensions, $keycardValueCounts, $color);

        return new Keycard($color, $keycardGrid);
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
     * @param Dimensions         $dimensions
     * @param KeycardValueCounts $keycardValueCounts
     * @param Color              $color
     *
     * @return KeycardGrid
     */
    private function makeKeycardGrid(Dimensions $dimensions, KeycardValueCounts $keycardValueCounts, Color $color): KeycardGrid
    {
        $values = $this->makeValues($dimensions);
        $values = $this->populateValues($values, $keycardValueCounts, $color);

        $grid = $this->makeGrid($dimensions, $values);

        return new KeycardGrid($grid);
    }

    /**
     * @param Dimensions $dimensions
     *
     * @return array
     */
    private function makeValues(Dimensions $dimensions): array
    {
        $values = [];

        foreach (range(0, $dimensions->getWidth() - 1) as $x) {
            foreach (range(0, $dimensions->getHeight() - 1) as $y) {
                $values[$x][$y] = self::DEFAULT_GRID_VALUE;
            }
        }

        return $values;
    }

    /**
     * @param array              $values
     * @param KeycardValueCounts $keycardValueCounts
     * @param Color              $color
     *
     * @return array
     */
    private function populateValues(array $values, KeycardValueCounts $keycardValueCounts, Color $color): array
    {
        $redsCount = $this->calculateRedsCount($color, $keycardValueCounts);
        $bluesCount = $this->calculateBluesCount($color, $keycardValueCounts);

        $values = $this->placeValuesRandomly($values, KeycardValues::RED, $redsCount);
        $values = $this->placeValuesRandomly($values, KeycardValues::BLUE, $bluesCount);
        $values = $this->placeValuesRandomly($values, KeycardValues::ASSASSIN, $keycardValueCounts->getAssassinsCount());

        return $values;
    }

    /**
     * @param Color              $color
     * @param KeycardValueCounts $keycardValueCounts
     *
     * @return int
     */
    private function calculateRedsCount(Color $color, KeycardValueCounts $keycardValueCounts): int
    {
        if ($color->isRed()) {
            return $keycardValueCounts->getRedsCount() + 1;
        }

        return $keycardValueCounts->getRedsCount();
    }

    /**
     * @param Color              $color
     * @param KeycardValueCounts $keycardValueCounts
     *
     * @return int
     */
    private function calculateBluesCount(Color $color, KeycardValueCounts $keycardValueCounts): int
    {
        if ($color->isBlue()) {
            return $keycardValueCounts->getBluesCount() + 1;
        }

        return $keycardValueCounts->getBluesCount();
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
     * @param Dimensions $dimensions
     * @param array      $values
     *
     * @return Grid
     */
    private function makeGrid(Dimensions $dimensions, array $values): Grid
    {
        return new Grid($dimensions, $values);
    }
}
