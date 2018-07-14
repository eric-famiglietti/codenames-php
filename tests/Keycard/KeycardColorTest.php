<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Keycard\KeycardColor;
use Codenames\Keycard\KeycardException;
use Codenames\Team\TeamColors;
use PHPUnit\Framework\TestCase;

class KeycardColorTest extends TestCase
{
    const INVALID_COLOR = 2;

    public function testItThrowsAnExceptionIfTheColorIsInvalid(): void
    {
        $this->expectException(KeycardException::class);

        new KeycardColor(self::INVALID_COLOR);
    }

    public function testItCreatesAKeycardColor(): void
    {
        $color = new KeycardColor(TeamColors::RED);

        $this->assertInstanceOf(KeycardColor::class, $color);
    }

    public function testItGetsTheColor(): void
    {
        $color = new KeycardColor(TeamColors::RED);

        $this->assertEquals(TeamColors::RED, $color->getColor());
    }

    public function testItReturnsTrueIfTheColorIsRed(): void
    {
        $color = new KeycardColor(TeamColors::RED);

        $this->assertTrue($color->isRed());
    }

    public function testItReturnsFalseIfTheColorIsNotRed(): void
    {
        $color = new KeycardColor(TeamColors::BLUE);

        $this->assertFalse($color->isRed());
    }

    public function testItReturnsTrueIfTheColorIsBlue(): void
    {
        $color = new KeycardColor(TeamColors::BLUE);

        $this->assertTrue($color->isBlue());
    }

    public function testItReturnsFalseIfTheColorIsNotBlue(): void
    {
        $color = new KeycardColor(TeamColors::RED);

        $this->assertFalse($color->isBlue());
    }
}
