<?php

declare(strict_types=1);

namespace Tests\Codenames\Game;

use Codenames\Card\CardGrid;
use Codenames\Card\CardGridFactory;
use Codenames\Deck\DeckFactory;
use Codenames\Dictionary\Dictionary;
use Codenames\Dimension\Dimensions;
use Codenames\Game\Game;
use Codenames\Game\GameException;
use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardFactory;
use Codenames\Keycard\KeycardValueCounts;
use Codenames\Team\Team;
use Codenames\Team\TeamFactory;
use Codenames\Team\Teams;
use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    /** @var Team */
    private $redTeam;

    /** @var Team */
    private $blueTeam;

    /** @var Teams */
    private $teams;

    /** @var KeycardValueCounts */
    private $keycardValueCounts;

    /** @var Keycard */
    private $keycard;

    /** @var CardGrid */
    private $cardGrid;

    /** @var Game */
    private $game;

    public function setUp(): void
    {
        parent::setUp();

        $teamFactory = new TeamFactory();
        $this->redTeam = $teamFactory->makeRedTeam('Eric', 'Myles');
        $this->blueTeam = $teamFactory->makeBlueTeam('Greg', 'Mike');

        $this->teams = new Teams($this->redTeam, $this->blueTeam);

        $dimensions = new Dimensions(5, 5);

        $this->keycardValueCounts = new KeycardValueCounts(8, 8, 1);

        $keycardFactory = new KeycardFactory($dimensions, $this->keycardValueCounts);
        $this->keycard = $keycardFactory->makeKeycard();

        $dictionary = new Dictionary();
        $deckFactory = new DeckFactory($dictionary);
        $deck = $deckFactory->makeDeck();

        $cardGridFactory = new CardGridFactory();
        $this->cardGrid = $cardGridFactory->makeCardGrid($dimensions, $deck);

        $this->game = new Game($this->teams, $this->keycard, $this->cardGrid);
    }

    public function testItThrowsAnExceptionIfTheDimensionsDontMatch(): void
    {
        $this->expectException(GameException::class);

        $teams = $this->teams;
        $dimensions = new Dimensions(6, 6);
        $keycardFactory = new KeycardFactory($dimensions, $this->keycardValueCounts);
        $keycard = $keycardFactory->makeKeycard();
        $cardGrid = $this->cardGrid;

        new Game($teams, $keycard, $cardGrid);
    }

    public function testItCreatesAGame(): void
    {
        $this->assertInstanceOf(Game::class, $this->game);
    }

    public function testItGetsTheRedTeam(): void
    {
        $this->assertEquals($this->redTeam, $this->game->getRedTeam());
    }

    public function testItGetsTheBlueTeam(): void
    {
        $this->assertEquals($this->blueTeam, $this->game->getBlueTeam());
    }

    public function testItGetsTheKeycard(): void
    {
        $this->assertEquals($this->keycard, $this->game->getKeycard());
    }

    public function testItGetsTheCardGrid(): void
    {
        $this->assertEquals($this->cardGrid, $this->game->getCardGrid());
    }
}
