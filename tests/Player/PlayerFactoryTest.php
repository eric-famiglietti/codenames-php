<?php

declare(strict_types=1);

namespace Tests\Codenames\Player;

use Codenames\Player\Player;
use Codenames\Player\PlayerFactory;
use PHPUnit\Framework\TestCase;

final class PlayerFactoryTest extends TestCase
{
    /** @var PlayerFactory */
    private $playerFactory;

    public function setUp(): void
    {
        parent::setUp();

        $this->playerFactory = new PlayerFactory();
    }

    public function testItCreatesAPlayerFactory(): void
    {
        $this->assertInstanceOf(PlayerFactory::class, $this->playerFactory);
    }

    public function testItMakesAPlayer(): void
    {
        $player = $this->playerFactory->makeSpymaster('Eric');

        $this->assertInstanceOf(Player::class, $player);
    }

    public function testItMakesASpymaster(): void
    {
        $player = $this->playerFactory->makeSpymaster('Eric');

        $this->assertTrue($player->getRole()->isSpymaster());
    }

    public function testItMakesAnOperative(): void
    {
        $player = $this->playerFactory->makeOperative('Eric');

        $this->assertTrue($player->getRole()->isOperative());
    }
}
