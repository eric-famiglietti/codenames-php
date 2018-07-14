<?php

declare(strict_types=1);

namespace Tests\Codenames\Deck;

use Codenames\Deck\Deck;
use Codenames\Deck\DeckFactory;
use PHPUnit\Framework\TestCase;

class DeckFactoryTest extends TestCase
{
    public function testItCreatesADeck(): void
    {
        $factory = new DeckFactory();

        $words = ['Banana', 'Pear', 'Apple'];
        $deck = $factory->makeDeck($words);

        $this->assertInstanceOf(Deck::class, $deck);
    }
}
