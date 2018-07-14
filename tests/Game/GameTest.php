<?php

declare(strict_types=1);

namespace Tests\Codenames\Game;

use Codenames\Game\Game;
use Codenames\Game\GameTeams;
use Codenames\Team\Team;
use Codenames\Team\TeamFactory;
use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    /** @var Team */
    private $redTeam;

    /** @var Team */
    private $blueTeam;

    /** @var Game */
    private $game;

    public function setUp(): void
    {
        parent::setUp();

        $factory = new TeamFactory();

        $this->redTeam = $factory->makeRedTeam('Eric', 'Myles');
        $this->blueTeam = $factory->makeBlueTeam('Greg', 'Mike');

        $teams = new GameTeams($this->redTeam, $this->blueTeam);

        $this->game = new Game($teams);
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
}
