<?php

declare(strict_types=1);

namespace Codenames\Game;

use Codenames\Card\CardGrid;
use Codenames\Keycard\Keycard;
use Codenames\Team\Team;
use Codenames\Team\Teams;

class Game
{
    /** @var Teams */
    private $teams;

    /** @var Keycard */
    private $keycard;

    /** @var CardGrid */
    private $cardGrid;

    /**
     * Create a new game instance.
     *
     * @param Teams    $teams
     * @param Keycard  $keycard
     * @param CardGrid $cardGrid
     *
     * @throws GameException if the keycard and card grid dimensions aren't equivalent
     */
    public function __construct(Teams $teams, Keycard $keycard, CardGrid $cardGrid)
    {
        $this->checkDimensions($keycard, $cardGrid);

        $this->teams = $teams;
        $this->keycard = $keycard;
        $this->cardGrid = $cardGrid;
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

    /**
     * Get the card grid of the game.
     *
     * @return CardGrid
     */
    public function getCardGrid(): CardGrid
    {
        return $this->cardGrid;
    }

    /**
     * @param Keycard  $keycard
     * @param CardGrid $cardGrid
     *
     * @throws GameException if the keycard and card grid dimensions aren't equivalent
     */
    private function checkDimensions(Keycard $keycard, CardGrid $cardGrid): void
    {
        $keycardDimensions = $keycard->getDimensions();
        $cardGridDimensions = $cardGrid->getDimensions();

        if (!$keycardDimensions->equals($cardGridDimensions)) {
            throw new GameException('Keycard and card grid dimensions must be equivalent.');
        }
    }
}
