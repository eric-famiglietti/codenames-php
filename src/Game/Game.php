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
     * Create a new game instance.
     *
     * @param GameTeams $teams
     * @param Keycard   $keycard
     */
    public function __construct(GameTeams $teams, Keycard $keycard)
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
