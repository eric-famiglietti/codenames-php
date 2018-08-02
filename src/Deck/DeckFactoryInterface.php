<?php

declare(strict_types=1);

namespace Codenames\Deck;

interface DeckFactoryInterface
{
    /**
     * Create a new deck instance.
     *
     * @return Deck
     */
    public function makeDeck(): Deck;
}
