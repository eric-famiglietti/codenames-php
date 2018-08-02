<?php

declare(strict_types=1);

namespace Tests\Codenames\Deck;

use Codenames\Deck\Deck;
use Codenames\Deck\DeckFactory;
use Codenames\Dictionary\Dictionary;
use PHPUnit\Framework\TestCase;

final class DeckFactoryTest extends TestCase
{
    public function testItCreatesADeckFactory(): void
    {
        $dictionary = new Dictionary();

        $deckFactory = new DeckFactory($dictionary);

        $this->assertInstanceOf(DeckFactory::class, $deckFactory);
    }

    public function testItMakesADeck(): void
    {
        $dictionary = new Dictionary();
        $deckFactory = new DeckFactory($dictionary);

        $deck = $deckFactory->makeDeck();

        $this->assertInstanceOf(Deck::class, $deck);
    }
}
