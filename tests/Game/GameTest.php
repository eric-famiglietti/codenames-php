<?php

declare(strict_types=1);

namespace Tests\Codenames\Game;

use Codenames\Dimension\Dimensions;
use Codenames\Game\Game;
use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardFactory;
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

    /** @var Keycard */
    private $keycard;

    /** @var Game */
    private $game;

    public function setUp(): void
    {
        parent::setUp();

        $teamFactory = new TeamFactory();

        $this->redTeam = $teamFactory->makeRedTeam('Eric', 'Myles');
        $this->blueTeam = $teamFactory->makeBlueTeam('Greg', 'Mike');

        $teams = new Teams($this->redTeam, $this->blueTeam);

        $keycardFactory = new KeycardFactory();
        $dimensions = new Dimensions(5, 5);

        $this->keycard = $keycardFactory->makeKeycard($dimensions);

        $this->game = new Game($teams, $this->keycard);
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
}
