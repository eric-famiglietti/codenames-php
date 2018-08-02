<?php

declare(strict_types=1);

namespace Tests\Codenames\Card;

use Codenames\Card\CardGrid;
use Codenames\Card\CardGridFactory;
use Codenames\Deck\DeckFactory;
use Codenames\Dictionary\Dictionary;
use Codenames\Dimension\Dimensions;
use PHPUnit\Framework\TestCase;

final class CardGridFactoryTest extends TestCase
{
    public function testItCreatesACardGridFactory(): void
    {
        $cardGridFactory = new CardGridFactory();

        $this->assertInstanceOf(CardGridFactory::class, $cardGridFactory);
    }

    public function testItMakesACardGrid(): void
    {
        $cardGridFactory = new CardGridFactory();
        $dimensions = new Dimensions(2, 2);
        $dictionary = new Dictionary();
        $deckFactory = new DeckFactory($dictionary);
        $deck = $deckFactory->makeDeck();

        $grid = $cardGridFactory->makeCardGrid($dimensions, $deck);

        $this->assertInstanceOf(CardGrid::class, $grid);
    }
}
