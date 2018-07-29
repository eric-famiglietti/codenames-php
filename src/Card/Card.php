<?php

declare(strict_types=1);

namespace Codenames\Card;

class Card
{
    /** @var string */
    private $word;

    /**
     * Create a new card instance.
     *
     * @param string $word
     *
     * @throws CardException if the word is an empty string
     */
    public function __construct(string $word)
    {
        $this->checkWord($word);

        $this->word = $word;
    }

    /**
     * Get the word of the card.
     *
     * @return string
     */
    public function getWord(): string
    {
        return $this->word;
    }

    /**
     * @param string $word
     *
     * @throws CardException if the word is an empty string
     */
    private function checkWord(string $word): void
    {
        if (empty($word)) {
            throw new CardException('Codename must not be an empty string.');
        }
    }
}
