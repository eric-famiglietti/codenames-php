<?php

declare(strict_types=1);

namespace Tests\Codenames\Card;

use Codenames\Card\Card;
use Codenames\Card\CardException;
use Codenames\Card\CardGrid;
use Codenames\Color\Color;
use Codenames\Color\ColorValues;
use Codenames\Dimension\Dimensions;
use PHPUnit\Framework\TestCase;

final class CardGridTest extends TestCase
{
    /** @var int */
    const INVALID_X = 2;

    /** @var int */
    const INVALID_Y = 2;

    public function testItThrowsAnExceptionIfTheGridWidthIsInvalid(): void
    {
        $this->expectException(CardException::class);

        $dimensions = new Dimensions(2, 2);
        $card = new Card('Pizza');
        $grid = [[$card], [$card]];

        new CardGrid($dimensions, $grid);
    }

    public function testItThrowsAnExceptionIfTheGridHeightIsInvalid(): void
    {
        $this->expectException(CardException::class);

        $dimensions = new Dimensions(2, 2);
        $card = new Card('Pizza');
        $grid = [[$card]];

        new CardGrid($dimensions, $grid);
    }

    public function testItThrowsAnExceptionIfTheGridValuesAreInvalid(): void
    {
        $this->expectException(CardException::class);

        $dimensions = new Dimensions(1, 1);
        $color = new Color(ColorValues::RED);
        $grid = [[$color]];

        new CardGrid($dimensions, $grid);
    }

    public function testItCreatesACardGrid(): void
    {
        $dimensions = new Dimensions(2, 2);
        $card = new Card('Pizza');
        $grid = [[$card, $card], [$card, $card]];

        $keycardGrid = new CardGrid($dimensions, $grid);

        $this->assertInstanceOf(CardGrid::class, $keycardGrid);
    }

    public function testItThrowsAnExceptionIfTheXValueIsOutOfBounds(): void
    {
        $this->expectException(CardException::class);

        $dimensions = new Dimensions(2, 2);
        $card = new Card('Pizza');
        $grid = [[$card, $card], [$card, $card]];
        $keycardGrid = new CardGrid($dimensions, $grid);

        $keycardGrid->getValue(self::INVALID_X, 1);
    }

    public function testItThrowsAnExceptionIfTheYValueIsOutOfBounds(): void
    {
        $this->expectException(CardException::class);

        $dimensions = new Dimensions(2, 2);
        $card = new Card('Pizza');
        $grid = [[$card, $card], [$card, $card]];
        $keycardGrid = new CardGrid($dimensions, $grid);

        $keycardGrid->getValue(1, self::INVALID_Y);
    }

    public function testItGetsTheValue(): void
    {
        $dimensions = new Dimensions(1, 1);
        $card = new Card('Pizza');
        $grid = [[$card]];
        $keycardGrid = new CardGrid($dimensions, $grid);

        $this->assertEquals($card, $keycardGrid->getValue(0, 0));
    }
}
