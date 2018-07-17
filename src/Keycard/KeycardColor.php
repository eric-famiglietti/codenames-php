<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Team\TeamColors;

class KeycardColor
{
    /** @var int */
    private $color;

    /**
     * Create a new keycard color instance.
     *
     * @param int $color
     */
    public function __construct(int $color)
    {
        $this->checkColor($color);

        $this->color = $color;
    }

    /**
     * Get the color of the keycard color.
     *
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * Determine if the color is red.
     *
     * @return bool
     */
    public function isRed(): bool
    {
        return TeamColors::RED === $this->color;
    }

    /**
     * Determine if the color is blue.
     *
     * @return bool
     */
    public function isBlue(): bool
    {
        return TeamColors::BLUE === $this->color;
    }

    /**
     * @param int $color
     *
     * @throws KeycardException
     */
    private function checkColor(int $color): void
    {
        if (!TeamColors::isValidValue($color)) {
            throw new KeycardException('Invalid color.');
        }
    }
}
