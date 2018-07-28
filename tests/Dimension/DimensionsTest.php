<?php

declare(strict_types=1);

namespace Tests\Codenames\Dimension;

use Codenames\Dimension\DimensionException;
use Codenames\Dimension\Dimensions;
use PHPUnit\Framework\TestCase;

final class DimensionsTest extends TestCase
{
    /** @var int */
    const INVALID_WIDTH = 0;

    /** @var int */
    const INVALID_HEIGHT = 0;

    public function testItThrowsAnExceptionIfTheWidthIsInvalid(): void
    {
        $this->expectException(DimensionException::class);

        new Dimensions(self::INVALID_WIDTH, 5);
    }

    public function testItThrowsAnExceptionIfTheHeightIsInvalid(): void
    {
        $this->expectException(DimensionException::class);

        new Dimensions(5, self::INVALID_HEIGHT);
    }

    public function testItCreatesADimensions(): void
    {
        $dimensions = new Dimensions(5, 5);

        $this->assertInstanceOf(Dimensions::class, $dimensions);
    }

    public function testItGetsTheWidth(): void
    {
        $dimensions = new Dimensions(5, 5);

        $this->assertEquals(5, $dimensions->getWidth());
    }

    public function testItGetsTheHeight(): void
    {
        $dimensions = new Dimensions(5, 5);

        $this->assertEquals(5, $dimensions->getHeight());
    }

    public function testItReturnsFalseIfTheXIsOutOfBounds(): void
    {
        $dimensions = new Dimensions(5, 5);

        $this->assertFalse($dimensions->isValidX(5));
    }

    public function testItReturnsTrueIfTheXIsInBounds(): void
    {
        $dimensions = new Dimensions(5, 5);

        $this->assertTrue($dimensions->isValidX(4));
    }

    public function testItReturnsFalseIfTheYIsOutOfBounds(): void
    {
        $dimensions = new Dimensions(5, 5);

        $this->assertFalse($dimensions->isValidY(5));
    }

    public function testItReturnsTrueIfTheYIsInBounds(): void
    {
        $dimensions = new Dimensions(5, 5);

        $this->assertTrue($dimensions->isValidY(4));
    }
}
