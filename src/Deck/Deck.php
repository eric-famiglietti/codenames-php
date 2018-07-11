<?php

declare(strict_types=1);

namespace Codenames\Deck;

use Codenames\Card\Card;

class Deck
{
    /** @var array */
    private $cards = [];

    /**
     * @param Card $card
     */
    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->cards);
    }

    /**
     * @return bool
     */
    public function shuffle(): bool
    {
        return shuffle($this->cards);
    }

    /**
     * @return Card
     */
    public function drawCard(): Card
    {
        $this->checkCount();

        return array_pop($this->cards);
    }

    /**
     * @throws DeckException
     */
    private function checkCount(): void
    {
        if (count($this->cards) < 1) {
            throw new DeckException('Cannot draw from an empty deck.');
        }
    }
}
