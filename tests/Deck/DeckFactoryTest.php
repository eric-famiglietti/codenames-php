<?php

declare(strict_types=1);

namespace Tests\Codenames\Deck;

use Codenames\Deck\Deck;
use Codenames\Deck\DeckFactory;
use PHPUnit\Framework\TestCase;

final class DeckFactoryTest extends TestCase
{
    public function testItCreatesADeckFactory(): void
    {
        $deckFactory = new DeckFactory();

        $this->assertInstanceOf(DeckFactory::class, $deckFactory);
    }

    public function testItMakesADeck(): void
    {
        $deckFactory = new DeckFactory();

        $words = ['Banana', 'Pear', 'Apple'];
        $deck = $deckFactory->makeDeck($words);

        $this->assertInstanceOf(Deck::class, $deck);
    }
}
