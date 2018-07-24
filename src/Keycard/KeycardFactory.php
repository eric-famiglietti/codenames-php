<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Color\Color;
use Codenames\Color\ColorValues;
use Codenames\Dimension\Dimensions;

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

        $grid = $this->makeGrid();
        $grid = $this->populateGrid($grid, $color);

        return new KeycardGrid($dimensions, $grid);
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
    private function makeGrid(): array
    {
        $grid = [];

        foreach (range(0, self::DEFAULT_WIDTH - 1) as $x) {
            foreach (range(0, self::DEFAULT_HEIGHT - 1) as $y) {
                $grid[$x][$y] = self::DEFAULT_VALUE;
            }
        }

        return $grid;
    }

    /**
     * @param array $grid
     * @param Color $color
     *
     * @return array
     */
    private function populateGrid(array $grid, Color $color): array
    {
        $redsCount = $this->calculateRedsCount($color);
        $bluesCount = $this->calculateBluesCount($color);

        $grid = $this->placeValuesRandomly($grid, KeycardValues::RED, $redsCount);
        $grid = $this->placeValuesRandomly($grid, KeycardValues::BLUE, $bluesCount);
        $grid = $this->placeValuesRandomly($grid, KeycardValues::ASSASSIN, self::ASSASSINS_COUNT);

        return $grid;
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
     * @param array $grid
     * @param int   $value
     * @param int   $count
     *
     * @return array
     */
    private function placeValuesRandomly(array $grid, int $value, int $count): array
    {
        foreach (range(0, $count - 1) as $i) {
            $grid = $this->placeValueRandomly($grid, $value);
        }

        return $grid;
    }

    /**
     * @param array $grid
     * @param int   $value
     *
     * @return array
     */
    private function placeValueRandomly(array $grid, int $value): array
    {
        while (true) {
            $x = rand(0, self::DEFAULT_WIDTH - 1);
            $y = rand(0, self::DEFAULT_HEIGHT - 1);

            if (self::DEFAULT_VALUE === $grid[$x][$y]) {
                $grid[$x][$y] = $value;

                return $grid;
            }
        }
    }
}
