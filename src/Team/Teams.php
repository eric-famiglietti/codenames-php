<?php

declare(strict_types=1);

namespace Codenames\Team;

class Teams
{
    /** @var Team */
    private $redTeam;

    /** @var Team */
    private $blueTeam;

    /**
     * Create a new game teams instance.
     *
     * @param Team $redTeam
     * @param Team $blueTeam
     *
     * @throws TeamException if the team is not red
     * @throws TeamException if the team is not blue
     */
    public function __construct(Team $redTeam, Team $blueTeam)
    {
        $this->checkRedTeam($redTeam);
        $this->checkBlueTeam($blueTeam);

        $this->redTeam = $redTeam;
        $this->blueTeam = $blueTeam;
    }

    /**
     * Get the red team of the game.
     *
     * @return Team
     */
    public function getRedTeam(): Team
    {
        return $this->redTeam;
    }

    /**
     * Get the blue team of the game.
     *
     * @return Team
     */
    public function getBlueTeam(): Team
    {
        return $this->blueTeam;
    }

    /**
     * @param Team $team
     *
     * @throws TeamException if the team is not red
     */
    private function checkRedTeam(Team $team): void
    {
        if (!$team->getColor()->isRed()) {
            throw new TeamException('Team must be red.');
        }
    }

    /**
     * @param Team $team
     *
     * @throws TeamException if the team is not blue
     */
    private function checkBlueTeam(Team $team): void
    {
        if (!$team->getColor()->isBlue()) {
            throw new TeamException('Team must be blue.');
        }
    }
}
