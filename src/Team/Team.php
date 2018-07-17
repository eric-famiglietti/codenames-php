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
     * Create a new team instance.
     *
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
     * Get the color of the team.
     *
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * Determine if the team is the given color.
     *
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
     * Determine if the team is red.
     *
     * @return bool
     */
    public function isRed(): bool
    {
        return $this->isColor(TeamColors::RED);
    }

    /**
     * Determine if the team is blue.
     *
     * @return bool
     */
    public function isBlue(): bool
    {
        return $this->isColor(TeamColors::BLUE);
    }

    /**
     * Get the spymaster of the team.
     *
     * @return Player
     */
    public function getSpymaster(): Player
    {
        return $this->players->getSpymaster();
    }

    /**
     * Get the operative of the team.
     *
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
