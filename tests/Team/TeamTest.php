<?php

declare(strict_types=1);

namespace Tests\Codenames\Team;

use Codenames\Team\Team;
use Codenames\Team\TeamColors;
use Codenames\Team\TeamException;
use PHPUnit\Framework\TestCase;

class TeamTest extends TestCase
{
    const INVALID_COLOR = 2;

    public function testItThrowsAnExceptionIfTheColorIsInvalidWhenCreatingATeam()
    {
        $this->expectException(TeamException::class);

        new Team(self::INVALID_COLOR);
    }

    public function testItCreatesATeam()
    {
        $team = new Team(TeamColors::RED);

        $this->assertInstanceOf(Team::class, $team);
    }

    public function testGetsTheColor()
    {
        $color = TeamColors::RED;

        $team = new Team($color);

        $this->assertEquals($color, $team->getColor());
    }

    public function testItThrowsAnExceptionIfTheColorIsInvalidWhenCheckingTheColor()
    {
        $this->expectException(TeamException::class);

        $team = new Team(TeamColors::RED);

        $team->isColor(self::INVALID_COLOR);
    }

    public function testItReturnsTrueIfTheColorMatches()
    {
        $color = TeamColors::RED;
        $team = new Team($color);

        $this->assertTrue($team->isColor($color));
    }

    public function testItReturnsFalseIfTheColorDoesntMatch()
    {
        $team = new Team(TeamColors::RED);

        $this->assertFalse($team->isColor(TeamColors::BLUE));
    }

    public function testItReturnsTrueIfTheColorIsRed()
    {
        $team = new Team(TeamColors::RED);

        $this->assertTrue($team->isRed());
    }

    public function testItReturnsFalseIfTheColorIsntRed()
    {
        $team = new Team(TeamColors::BLUE);

        $this->assertFalse($team->isRed());
    }

    public function testItReturnsTrueIfTheColorIsBlue()
    {
        $team = new Team(TeamColors::BLUE);

        $this->assertTrue($team->isBlue());
    }

    public function testItReturnsFalseIfTheColorIsntBlue()
    {
        $team = new Team(TeamColors::RED);

        $this->assertFalse($team->isBlue());
    }
}
