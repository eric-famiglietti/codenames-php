<?php

declare(strict_types=1);

namespace Codenames\Game;

use Codenames\Keycard\Keycard;
use Codenames\Team\Team;

class Game
{
    /** @var GameTeams */
    private $teams;

    /** @var Keycard */
    private $keycard;

    /**
     * @param GameTeams $teams
     */
    public function __construct(GameTeams $teams, Keycard $keycard)
    {
        $this->teams = $teams;
        $this->keycard = $keycard;
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

    /**
     * @return Keycard
     */
    public function getKeycard(): Keycard
    {
        return $this->keycard;
    }
}
