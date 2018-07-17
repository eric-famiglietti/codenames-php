<?php

declare(strict_types=1);

namespace Codenames\Keycard;

class Keycard
{
    /** @var KeycardColor */
    private $color;

    /** @var KeycardGrid */
    private $grid;

    /**
     * Create a new keycard instance.
     *
     * @param KeycardColor $color
     * @param KeycardGrid  $grid
     */
    public function __construct(KeycardColor $color, KeycardGrid $grid)
    {
        $this->color = $color;
        $this->grid = $grid;
    }

    /**
     * Get the color of the keycard.
     *
     * @return int
     */
    public function getColor(): int
    {
        return $this->color->getColor();
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
