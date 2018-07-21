<?php

declare(strict_types=1);

namespace Tests\Codenames\Team;

use Codenames\Color\Color;
use Codenames\Color\ColorValues;
use Codenames\Player\Player;
use Codenames\Player\PlayerFactory;
use Codenames\Player\Players;
use Codenames\Team\Team;
use PHPUnit\Framework\TestCase;

final class TeamTest extends TestCase
{
    /** @var Color */
    private $color;

    /** @var Player */
    private $spymaster;

    /** @var Player */
    private $operative;

    /** @var Team */
    private $team;

    public function setUp(): void
    {
        parent::setUp();

        $this->color = new Color(ColorValues::RED);

        $factory = new PlayerFactory();

        $this->spymaster = $factory->makeSpymaster('Eric');
        $this->operative = $factory->makeOperative('Myles');

        $players = new Players($this->spymaster, $this->operative);

        $this->team = new Team($this->color, $players);
    }

    public function testItCreatesATeam(): void
    {
        $this->assertInstanceOf(Team::class, $this->team);
    }

    public function testItGetsTheColor(): void
    {
        $this->assertEquals($this->color, $this->team->getColor());
    }

    public function testItGetsTheSpymaster(): void
    {
        $this->assertEquals($this->spymaster, $this->team->getSpymaster());
    }

    public function testItGetsTheOperative(): void
    {
        $this->assertEquals($this->operative, $this->team->getOperative());
    }
}
