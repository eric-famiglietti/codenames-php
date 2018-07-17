<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Color\Color;
use Codenames\Color\ColorException;
use Codenames\Color\ColorValues;
use PHPUnit\Framework\TestCase;

final class ColorTest extends TestCase
{
    /** @var int */
    const INVALID_VALUE = 2;

    public function testItThrowsAnExceptionIfTheValueIsInvalid(): void
    {
        $this->expectException(ColorException::class);

        new Color(self::INVALID_VALUE);
    }

    public function testItCreatesAColor(): void
    {
        $color = new Color(ColorValues::RED);

        $this->assertInstanceOf(Color::class, $color);
    }

    public function testItGetsTheValue(): void
    {
        $color = new Color(ColorValues::RED);

        $this->assertEquals(ColorValues::RED, $color->getValue());
    }

    public function testItThrowsAnExceptionIfTheValueIsInvalidWhenCheckingTheValue()
    {
        $this->expectException(ColorException::class);

        $color = new Color(ColorValues::RED);

        $color->isValue(self::INVALID_VALUE);
    }

    public function testItReturnsTrueIfTheValueIsTheValue(): void
    {
        $color = new Color(ColorValues::RED);

        $this->assertTrue($color->isValue(ColorValues::RED));
    }

    public function testItReturnsFalseIfTheValueIsntTheValue(): void
    {
        $color = new Color(ColorValues::RED);

        $this->assertFalse($color->isValue(ColorValues::BLUE));
    }

    public function testItReturnsTrueIfTheValueIsRed(): void
    {
        $color = new Color(ColorValues::RED);

        $this->assertTrue($color->isRed());
    }

    public function testItReturnsFalseIfTheValueIsNotRed(): void
    {
        $color = new Color(ColorValues::BLUE);

        $this->assertFalse($color->isRed());
    }

    public function testItReturnsTrueIfTheValueIsBlue(): void
    {
        $color = new Color(ColorValues::BLUE);

        $this->assertTrue($color->isBlue());
    }

    public function testItReturnsFalseIfTheValueIsNotBlue(): void
    {
        $color = new Color(ColorValues::RED);

        $this->assertFalse($color->isBlue());
    }
}
