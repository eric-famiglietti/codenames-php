<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Color\Color;

class Keycard
{
    /** @var Color */
    private $color;

    /** @var KeycardGrid */
    private $grid;

    /**
     * Create a new keycard instance.
     *
     * @param Color       $color
     * @param KeycardGrid $grid
     */
    public function __construct(Color $color, KeycardGrid $grid)
    {
        $this->color = $color;
        $this->grid = $grid;
    }

    /**
     * Get the color of the keycard.
     *
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
    }

    /**
     * Get the value of the keycard at the given coordinates.
     *
     * @param int $x
     * @param int $y
     *
     * @return int
     */
    public function getValue(int $x, int $y): int
    {
        return $this->grid->getValue($x, $y);
    }
}
