<?php

declare(strict_types=1);

namespace Codenames\Team;

use Codenames\Player\Player;

class Team
{
    /** @var int */
    private $color;

    /** @var TeamPlayers */
    private $players;

    /**
     * @param int         $color
     * @param TeamPlayers $players
     */
    public function __construct(int $color, TeamPlayers $players)
    {
        $this->checkColor($color);

        $this->color = $color;
        $this->players = $players;
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
     * @return Player
     */
    public function getSpymaster(): Player
    {
        return $this->players->getSpymaster();
    }

    /**
     * @return Player
     */
    public function getOperative(): Player
    {
        return $this->players->getOperative();
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
