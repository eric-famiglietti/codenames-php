<?php

declare(strict_types=1);

namespace Tests\Codenames\Player;

use Codenames\Player\Player;
use Codenames\Player\PlayerException;
use Codenames\Player\PlayerRoles;
use PHPUnit\Framework\TestCase;

final class PlayerTest extends TestCase
{
    /** @var int */
    const INVALID_ROLE = 2;

    public function testItThrowsAnExceptionIfTheRoleIsInvalid(): void
    {
        $this->expectException(PlayerException::class);

        $player = new Player('Eric', self::INVALID_ROLE);
    }

    public function testItCreatesAPlayer(): void
    {
        $player = new Player('Eric', PlayerRoles::SPYMASTER);

        $this->assertInstanceOf(Player::class, $player);
    }

    public function testItGetsTheName(): void
    {
        $name = 'Eric';

        $player = new Player($name, PlayerRoles::SPYMASTER);

        $this->assertEquals($name, $player->getName());
    }

    public function testItGetsTheRole(): void
    {
        $role = PlayerRoles::SPYMASTER;

        $player = new Player('Eric', $role);

        $this->assertEquals($role, $player->getRole());
    }

    public function testItThrowsAnExceptionIfTheRoleIsInvalidWhenCheckingTheRole(): void
    {
        $this->expectException(PlayerException::class);

        $player = new Player('Eric', PlayerRoles::SPYMASTER);

        $player->isRole(self::INVALID_ROLE);
    }

    public function testItReturnsTrueIfThePlayerIsTheRole(): void
    {
        $role = PlayerRoles::SPYMASTER;
        $spymaster = new Player('Eric', $role);

        $this->assertTrue($spymaster->isRole($role));
    }

    public function testItReturnsFalseIfThePlayerIsntTheRole(): void
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);

        $this->assertFalse($spymaster->isRole(PlayerRoles::OPERATIVE));
    }

    public function testItReturnsTrueIfThePlayerIsASpymaster(): void
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);

        $this->assertTrue($spymaster->isSpymaster());
    }

    public function testItReturnsFalseIfThePlayerIsntASpymaster(): void
    {
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $this->assertFalse($operative->isSpymaster());
    }

    public function testItReturnsFalseIfThePlayerIsntAnOperative(): void
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);

        $this->assertFalse($spymaster->isOperative());
    }

    public function testItReturnsTrueIfThePlayerIsAnOperative(): void
    {
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $this->assertTrue($operative->isOperative());
    }
}
