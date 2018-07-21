<?php

declare(strict_types=1);

namespace Tests\Codenames\Team;

use Codenames\Player\Player;
use Codenames\Player\PlayerFactory;
use Codenames\Team\TeamException;
use Codenames\Team\TeamPlayers;
use PHPUnit\Framework\TestCase;

final class TeamPlayersTest extends TestCase
{
    /** @var Player */
    private $spymaster;

    /** @var Player */
    private $operative;

    public function setUp(): void
    {
        parent::setUp();

        $factory = new PlayerFactory();

        $this->spymaster = $factory->makeSpymaster('Eric');
        $this->operative = $factory->makeOperative('Myles');
    }

    public function testItThrowsAnExceptionIfThePlayerIsNotASpymaster(): void
    {
        $this->expectException(TeamException::class);

        new TeamPlayers($this->operative, $this->operative);
    }

    public function testItThrowsAnExceptionIfThePlayerIsNotAnOperative(): void
    {
        $this->expectException(TeamException::class);

        new TeamPlayers($this->spymaster, $this->spymaster);
    }

    public function testItCreatesATeamPlayers(): void
    {
        $players = new TeamPlayers($this->spymaster, $this->operative);

        $this->assertInstanceOf(TeamPlayers::class, $players);
    }

    public function testItGetsTheSpymaster(): void
    {
        $players = new TeamPlayers($this->spymaster, $this->operative);

        $this->assertEquals($this->spymaster, $players->getSpymaster());
    }

    public function testItGetsTheOperative(): void
    {
        $players = new TeamPlayers($this->spymaster, $this->operative);

        $this->assertEquals($this->operative, $players->getOperative());
    }
}
