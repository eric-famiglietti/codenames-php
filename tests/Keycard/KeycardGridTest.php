<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Keycard\KeycardException;
use Codenames\Keycard\KeycardGrid;
use Codenames\Keycard\KeycardGridDimensions;
use PHPUnit\Framework\TestCase;

class KeycardGridTest extends TestCase
{
    const INVALID_VALUE = 4;

    public function testItThrowsAnExceptionIfTheGridWidthIsInvalid()
    {
        $this->expectException(KeycardException::class);

        $dimensions = new KeycardGridDimensions(2, 2);
        $grid = [[0], [0]];

        new KeycardGrid($dimensions, $grid);
    }

    public function testItThrowsAnExceptionIfTheGridHeightIsInvalid()
    {
        $this->expectException(KeycardException::class);

        $dimensions = new KeycardGridDimensions(2, 2);
        $grid = [[0]];

        new KeycardGrid($dimensions, $grid);
    }

    public function testItThrowsAnExceptionIfTheGridValuesAreInvalid()
    {
        $this->expectException(KeycardException::class);

        $dimensions = new KeycardGridDimensions(1, 1);
        $grid = [[self::INVALID_VALUE]];

        new KeycardGrid($dimensions, $grid);
    }

    public function testItCreatesAKeycardGrid()
    {
        $dimensions = new KeycardGridDimensions(2, 2);
        $grid = [[0, 0], [0, 0]];

        $keycardGrid = new KeycardGrid($dimensions, $grid);

        $this->assertInstanceOf(KeycardGrid::class, $keycardGrid);
    }

    public function testItThrowsAnExceptionIfTheBoundsAreInvalid()
    {
        $this->expectException(KeycardException::class);

        $dimensions = new KeycardGridDimensions(2, 2);
        $grid = [[0, 0], [0, 0]];
        $keycardGrid = new KeycardGrid($dimensions, $grid);

        $keycardGrid->getValue(2, 1);
    }

    public function testItGetsTheValue()
    {
        $dimensions = new KeycardGridDimensions(2, 2);
        $grid = [[0, 0], [0, 1]];
        $keycardGrid = new KeycardGrid($dimensions, $grid);

        $this->assertEquals(1, $keycardGrid->getValue(1, 1));
    }
}
