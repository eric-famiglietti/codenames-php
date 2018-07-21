<?php

declare(strict_types=1);

namespace Tests\Codenames\Player;

use Codenames\Player\Player;
use Codenames\Role\Role;
use Codenames\Role\RoleValues;
use PHPUnit\Framework\TestCase;

final class PlayerTest extends TestCase
{
    /** @var int */
    const INVALID_ROLE = 2;

    public function testItCreatesAPlayer(): void
    {
        $role = new Role(RoleValues::SPYMASTER);
        $player = new Player('Eric', $role);

        $this->assertInstanceOf(Player::class, $player);
    }

    public function testItGetsTheName(): void
    {
        $name = 'Eric';
        $role = new Role(RoleValues::SPYMASTER);
        $player = new Player($name, $role);

        $this->assertEquals($name, $player->getName());
    }

    public function testItGetsTheRole(): void
    {
        $role = new Role(RoleValues::SPYMASTER);
        $player = new Player('Eric', $role);

        $this->assertEquals($role, $player->getRole());
    }
}
