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
        $cards = $this->makeCards();

        return new Deck($cards);
    }

    /**
     * @return array
     */
    private function makeCards(): array
    {
        $words = $this->dictionary->getWords();

        return array_map(function (string $word) {
            return $this->makeCard($word);
        }, $words);
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
