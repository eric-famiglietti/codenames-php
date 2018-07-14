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
    /** @var int */
    const INVALID_COLOR = 2;

    /** @var TeamPlayers */
    private $players;

    public function setUp(): void
    {
        parent::setUp();

        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $this->players = new TeamPlayers($spymaster, $operative);
    }

    public function testItThrowsAnExceptionIfTheColorIsInvalidWhenCreatingATeam(): void
    {
        $this->expectException(TeamException::class);

        new Team(self::INVALID_COLOR, $this->players);
    }

    public function testItCreatesATeam(): void
    {
        $team = new Team(TeamColors::RED, $this->players);

        $this->assertInstanceOf(Team::class, $team);
    }

    public function testGetsTheColor(): void
    {
        $color = TeamColors::RED;

        $team = new Team($color, $this->players);

        $this->assertEquals($color, $team->getColor());
    }

    public function testItThrowsAnExceptionIfTheColorIsInvalidWhenCheckingTheColor(): void
    {
        $this->expectException(TeamException::class);

        $team = new Team(TeamColors::RED, $this->players);

        $team->isColor(self::INVALID_COLOR);
    }

    public function testItReturnsTrueIfTheColorMatches(): void
    {
        $color = TeamColors::RED;
        $team = new Team($color, $this->players);

        $this->assertTrue($team->isColor($color));
    }

    public function testItReturnsFalseIfTheColorDoesntMatch(): void
    {
        $team = new Team(TeamColors::RED, $this->players);

        $this->assertFalse($team->isColor(TeamColors::BLUE));
    }

    public function testItReturnsTrueIfTheColorIsRed(): void
    {
        $team = new Team(TeamColors::RED, $this->players);

        $this->assertTrue($team->isRed());
    }

    public function testItReturnsFalseIfTheColorIsntRed(): void
    {
        $team = new Team(TeamColors::BLUE, $this->players);

        $this->assertFalse($team->isRed());
    }

    public function testItReturnsTrueIfTheColorIsBlue(): void
    {
        $team = new Team(TeamColors::BLUE, $this->players);

        $this->assertTrue($team->isBlue());
    }

    public function testItReturnsFalseIfTheColorIsntBlue(): void
    {
        $team = new Team(TeamColors::RED, $this->players);

        $this->assertFalse($team->isBlue());
    }

    public function testItGetsTheSpymaster(): void
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);
        $players = new TeamPlayers($spymaster, $operative);
        $team = new Team(TeamColors::RED, $players);

        $this->assertEquals($spymaster, $team->getSpymaster());
    }

    public function testItGetsTheOperative(): void
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);
        $players = new TeamPlayers($spymaster, $operative);
        $team = new Team(TeamColors::RED, $players);

        $this->assertEquals($operative, $team->getOperative());
    }
}
