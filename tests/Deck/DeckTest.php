<?php

declare(strict_types=1);

namespace Tests\Codenames\Deck;

use Codenames\Card\Card;
use Codenames\Deck\Deck;
use Codenames\Deck\DeckException;
use PHPUnit\Framework\TestCase;

final class DeckTest extends TestCase
{
    public function testItThrowsAnExceptionIfCardsIsEmpty(): void
    {
        $this->expectException(DeckException::class);

        new Deck([]);
    }

    public function testItThrowsAnExceptionIfCardsContainsANonString(): void
    {
        $this->expectException(DeckException::class);

        new Deck([1]);
    }

    public function testItCreatesADeck(): void
    {
        $cards = [new Card('Apple')];
        $deck = new Deck($cards);

        $this->assertInstanceOf(Deck::class, $deck);
    }

    public function testItThrowsAnExceptionIfThereAreNoCardsLeftTodrawCard(): void
    {
        $this->expectException(DeckException::class);

        $cards = [new Card('Tokyo')];
        $deck = new Deck($cards);

        $deck->drawCard();
        $deck->drawCard();
    }

    public function testItGetsACardFromTheDeck(): void
    {
        $card = new Card('Tokyo');
        $cards = [$card];
        $deck = new Deck($cards);

        $this->assertEquals($card, $deck->drawCard());
    }
}
