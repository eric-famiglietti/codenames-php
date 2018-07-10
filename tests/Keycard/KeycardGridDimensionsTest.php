<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Keycard\KeycardException;
use Codenames\Keycard\KeycardGridDimensions;
use PHPUnit\Framework\TestCase;

class KeycardGridDimensionsTest extends TestCase
{
    const INVALID_WIDTH = 0;
    const INVALID_HEIGHT = 0;

    public function testItThrowsAnExceptionIfTheWidthIsInvalid()
    {
        $this->expectException(KeycardException::class);

        new KeycardGridDimensions(self::INVALID_WIDTH, 5);
    }

    public function testItThrowsAnExceptionIfTheHeightIsInvalid()
    {
        $this->expectException(KeycardException::class);

        new KeycardGridDimensions(5, self::INVALID_HEIGHT);
    }

    public function testItCreatesAKeycardGridDimensions()
    {
        $dimensions = new KeycardGridDimensions(5, 5);

        $this->assertInstanceOf(KeycardGridDimensions::class, $dimensions);
    }

    public function testItGetsTheWidth()
    {
        $dimensions = new KeycardGridDimensions(5, 5);

        $this->assertEquals(5, $dimensions->getWidth());
    }

    public function testItGetsTheHeight()
    {
        $dimensions = new KeycardGridDimensions(5, 5);

        $this->assertEquals(5, $dimensions->getHeight());
    }
}
