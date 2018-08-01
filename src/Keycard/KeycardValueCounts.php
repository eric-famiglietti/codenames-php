<?php

declare(strict_types=1);

namespace Codenames\Keycard;

class KeycardValueCounts
{
    /** @var int */
    private $redsCount;

    /** @var int */
    private $bluesCount;

    /** @var int */
    private $assassinsCount;

    /**
     * @param int $redsCount
     * @param int $bluesCount
     * @param int $assassinsCount
     *
     * @throws KeycardException if the reds count is a negative integer
     * @throws KeycardException if the blues count is a negative integer
     * @throws KeycardException if the assassins count is a negative integer
     */
    public function __construct(int $redsCount, int $bluesCount, int $assassinsCount)
    {
        $this->checkCount($redsCount);
        $this->checkCount($bluesCount);
        $this->checkCount($assassinsCount);

        $this->redsCount = $redsCount;
        $this->bluesCount = $bluesCount;
        $this->assassinsCount = $assassinsCount;
    }

    /**
     * Get the reds count of the keycard value counts.
     *
     * @return int
     */
    public function getRedsCount(): int
    {
        return $this->redsCount;
    }

    /**
     * Get the blues count of the keycard value counts.
     *
     * @return int
     */
    public function getBluesCount(): int
    {
        return $this->bluesCount;
    }

    /**
     * Get the assassins count of the keycard value counts.
     *
     * @return int
     */
    public function getAssassinsCount(): int
    {
        return $this->assassinsCount;
    }

    /**
     * @throws KeycardException if the count is a negative integer
     */
    private function checkCount(int $count): void
    {
        if ($count < 0) {
            throw new KeycardException('Count must be a non-negative integer.');
        }
    }
}
