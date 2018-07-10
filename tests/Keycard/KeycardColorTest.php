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

    public function testItThrowsAnExceptionIfTheColorIsInvalid()
    {
        $this->expectException(KeycardException::class);

        new KeycardColor(self::INVALID_COLOR);
    }

    public function testItCreatesAKeycardColor()
    {
        $color = new KeycardColor(TeamColors::RED);

        $this->assertInstanceOf(KeycardColor::class, $color);
    }

    public function testItGetsTheColor()
    {
        $color = new KeycardColor(TeamColors::RED);

        $this->assertEquals(TeamColors::RED, $color->getColor());
    }

    public function testItReturnsTrueIfTheColorIsRed()
    {
        $color = new KeycardColor(TeamColors::RED);

        $this->assertTrue($color->isRed());
    }

    public function testItReturnsFalseIfTheColorIsNotRed()
    {
        $color = new KeycardColor(TeamColors::BLUE);

        $this->assertFalse($color->isRed());
    }

    public function testItReturnsTrueIfTheColorIsBlue()
    {
        $color = new KeycardColor(TeamColors::BLUE);

        $this->assertTrue($color->isBlue());
    }

    public function testItReturnsFalseIfTheColorIsNotBlue()
    {
        $color = new KeycardColor(TeamColors::RED);

        $this->assertFalse($color->isBlue());
    }
}
