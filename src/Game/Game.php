<?php

declare(strict_types=1);

namespace Codenames\Game;

use Codenames\Keycard\Keycard;
use Codenames\Team\Team;
use Codenames\Team\Teams;

class Game
{
    /** @var Teams */
    private $teams;

    /** @var Keycard */
    private $keycard;

    /**
     * Create a new game instance.
     *
     * @param Teams   $teams
     * @param Keycard $keycard
     */
    public function __construct(Teams $teams, Keycard $keycard)
    {
        $this->teams = $teams;
        $this->keycard = $keycard;
    }

    /**
     * Get the red team of the game.
     *
     * @return Team
     */
    public function getRedTeam(): Team
    {
        return $this->teams->getRedTeam();
    }

    /**
     * Get the blue team of the game.
     *
     * @return Team
     */
    public function getBlueTeam(): Team
    {
        return $this->teams->getBlueTeam();
    }

    /**
     * Get the keycard of the game.
     *
     * @return Keycard
     */
    public function getKeycard(): Keycard
    {
        return $this->keycard;
    }
}
