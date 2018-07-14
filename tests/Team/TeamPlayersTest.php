<?php

declare(strict_types=1);

namespace Tests\Codenames\Team;

use Codenames\Player\Player;
use Codenames\Player\PlayerRoles;
use Codenames\Team\TeamException;
use Codenames\Team\TeamPlayers;
use PHPUnit\Framework\TestCase;

class TeamPlayersTest extends TestCase
{
    public function testItThrowsAnExceptionIfThePlayerIsNotASpymaster(): void
    {
        $this->expectException(TeamException::class);

        $operative = new Player('Eric', PlayerRoles::OPERATIVE);

        new TeamPlayers($operative, $operative);
    }

    public function testItThrowsAnExceptionIfThePlayerIsNotAnOperative(): void
    {
        $this->expectException(TeamException::class);

        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);

        new TeamPlayers($spymaster, $spymaster);
    }

    public function testItCreatesATeamPlayers(): void
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $players = new TeamPlayers($spymaster, $operative);

        $this->assertInstanceOf(TeamPlayers::class, $players);
    }

    public function testItGetsTheSpymaster(): void
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $players = new TeamPlayers($spymaster, $operative);

        $this->assertEquals($spymaster, $players->getSpymaster());
    }

    public function testItGetsTheOperative(): void
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $players = new TeamPlayers($spymaster, $operative);

        $this->assertEquals($operative, $players->getOperative());
    }
}
