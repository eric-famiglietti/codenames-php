<?php

declare(strict_types=1);

namespace Tests\Codenames\Game;

use Codenames\Card\CardGrid;
use Codenames\Card\CardGridFactory;
use Codenames\Deck\DeckFactory;
use Codenames\Dimension\Dimensions;
use Codenames\Game\Game;
use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardFactory;
use Codenames\Team\Team;
use Codenames\Team\TeamFactory;
use Codenames\Team\Teams;

final class GameFixture
{
    const WORDS = [
        'closed',
        'billowy',
        'example',
        'partner',
        'believe',
        'head',
        'appliance',
        'label',
        'group',
        'loutish',
        'government',
        'fragile',
        'magical',
        'class',
        'story',
        'shy',
        'furtive',
        'frame',
        'homely',
        'yielding',
        'recondite',
        'pen',
        'fry',
        'crayon',
        'super',
    ];

    /** @var Team */
    private $redTeam;

    /** @var Team */
    private $blueTeam;

    /** @var Teams */
    private $teams;

    /** @var Keycard */
    private $keycard;

    /** @var CardGrid */
    private $cardGrid;

    /** @var Game */
    private $game;

    /**
     * Create a new game fixture instance.
     */
    public function __construct()
    {
        $teamFactory = new TeamFactory();
        $this->redTeam = $teamFactory->makeRedTeam('Eric', 'Myles');
        $this->blueTeam = $teamFactory->makeBlueTeam('Greg', 'Mike');

        $this->teams = new Teams($this->redTeam, $this->blueTeam);

        $dimensions = new Dimensions(5, 5);

        $keycardFactory = new KeycardFactory();
        $this->keycard = $keycardFactory->makeKeycard($dimensions);

        $deckFactory = new DeckFactory();
        $deck = $deckFactory->makeDeck(self::WORDS);

        $cardGridFactory = new CardGridFactory();
        $this->cardGrid = $cardGridFactory->makeCardGrid($dimensions, $deck);

        $this->game = new Game($this->teams, $this->keycard, $this->cardGrid);
    }

    /**
     * Gets the red team of the game fixture.
     *
     * @return Team
     */
    public function getRedTeam(): Team
    {
        return $this->redTeam;
    }

    /**
     * Gets the blue team of the game fixture.
     *
     * @return Team
     */
    public function getBlueTeam(): Team
    {
        return $this->blueTeam;
    }

    /**
     * Gets the teams of the game fixture.
     *
     * @return Teams
     */
    public function getTeams(): Teams
    {
        return $this->teams;
    }

    /**
     * Gets the keycard of the game fixture.
     *
     * @return Keycard
     */
    public function getKeycard(): Keycard
    {
        return $this->keycard;
    }

    /**
     * Gets the card grid of the game fixture.
     *
     * @return CardGrid
     */
    public function getCardGrid(): CardGrid
    {
        return $this->cardGrid;
    }

    /**
     * Gets the game of the game fixture.
     *
     * @return Game
     */
    public function getGame(): Game
    {
        return $this->game;
    }
}
