<?php

declare(strict_types=1);

namespace Codenames\Card;

class Card
{
    /** @var string */
    private $codename;

    /**
     * Create a new card instance.
     *
     * @param string $codename
     */
    public function __construct(string $codename)
    {
        $this->codename = $codename;
    }

    /**
     * Get the codename of the card.
     *
     * @return string
     */
    public function getCodename(): string
    {
        return $this->codename;
    }
}
