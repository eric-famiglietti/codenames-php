<?php

declare(strict_types=1);

namespace Tests\Codenames\Game;

use Codenames\Game\Game;
use Codenames\Game\NewGameFactory;
use Codenames\Team\TeamFactory;
use PHPUnit\Framework\TestCase;

final class NewGameFactoryTest extends TestCase
{
    /** @var NewGameFactory */
    private $newGameFactory;

    public function setUp(): void
    {
        parent::setUp();

        $this->newGameFactory = new NewGameFactory();
    }

    public function testItCreatesANewGameFactory(): void
    {
        $this->assertInstanceOf(NewGameFactory::class, $this->newGameFactory);
    }

    public function testItCreatesAGame(): void
    {
        $teamFactory = new TeamFactory();
        $redTeam = $teamFactory->makeRedTeam('Eric', 'Myles');
        $blueTeam = $teamFactory->makeBlueTeam('Greg', 'Mike');

        $game = $this->newGameFactory->makeGame($redTeam, $blueTeam);

        $this->assertInstanceOf(Game::class, $game);
    }
}
