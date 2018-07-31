<?php

declare(strict_types=1);

namespace Tests\Codenames\Game;

use Codenames\Dimension\Dimensions;
use Codenames\Game\Game;
use Codenames\Game\GameException;
use Codenames\Keycard\KeycardFactory;
use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    /** @var GameFixture */
    private $gameFixture;

    public function setUp(): void
    {
        parent::setUp();

        $this->gameFixture = new GameFixture();
    }

    public function testItThrowsAnExceptionIfTheDimensionsDontMatch(): void
    {
        $this->expectException(GameException::class);

        $teams = $this->gameFixture->getTeams();
        $dimensions = new Dimensions(6, 6);
        $keycardFactory = new KeycardFactory();
        $keycard = $keycardFactory->makeKeycard($dimensions);
        $cardGrid = $this->gameFixture->getCardGrid();

        new Game($teams, $keycard, $cardGrid);
    }

    public function testItCreatesAGame(): void
    {
        $game = $this->gameFixture->getGame();

        $this->assertInstanceOf(Game::class, $game);
    }

    public function testItGetsTheRedTeam(): void
    {
        $expected = $this->gameFixture->getRedTeam();
        $actual = $this->gameFixture->getGame()->getRedTeam();

        $this->assertEquals($expected, $actual);
    }

    public function testItGetsTheBlueTeam(): void
    {
        $expected = $this->gameFixture->getBlueTeam();
        $actual = $this->gameFixture->getGame()->getBlueTeam();

        $this->assertEquals($expected, $actual);
    }

    public function testItGetsTheKeycard(): void
    {
        $expected = $this->gameFixture->getKeycard();
        $actual = $this->gameFixture->getGame()->getKeycard();

        $this->assertEquals($expected, $actual);
    }

    public function testItGetsTheCardGrid(): void
    {
        $expected = $this->gameFixture->getCardGrid();
        $actual = $this->gameFixture->getGame()->getCardGrid();

        $this->assertEquals($expected, $actual);
    }
}
