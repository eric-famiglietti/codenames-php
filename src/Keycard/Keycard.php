<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Color\Color;
use Codenames\Dimension\Dimensions;

class Keycard
{
    /** @var Color */
    private $color;

    /** @var KeycardGrid */
    private $keycardGrid;

    /**
     * Create a new keycard instance.
     *
     * @param Color       $color
     * @param KeycardGrid $keycardGrid
     */
    public function __construct(Color $color, KeycardGrid $keycardGrid)
    {
        $this->color = $color;
        $this->keycardGrid = $keycardGrid;
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
     * Get the keycard's dimensions.
     *
     * @return Dimensions
     */
    public function getDimensions(): Dimensions
    {
        return $this->keycardGrid->getDimensions();
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
        return $this->keycardGrid->getValue($x, $y);
    }
}
