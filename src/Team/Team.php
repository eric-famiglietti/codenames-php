<?php

declare(strict_types=1);

namespace Codenames\Team;

use Codenames\Color\Color;
use Codenames\Player\Player;

class Team
{
    /** @var Color */
    private $color;

    /** @var TeamPlayers */
    private $players;

    /**
     * Create a new team instance.
     *
     * @param Color       $color
     * @param TeamPlayers $players
     */
    public function __construct(Color $color, TeamPlayers $players)
    {
        $this->color = $color;
        $this->players = $players;
    }

    /**
     * Get the color of the team.
     *
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
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
}
