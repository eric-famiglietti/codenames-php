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
     * @param array $cards
     *
     * @throws DeckException if the words array is empty
     * @throws DeckException if the words array contains a non-string
     */
    public function __construct(array $cards)
    {
        $this->checkCardsCount($cards);
        $this->checkCards($cards);

        $this->cards = $cards;
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
     * @param array $cards
     *
     * @throws DeckException if the words array is empty
     */
    private function checkCardsCount(array $cards): void
    {
        if (empty($cards)) {
            throw new DeckException('Cards must not be empty.');
        }
    }

    /**
     * @param array $cards
     *
     * @throws DeckException if the words array contains a non-string
     */
    private function checkCards(array $cards): void
    {
        foreach ($cards as $card) {
            if (!$card instanceof Card) {
                throw new DeckException('Invalid cards value.');
            }
        }
    }

    /**
     * @throws DeckException if the deck is empty
     */
    private function checkCount(): void
    {
        if (empty($this->cards)) {
            throw new DeckException('Cannot draw from an empty deck.');
        }
    }
}
