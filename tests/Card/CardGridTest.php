<?php

declare(strict_types=1);

namespace Tests\Codenames\Card;

use Codenames\Card\Card;
use Codenames\Card\CardException;
use Codenames\Card\CardGrid;
use Codenames\Dimension\Dimensions;
use Codenames\Grid\Grid;
use PHPUnit\Framework\TestCase;

final class CardGridTest extends TestCase
{
    /** @var int */
    const INVALID_X = 2;

    /** @var int */
    const INVALID_Y = 2;

    public function testItThrowsAnExceptionIfTheGridValuesAreInvalid(): void
    {
        $this->expectException(CardException::class);

        $dimensions = new Dimensions(1, 1);
        $values = [[0]];
        $grid = new Grid($dimensions, $values);

        new CardGrid($grid);
    }

    public function testItCreatesACardGrid(): void
    {
        $dimensions = new Dimensions(1, 1);
        $values = [[new Card('Pizza')]];
        $grid = new Grid($dimensions, $values);

        $cardGrid = new CardGrid($grid);

        $this->assertInstanceOf(CardGrid::class, $cardGrid);
    }

    public function testItThrowsAnExceptionIfTheXValueIsOutOfBounds(): void
    {
        $this->expectException(CardException::class);

        $dimensions = new Dimensions(1, 1);
        $values = [[new Card('Pizza')]];
        $grid = new Grid($dimensions, $values);
        $cardGrid = new CardGrid($grid);

        $cardGrid->getValue(self::INVALID_X, 1);
    }

    public function testItThrowsAnExceptionIfTheYValueIsOutOfBounds(): void
    {
        $this->expectException(CardException::class);

        $dimensions = new Dimensions(1, 1);
        $values = [[new Card('Pizza')]];
        $grid = new Grid($dimensions, $values);
        $cardGrid = new CardGrid($grid);

        $cardGrid->getValue(1, self::INVALID_Y);
    }

    public function testItGetsTheValue(): void
    {
        $dimensions = new Dimensions(1, 1);
        $card = new Card('Pizza');
        $values = [[$card]];
        $grid = new Grid($dimensions, $values);
        $cardGrid = new CardGrid($grid);

        $this->assertEquals($card, $cardGrid->getValue(0, 0));
    }
}
