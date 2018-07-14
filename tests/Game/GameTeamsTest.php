<?php

declare(strict_types=1);

namespace Tests\Codenames\Game;

use Codenames\Game\GameException;
use Codenames\Game\GameTeams;
use Codenames\Team\Team;
use Codenames\Team\TeamFactory;
use PHPUnit\Framework\TestCase;

final class GameTeamsTest extends TestCase
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
        $this->expectException(GameException::class);

        new GameTeams($this->blueTeam, $this->blueTeam);
    }

    public function testItThrowsAnExceptionIfTheBlueTeamIsNotBlue(): void
    {
        $this->expectException(GameException::class);

        new GameTeams($this->redTeam, $this->redTeam);
    }

    public function testItCreatesAGameTeams(): void
    {
        $teams = new GameTeams($this->redTeam, $this->blueTeam);

        $this->assertInstanceOf(GameTeams::class, $teams);
    }

    public function testItGetsTheRedTeam(): void
    {
        $teams = new GameTeams($this->redTeam, $this->blueTeam);

        $this->assertEquals($this->redTeam, $teams->getRedTeam());
    }

    public function testItGetsTheBlueTeam(): void
    {
        $teams = new GameTeams($this->redTeam, $this->blueTeam);

        $this->assertEquals($this->blueTeam, $teams->getBlueTeam());
    }
}
