<?php

declare(strict_types=1);

namespace Codenames\Game;

use Codenames\Team\Team;

interface GameFactoryInterface
{
    /**
     * Create a new game instance.
     *
     * @param Team $redTeam
     * @param Team $blueTeam
     *
     * @return Game
     */
    public function makeGame(Team $redTeam, Team $blueTeam): Game;
}
