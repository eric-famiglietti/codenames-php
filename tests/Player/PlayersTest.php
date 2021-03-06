<?php

declare(strict_types=1);

namespace Tests\Codenames\Player;

use Codenames\Player\Player;
use Codenames\Player\PlayerException;
use Codenames\Player\PlayerFactory;
use Codenames\Player\Players;
use PHPUnit\Framework\TestCase;

final class PlayersTest extends TestCase
{
    /** @var Player */
    private $spymaster;

    /** @var Player */
    private $operative;

    public function setUp(): void
    {
        parent::setUp();

        $playerFactory = new PlayerFactory();

        $this->spymaster = $playerFactory->makeSpymaster('Eric');
        $this->operative = $playerFactory->makeOperative('Myles');
    }

    public function testItThrowsAnExceptionIfThePlayerIsNotASpymaster(): void
    {
        $this->expectException(PlayerException::class);

        new Players($this->operative, $this->operative);
    }

    public function testItThrowsAnExceptionIfThePlayerIsNotAnOperative(): void
    {
        $this->expectException(PlayerException::class);

        new Players($this->spymaster, $this->spymaster);
    }

    public function testItCreatesAPlayers(): void
    {
        $players = new Players($this->spymaster, $this->operative);

        $this->assertInstanceOf(Players::class, $players);
    }

    public function testItGetsTheSpymaster(): void
    {
        $players = new Players($this->spymaster, $this->operative);

        $this->assertEquals($this->spymaster, $players->getSpymaster());
    }

    public function testItGetsTheOperative(): void
    {
        $players = new Players($this->spymaster, $this->operative);

        $this->assertEquals($this->operative, $players->getOperative());
    }
}
