<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Team\TeamColors;

class KeycardColor
{
    /** @var int */
    private $color;

    /**
     * @param int $color
     */
    public function __construct(int $color)
    {
        $this->checkColor($color);

        $this->color = $color;
    }

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * @return bool
     */
    public function isRed(): bool
    {
        return TeamColors::RED === $this->color;
    }

    /**
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
