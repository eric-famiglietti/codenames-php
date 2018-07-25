<?php

declare(strict_types=1);

namespace Codenames\Deck;

use Codenames\Card\Card;

class DeckFactory
{
    /**
     * Create a new deck instance.
     *
     * @param array $words
     *
     * @return Deck
     */
    public function makeDeck(array $words): Deck
    {
        $cards = $this->makeCards($words);

        return new Deck($cards);
    }

    /**
     * @param array $words
     *
     * @return array
     */
    private function makeCards(array $words): array
    {
        $cards = [];

        foreach ($words as $word) {
            $cards[] = $this->makeWord($word);
        }

        return $cards;
    }

    /**
     * @param string $word
     *
     * @return Card
     */
    private function makeWord(string $word): Card
    {
        return new Card($word);
    }
}
