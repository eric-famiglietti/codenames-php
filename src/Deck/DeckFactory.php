<?php

declare(strict_types=1);

namespace Codenames\Deck;

use Codenames\Card\Card;

class DeckFactory
{
    /**
     * @param array $words
     *
     * @return Deck
     */
    public function makeDeck(array $words): Deck
    {
        $this->checkWords($words);

        $deck = new Deck();

        return $this->makeAndAddCardsToDeck($deck, $words);
    }

    /**
     * @param array $words
     *
     * @throws DeckException
     */
    private function checkWords(array $words): void
    {
        if (empty($words)) {
            throw new DeckException('Words must not be empty.');
        }
    }

    /**
     * @param Deck  $deck
     * @param array $words
     *
     * @return Deck
     */
    private function makeAndAddCardsToDeck(Deck $deck, array $words): Deck
    {
        foreach ($words as $word) {
            $card = new Card($word);
            $deck->addCard($card);
        }

        return $deck;
    }
}
