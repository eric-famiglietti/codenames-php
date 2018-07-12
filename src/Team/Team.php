<?php

declare(strict_types=1);

namespace Codenames\Team;

class Team
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
     * @param int $color
     *
     * @return bool
     */
    public function isColor(int $color): bool
    {
        $this->checkColor($color);

        return $this->color === $color;
    }

    /**
     * @return bool
     */
    public function isRed(): bool
    {
        return $this->isColor(TeamColors::RED);
    }

    /**
     * @return bool
     */
    public function isBlue(): bool
    {
        return $this->isColor(TeamColors::BLUE);
    }

    /**
     * @param int $color
     *
     * @throws TeamException
     */
    private function checkColor(int $color): void
    {
        if (!TeamColors::isValidValue($color)) {
            throw new TeamException('Invalid color.');
        }
    }
}
