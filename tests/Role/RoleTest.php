<?php

declare(strict_types=1);

namespace Tests\Codenames\Role;

use Codenames\Role\Role;
use Codenames\Role\RoleException;
use Codenames\Role\RoleValues;
use PHPUnit\Framework\TestCase;

final class RoleTest extends TestCase
{
    /** @var int */
    const INVALID_VALUE = 2;

    public function testItThrowsAnExceptionIfTheValueIsInvalid(): void
    {
        $this->expectException(RoleException::class);

        new Role(self::INVALID_VALUE);
    }

    public function testItCreatesARole(): void
    {
        $role = new Role(RoleValues::SPYMASTER);

        $this->assertInstanceOf(Role::class, $role);
    }

    public function testItGetsTheValue(): void
    {
        $role = new Role(RoleValues::SPYMASTER);

        $this->assertEquals(RoleValues::SPYMASTER, $role->getValue());
    }

    public function testItThrowsAnExceptionIfTheValueIsInvalidWhenCheckingTheValue(): void
    {
        $this->expectException(RoleException::class);

        $role = new Role(RoleValues::SPYMASTER);

        $role->isValue(self::INVALID_VALUE);
    }

    public function testItReturnsTrueIfTheValueIsTheValue(): void
    {
        $role = new Role(RoleValues::SPYMASTER);

        $this->assertTrue($role->isValue(RoleValues::SPYMASTER));
    }

    public function testItReturnsFalseIfTheValueIsntTheValue(): void
    {
        $role = new Role(RoleValues::SPYMASTER);

        $this->assertFalse($role->isValue(RoleValues::OPERATIVE));
    }

    public function testItReturnsTrueIfTheValueIsSpymaster(): void
    {
        $role = new Role(RoleValues::SPYMASTER);

        $this->assertTrue($role->isSpymaster());
    }

    public function testItReturnsFalseIfTheValueIsNotSpymaster(): void
    {
        $role = new Role(RoleValues::OPERATIVE);

        $this->assertFalse($role->isSpymaster());
    }

    public function testItReturnsTrueIfTheValueIsOperative(): void
    {
        $role = new Role(RoleValues::OPERATIVE);

        $this->assertTrue($role->isOperative());
    }

    public function testItReturnsFalseIfTheValueIsNotOperative(): void
    {
        $role = new Role(RoleValues::SPYMASTER);

        $this->assertFalse($role->isOperative());
    }
}
