<?php

declare(strict_types=1);

namespace Codenames\Player;

class Players
{
    /** @var Player */
    private $spymaster;

    /** @var Player */
    private $operative;

    /**
     * Make a new team players instance.
     *
     * @param Player $spymaster
     * @param Player $operative
     *
     * @throws PlayerException if the player is not a spymaster
     * @throws PlayerException if the player is not an operative
     */
    public function __construct(Player $spymaster, Player $operative)
    {
        $this->checkSpymaster($spymaster);
        $this->checkOperative($operative);

        $this->spymaster = $spymaster;
        $this->operative = $operative;
    }

    /**
     * Get the spymaster of the team.
     *
     * @return Player
     */
    public function getSpymaster(): Player
    {
        return $this->spymaster;
    }

    /**
     * Get the operative of the team.
     *
     * @return Player
     */
    public function getOperative(): Player
    {
        return $this->operative;
    }

    /**
     * @param Player $player
     *
     * @throws PlayerException if the player is not a spymaster
     */
    private function checkSpymaster(Player $player): void
    {
        if (!$player->getRole()->isSpymaster()) {
            throw new PlayerException('Player must be a spymaster.');
        }
    }

    /**
     * @param Player $player
     *
     * @throws PlayerException if the player is not an operative
     */
    private function checkOperative(Player $player): void
    {
        if (!$player->getRole()->isOperative()) {
            throw new PlayerException('Player must be an operative.');
        }
    }
}
