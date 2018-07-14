<?php

declare(strict_types=1);

namespace Codenames\Game;

use Codenames\Team\Team;

class Game
{
    /** @var GameTeams $teams */
    private $teams;

    /**
     * @param GameTeams $teams
     */
    public function __construct(GameTeams $teams)
    {
        $this->teams = $teams;
    }

    /**
     * @return Team
     */
    public function getRedTeam(): Team
    {
        return $this->teams->getRedTeam();
    }

    /**
     * @return Team
     */
    public function getBlueTeam(): Team
    {
        return $this->teams->getBlueTeam();
    }
}
