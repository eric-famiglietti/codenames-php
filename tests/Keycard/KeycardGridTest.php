<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Dimension\Dimensions;
use Codenames\Grid\Grid;
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

    public function testItThrowsAnExceptionIfTheGridValuesAreInvalid(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(1, 1);
        $values = [[self::INVALID_VALUE]];
        $grid = new Grid($dimensions, $values);

        new KeycardGrid($grid);
    }

    public function testItCreatesAKeycardGrid(): void
    {
        $dimensions = new Dimensions(2, 2);
        $values = [[0, 0], [0, 0]];
        $grid = new Grid($dimensions, $values);

        $keycardGrid = new KeycardGrid($grid);

        $this->assertInstanceOf(KeycardGrid::class, $keycardGrid);
    }

    public function testItGetsTheKeycardGridsDimensions(): void
    {
        $dimensions = new Dimensions(2, 2);
        $values = [[0, 0], [0, 0]];
        $grid = new Grid($dimensions, $values);
        $keycardGrid = new KeycardGrid($grid);

        $this->assertEquals($dimensions, $keycardGrid->getDimensions());
    }

    public function testItThrowsAnExceptionIfTheXValueIsOutOfBounds(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(2, 2);
        $values = [[0, 0], [0, 0]];
        $grid = new Grid($dimensions, $values);
        $keycardGrid = new KeycardGrid($grid);

        $keycardGrid->getValue(self::INVALID_X, 1);
    }

    public function testItThrowsAnExceptionIfTheYValueIsOutOfBounds(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(2, 2);
        $values = [[0, 0], [0, 0]];
        $grid = new Grid($dimensions, $values);
        $keycardGrid = new KeycardGrid($grid);

        $keycardGrid->getValue(1, self::INVALID_Y);
    }

    public function testItGetsTheValue(): void
    {
        $dimensions = new Dimensions(2, 2);
        $values = [[0, 0], [0, 1]];
        $grid = new Grid($dimensions, $values);
        $keycardGrid = new KeycardGrid($grid);

        $this->assertEquals(1, $keycardGrid->getValue(1, 1));
    }
}
