<?php

declare(strict_types=1);

namespace Codenames\Team;

use Codenames\Color\Color;
use Codenames\Player\Player;
use Codenames\Player\Players;

class Team
{
    /** @var Color */
    private $color;

    /** @var Players */
    private $players;

    /**
     * Create a new team instance.
     *
     * @param Color   $color
     * @param Players $players
     */
    public function __construct(Color $color, Players $players)
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
