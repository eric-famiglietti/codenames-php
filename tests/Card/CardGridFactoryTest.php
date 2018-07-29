<?php

declare(strict_types=1);

namespace Tests\Codenames\Card;

use Codenames\Card\CardGrid;
use Codenames\Card\CardGridFactory;
use Codenames\Deck\DeckFactory;
use Codenames\Dimension\Dimensions;
use PHPUnit\Framework\TestCase;

final class CardGridFactoryTest extends TestCase
{
    /** @var array */
    const WORDS = ['Pear', 'Seagull', 'Apple', 'Banana'];

    public function testItCreatesACardGridFactory(): void
    {
        $cardGridFactory = new CardGridFactory();

        $this->assertInstanceOf(CardGridFactory::class, $cardGridFactory);
    }

    public function testItMakesACardGrid(): void
    {
        $cardGridFactory = new CardGridFactory();
        $dimensions = new Dimensions(2, 2);
        $deckFactory = new DeckFactory();
        $deck = $deckFactory->makeDeck(self::WORDS);

        $grid = $cardGridFactory->makeCardGrid($dimensions, $deck);

        $this->assertInstanceOf(CardGrid::class, $grid);
    }
}
