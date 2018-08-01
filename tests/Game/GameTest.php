<?php

declare(strict_types=1);

namespace Tests\Codenames\Game;

use Codenames\Card\CardGrid;
use Codenames\Card\CardGridFactory;
use Codenames\Deck\DeckFactory;
use Codenames\Dimension\Dimensions;
use Codenames\Game\Game;
use Codenames\Game\GameException;
use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardFactory;
use Codenames\Team\Team;
use Codenames\Team\TeamFactory;
use Codenames\Team\Teams;
use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
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

    public function setUp(): void
    {
        parent::setUp();

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

    public function testItThrowsAnExceptionIfTheDimensionsDontMatch(): void
    {
        $this->expectException(GameException::class);

        $teams = $this->teams;
        $dimensions = new Dimensions(6, 6);
        $keycardFactory = new KeycardFactory();
        $keycard = $keycardFactory->makeKeycard($dimensions);
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
