<?php

declare(strict_types=1);

namespace Tests\Codenames\Player;

use Codenames\Player\Player;
use Codenames\Player\PlayerException;
use Codenames\Player\PlayerRoles;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    const INVALID_ROLE = 2;

    public function testItThrowsAnExceptionIfTheRoleIsInvalid()
    {
        $this->expectException(PlayerException::class);

        $player = new Player('Eric', self::INVALID_ROLE);
    }

    public function testItCreatesAPlayer()
    {
        $player = new Player('Eric', PlayerRoles::SPYMASTER);

        $this->assertInstanceOf(Player::class, $player);
    }

    public function testItGetsTheName()
    {
        $name = 'Eric';

        $player = new Player($name, PlayerRoles::SPYMASTER);

        $this->assertEquals($name, $player->getName());
    }

    public function testItGetsTheRole()
    {
        $role = PlayerRoles::SPYMASTER;

        $player = new Player('Eric', $role);

        $this->assertEquals($role, $player->getRole());
    }

    public function testItReturnsTrueIfThePlayerIsTheRole()
    {
        $role = PlayerRoles::SPYMASTER;
        $spymaster = new Player('Eric', $role);

        $this->assertTrue($spymaster->isRole($role));
    }

    public function testItReturnsFalseIfThePlayerIsntTheRole()
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);

        $this->assertFalse($spymaster->isRole(PlayerRoles::OPERATIVE));
    }

    public function testItReturnsTrueIfThePlayerIsASpymaster()
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);

        $this->assertTrue($spymaster->isSpymaster());
    }

    public function testItReturnsFalseIfThePlayerIsntASpymaster()
    {
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $this->assertFalse($operative->isSpymaster());
    }

    public function testItReturnsFalseIfThePlayerIsntAnOperative()
    {
        $spymaster = new Player('Eric', PlayerRoles::SPYMASTER);

        $this->assertFalse($spymaster->isOperative());
    }

    public function testItReturnsTrueIfThePlayerIsAnOperative()
    {
        $operative = new Player('Myles', PlayerRoles::OPERATIVE);

        $this->assertTrue($operative->isOperative());
    }
}
