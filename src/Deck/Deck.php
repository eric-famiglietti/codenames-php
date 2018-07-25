<?php

declare(strict_types=1);

namespace Codenames\Deck;

use Codenames\Card\Card;

class Deck
{
    /** @var array */
    private $cards = [];

    /**
     * Create a new deck instance.
     *
     * @param Card $card
     */
    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    /**
     * Get the number of cards in the deck.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->cards);
    }

    /**
     * Randomize the order of the cards in the deck.
     *
     * @return bool
     */
    public function shuffle(): bool
    {
        return shuffle($this->cards);
    }

    /**
     * Draw a card from the top of the deck.
     *
     * @return Card
     *
     * @throws DeckException if the deck is empty
     */
    public function drawCard(): Card
    {
        $this->checkCount();

        return array_pop($this->cards);
    }

    /**
     * @throws DeckException if the deck is empty
     */
    private function checkCount(): void
    {
        if (count($this->cards) < 1) {
            throw new DeckException('Cannot draw from an empty deck.');
        }
    }
}
