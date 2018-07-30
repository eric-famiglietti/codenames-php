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
    const DEFAULT_VALUE = KeycardValues::BYSTANDER;

    /** @var int */
    const REDS_COUNT = 8;

    /** @var int */
    const BLUES_COUNT = 8;

    /** @var int */
    const ASSASSINS_COUNT = 1;

    /**
     * Create a new keycard instance.
     *
     * @param Dimensions $dimensions
     *
     * @return Keycard
     */
    public function makeKeycard(Dimensions $dimensions): Keycard
    {
        $color = $this->makeColor();
        $grid = $this->makeKeycardGrid($dimensions, $color);

        return new Keycard($color, $grid);
    }

    /**
     * @return Color
     */
    private function makeColor(): Color
    {
        $value = self::COLOR_VALUES[array_rand(self::COLOR_VALUES)];

        return new Color($value);
    }

    /**
     * @param Dimensions $dimensions
     * @param Color      $color
     *
     * @return KeycardGrid
     */
    private function makeKeycardGrid(Dimensions $dimensions, Color $color): KeycardGrid
    {
        $values = $this->makeValues($dimensions);
        $values = $this->populateValues($dimensions, $values, $color);

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
                $values[$x][$y] = self::DEFAULT_VALUE;
            }
        }

        return $values;
    }

    /**
     * @param Dimensions $dimensions
     * @param array      $values
     * @param Color      $color
     *
     * @return array
     */
    private function populateValues(Dimensions $dimensions, array $values, Color $color): array
    {
        $redsCount = $this->calculateRedsCount($color);
        $bluesCount = $this->calculateBluesCount($color);

        $values = $this->placeValuesRandomly($dimensions, $values, KeycardValues::RED, $redsCount);
        $values = $this->placeValuesRandomly($dimensions, $values, KeycardValues::BLUE, $bluesCount);
        $values = $this->placeValuesRandomly($dimensions, $values, KeycardValues::ASSASSIN, self::ASSASSINS_COUNT);

        return $values;
    }

    /**
     * @param Color $color
     *
     * @return int
     */
    private function calculateRedsCount(Color $color): int
    {
        if ($color->isRed()) {
            return self::REDS_COUNT + 1;
        }

        return self::REDS_COUNT;
    }

    /**
     * @param Color $color
     *
     * @return int
     */
    private function calculateBluesCount(Color $color): int
    {
        if ($color->isBlue()) {
            return self::BLUES_COUNT + 1;
        }

        return self::BLUES_COUNT;
    }

    /**
     * @param Dimensions $dimensions
     * @param array      $values
     * @param int        $value
     * @param int        $count
     *
     * @return array
     */
    private function placeValuesRandomly(Dimensions $dimensions, array $values, int $value, int $count): array
    {
        foreach (range(0, $count - 1) as $i) {
            $values = $this->placeValueRandomly($dimensions, $values, $value);
        }

        return $values;
    }

    /**
     * @param Dimensions $dimensions
     * @param array      $values
     * @param int        $value
     *
     * @return array
     */
    private function placeValueRandomly(Dimensions $dimensions, array $values, int $value): array
    {
        while (true) {
            $x = rand(0, $dimensions->getWidth() - 1);
            $y = rand(0, $dimensions->getHeight() - 1);

            if (self::DEFAULT_VALUE === $values[$x][$y]) {
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
