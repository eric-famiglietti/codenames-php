<?php

declare(strict_types=1);

namespace Codenames\Deck;

use Codenames\Card\Card;
use Codenames\Dictionary\Dictionary;

class DeckFactory implements DeckFactoryInterface
{
    /** @var Dictionary */
    private $dictionary;

    /**
     * Create a new deck factory instance.
     *
     * @param Dictionary $dictionary
     */
    public function __construct(Dictionary $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    /**
     * Create a new deck instance.
     *
     * @return Deck
     */
    public function makeDeck(): Deck
    {
        $words = $this->dictionary->getWords();

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
            $cards[] = $this->makeCard($word);
        }

        return $cards;
    }

    /**
     * @param string $word
     *
     * @return Card
     */
    private function makeCard(string $word): Card
    {
        return new Card($word);
    }
}
