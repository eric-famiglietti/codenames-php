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
     * @param KeycardColor $color
     * @param KeycardGrid  $grid
     */
    public function __construct(KeycardColor $color, KeycardGrid $grid)
    {
        $this->color = $color;
        $this->grid = $grid;
    }

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color->getColor();
    }

    /**
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
