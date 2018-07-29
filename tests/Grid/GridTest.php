<?php

declare(strict_types=1);

namespace Tests\Codenames\Grid;

use Codenames\Dimension\Dimensions;
use Codenames\Grid\Grid;
use Codenames\Grid\GridException;
use PHPUnit\Framework\TestCase;

final class GridTest extends TestCase
{
    public function testItThrowsAnExceptionIfTheGridWidthIsInvalid(): void
    {
        $this->expectException(GridException::class);

        $dimensions = new Dimensions(2, 1);
        $values = [[0]];

        new Grid($dimensions, $values);
    }

    public function testItThrowsAnExceptionIfTheGridHeightIsInvalid(): void
    {
        $this->expectException(GridException::class);

        $dimensions = new Dimensions(1, 2);
        $values = [[0]];

        new Grid($dimensions, $values);
    }

    public function testItCreatesAGrid(): void
    {
        $dimensions = new Dimensions(1, 1);
        $values = [[0]];

        $grid = new Grid($dimensions, $values);

        $this->assertInstanceOf(Grid::class, $grid);
    }

    public function testItGetsTheDimensions(): void
    {
        $dimensions = new Dimensions(1, 1);
        $values = [[0]];
        $grid = new Grid($dimensions, $values);

        $this->assertEquals($dimensions, $grid->getDimensions());
    }

    public function testItGetsTheValues(): void
    {
        $dimensions = new Dimensions(1, 1);
        $values = [[0]];
        $grid = new Grid($dimensions, $values);

        $this->assertEquals($values, $grid->getValues());
    }
}
