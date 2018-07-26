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
     *
     * @throws CardException if the codename is an empty string
     */
    public function __construct(string $codename)
    {
        $this->checkCodename($codename);

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

    /**
     * @param string $codename
     *
     * @throws CardException if the codename is an empty string
     */
    private function checkCodename(string $codename): void
    {
        if (empty($codename)) {
            throw new CardException('Codename must not be an empty string.');
        }
    }
}
