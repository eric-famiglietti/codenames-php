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
        $factory = new DeckFactory();

        $this->assertInstanceOf(DeckFactory::class, $factory);
    }

    public function testItMakesADeck(): void
    {
        $factory = new DeckFactory();

        $words = ['Banana', 'Pear', 'Apple'];
        $deck = $factory->makeDeck($words);

        $this->assertInstanceOf(Deck::class, $deck);
    }
}
