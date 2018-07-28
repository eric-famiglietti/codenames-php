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
    const DEFAULT_WIDTH = 5;

    /** @var int */
    const DEFAULT_HEIGHT = 5;

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
     * @return Keycard
     */
    public function makeKeycard(): Keycard
    {
        $color = $this->makeColor();
        $grid = $this->makeKeycardGrid($color);

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
     * @param Color $color
     *
     * @return KeycardGrid
     */
    private function makeKeycardGrid(Color $color): KeycardGrid
    {
        $dimensions = $this->makeDimensions();

        $values = $this->makeValues();
        $values = $this->populateValues($values, $color);

        $grid = $this->makeGrid($dimensions, $values);

        return new KeycardGrid($grid);
    }

    /**
     * @return Dimensions
     */
    private function makeDimensions(): Dimensions
    {
        return new Dimensions(self::DEFAULT_WIDTH, self::DEFAULT_HEIGHT);
    }

    /**
     * @return array
     */
    private function makeValues(): array
    {
        $values = [];

        foreach (range(0, self::DEFAULT_WIDTH - 1) as $x) {
            foreach (range(0, self::DEFAULT_HEIGHT - 1) as $y) {
                $values[$x][$y] = self::DEFAULT_VALUE;
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

        $values = $this->placeValuesRandomly($values, KeycardValues::RED, $redsCount);
        $values = $this->placeValuesRandomly($values, KeycardValues::BLUE, $bluesCount);
        $values = $this->placeValuesRandomly($values, KeycardValues::ASSASSIN, self::ASSASSINS_COUNT);

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
            $x = rand(0, self::DEFAULT_WIDTH - 1);
            $y = rand(0, self::DEFAULT_HEIGHT - 1);

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
