<?php

declare(strict_types=1);

namespace Tests\Codenames\Team;

use Codenames\Player\Player;
use Codenames\Player\PlayerRoles;
use Codenames\Team\Team;
use Codenames\Team\TeamColors;
use Codenames\Team\TeamException;
use Codenames\Team\TeamPlayers;
use PHPUnit\Framework\TestCase;

class TeamTest extends TestCase
{
    const INVALID_COLOR = 2;

    private $players;

    public function setUp()
    {
        parent::setUp();

        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $this->players = new TeamPlayers($spymaster, $operative);
    }

    public function testItThrowsAnExceptionIfTheColorIsInvalidWhenCreatingATeam()
    {
        $this->expectException(TeamException::class);

        new Team(self::INVALID_COLOR, $this->players);
    }

    public function testItCreatesATeam()
    {
        $team = new Team(TeamColors::RED, $this->players);

        $this->assertInstanceOf(Team::class, $team);
    }

    public function testGetsTheColor()
    {
        $color = TeamColors::RED;

        $team = new Team($color, $this->players);

        $this->assertEquals($color, $team->getColor());
    }

    public function testItThrowsAnExceptionIfTheColorIsInvalidWhenCheckingTheColor()
    {
        $this->expectException(TeamException::class);

        $team = new Team(TeamColors::RED, $this->players);

        $team->isColor(self::INVALID_COLOR);
    }

    public function testItReturnsTrueIfTheColorMatches()
    {
        $color = TeamColors::RED;
        $team = new Team($color, $this->players);

        $this->assertTrue($team->isColor($color));
    }

    public function testItReturnsFalseIfTheColorDoesntMatch()
    {
        $team = new Team(TeamColors::RED, $this->players);

        $this->assertFalse($team->isColor(TeamColors::BLUE));
    }

    public function testItReturnsTrueIfTheColorIsRed()
    {
        $team = new Team(TeamColors::RED, $this->players);

        $this->assertTrue($team->isRed());
    }

    public function testItReturnsFalseIfTheColorIsntRed()
    {
        $team = new Team(TeamColors::BLUE, $this->players);

        $this->assertFalse($team->isRed());
    }

    public function testItReturnsTrueIfTheColorIsBlue()
    {
        $team = new Team(TeamColors::BLUE, $this->players);

        $this->assertTrue($team->isBlue());
    }

    public function testItReturnsFalseIfTheColorIsntBlue()
    {
        $team = new Team(TeamColors::RED, $this->players);

        $this->assertFalse($team->isBlue());
    }

    public function testItGetsTheSpymaster()
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);
        $players = new TeamPlayers($spymaster, $operative);
        $team = new Team(TeamColors::RED, $players);

        $this->assertEquals($spymaster, $team->getSpymaster());
    }

    public function testItGetsTheOperative()
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);
        $players = new TeamPlayers($spymaster, $operative);
        $team = new Team(TeamColors::RED, $players);

        $this->assertEquals($operative, $team->getOperative());
    }
}
