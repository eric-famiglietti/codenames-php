<?php

declare(strict_types=1);

namespace Tests\Codenames\Deck;

use Codenames\Card\Card;
use Codenames\Deck\Deck;
use Codenames\Deck\DeckException;
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function testItGetsTheNumberOfCardsInTheDeck()
    {
        $deck = new Deck();
        $deck->addCard(new Card('Tokyo'));

        $this->assertEquals(1, $deck->count());
    }

    public function testItThrowsAnExceptionIfThereAreNoCardsLeftTodrawCard(): void
    {
        $this->expectException(DeckException::class);

        $deck = new Deck(['Tokyo']);

        $deck->drawCard();
        $deck->drawCard();
    }

    public function testItGetsACardFromTheDeck()
    {
        $deck = new Deck();
        $card = new Card('Tokyo');
        $deck->addCard($card);

        $this->assertEquals($card, $deck->drawCard());
    }
}