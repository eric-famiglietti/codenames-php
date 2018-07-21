<?php

declare(strict_types=1);

namespace Tests\Codenames\Team;

use Codenames\Team\Team;
use Codenames\Team\TeamException;
use Codenames\Team\TeamFactory;
use Codenames\Team\Teams;
use PHPUnit\Framework\TestCase;

final class TeamsTest extends TestCase
{
    /** @var Team */
    private $redTeam;

    /** @var Team */
    private $blueTeam;

    public function setUp(): void
    {
        parent::setUp();

        $factory = new TeamFactory();

        $this->redTeam = $factory->makeRedTeam('Eric', 'Myles');
        $this->blueTeam = $factory->makeBlueTeam('Greg', 'Mike');
    }

    public function testItThrowsAnExceptionIfTheRedTeamIsNotRed(): void
    {
        $this->expectException(TeamException::class);

        new Teams($this->blueTeam, $this->blueTeam);
    }

    public function testItThrowsAnExceptionIfTheBlueTeamIsNotBlue(): void
    {
        $this->expectException(TeamException::class);

        new Teams($this->redTeam, $this->redTeam);
    }

    public function testItCreatesATeams(): void
    {
        $teams = new Teams($this->redTeam, $this->blueTeam);

        $this->assertInstanceOf(Teams::class, $teams);
    }

    public function testItGetsTheRedTeam(): void
    {
        $teams = new Teams($this->redTeam, $this->blueTeam);

        $this->assertEquals($this->redTeam, $teams->getRedTeam());
    }

    public function testItGetsTheBlueTeam(): void
    {
        $teams = new Teams($this->redTeam, $this->blueTeam);

        $this->assertEquals($this->blueTeam, $teams->getBlueTeam());
    }
}
