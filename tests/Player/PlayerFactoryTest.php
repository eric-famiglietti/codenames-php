<?php

declare(strict_types=1);

namespace Tests\Codenames\Player;

use Codenames\Player\PlayerFactory;
use PHPUnit\Framework\TestCase;

final class PlayerFactoryTest extends TestCase
{
    /** @var PlayerFactory */
    private $factory;

    public function setUp(): void
    {
        parent::setUp();

        $this->factory = new PlayerFactory();
    }

    public function testItMakesASpymaster(): void
    {
        $player = $this->factory->makeSpymaster('Eric');

        $this->assertTrue($player->getRole()->isSpymaster());
    }

    public function testItMakesAnOperative(): void
    {
        $player = $this->factory->makeOperative('Eric');

        $this->assertTrue($player->getRole()->isOperative());
    }
}
