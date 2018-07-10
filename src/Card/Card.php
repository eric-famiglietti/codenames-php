<?php

declare(strict_types=1);

namespace Codenames\Card;

class Card
{
    /** @var string */
    private $codename;

    /**
     * @param string $codename
     */
    public function __construct(string $codename)
    {
        $this->codename = $codename;
    }

    /**
     * @return string
     */
    public function getCodename(): string
    {
        return $this->codename;
    }
}
