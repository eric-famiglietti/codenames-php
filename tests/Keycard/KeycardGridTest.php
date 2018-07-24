<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Dimension\Dimensions;
use Codenames\Keycard\KeycardException;
use Codenames\Keycard\KeycardGrid;
use PHPUnit\Framework\TestCase;

final class KeycardGridTest extends TestCase
{
    /** @var int */
    const INVALID_VALUE = 4;

    /** @var int */
    const INVALID_X = 2;

    /** @var int */
    const INVALID_Y = 2;

    public function testItThrowsAnExceptionIfTheGridWidthIsInvalid(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(2, 2);
        $grid = [[0], [0]];

        new KeycardGrid($dimensions, $grid);
    }

    public function testItThrowsAnExceptionIfTheGridHeightIsInvalid(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(2, 2);
        $grid = [[0]];

        new KeycardGrid($dimensions, $grid);
    }

    public function testItThrowsAnExceptionIfTheGridValuesAreInvalid(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(1, 1);
        $grid = [[self::INVALID_VALUE]];

        new KeycardGrid($dimensions, $grid);
    }

    public function testItCreatesAKeycardGrid(): void
    {
        $dimensions = new Dimensions(2, 2);
        $grid = [[0, 0], [0, 0]];

        $keycardGrid = new KeycardGrid($dimensions, $grid);

        $this->assertInstanceOf(KeycardGrid::class, $keycardGrid);
    }

    public function testItThrowsAnExceptionIfTheXValueIsOutOfBounds(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(2, 2);
        $grid = [[0, 0], [0, 0]];
        $keycardGrid = new KeycardGrid($dimensions, $grid);

        $keycardGrid->getValue(self::INVALID_X, 1);
    }

    public function testItThrowsAnExceptionIfTheYValueIsOutOfBounds(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(2, 2);
        $grid = [[0, 0], [0, 0]];
        $keycardGrid = new KeycardGrid($dimensions, $grid);

        $keycardGrid->getValue(1, self::INVALID_Y);
    }

    public function testItGetsTheValue(): void
    {
        $dimensions = new Dimensions(2, 2);
        $grid = [[0, 0], [0, 1]];
        $keycardGrid = new KeycardGrid($dimensions, $grid);

        $this->assertEquals(1, $keycardGrid->getValue(1, 1));
    }
}
