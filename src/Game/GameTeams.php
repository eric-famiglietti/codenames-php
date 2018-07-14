<?php

declare(strict_types=1);

namespace Codenames\Game;

use Codenames\Team\Team;

class GameTeams
{
    /** @var Team $redTeam */
    private $redTeam;

    /** @var Team $blueTeam */
    private $blueTeam;

    /**
     * @param Team $redTeam
     * @param Team $blueTeam
     */
    public function __construct(Team $redTeam, Team $blueTeam)
    {
        $this->checkRedTeam($redTeam);
        $this->checkBlueTeam($blueTeam);

        $this->redTeam = $redTeam;
        $this->blueTeam = $blueTeam;
    }

    /**
     * @return Team
     */
    public function getRedTeam(): Team
    {
        return $this->redTeam;
    }

    /**
     * @return Team
     */
    public function getBlueTeam(): Team
    {
        return $this->blueTeam;
    }

    /**
     * @param Team $team
     *
     * @throws GameException
     */
    private function checkRedTeam(Team $team): void
    {
        if (!$team->isRed()) {
            throw new GameException('Team must be red.');
        }
    }

    /**
     * @param Team $team
     *
     * @throws GameException
     */
    private function checkBlueTeam(Team $team): void
    {
        if (!$team->isBlue()) {
            throw new GameException('Team must be blue.');
        }
    }
}
