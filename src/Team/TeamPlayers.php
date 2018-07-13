<?php

declare(strict_types=1);

namespace Codenames\Team;

use Codenames\Player\Player;

class TeamPlayers
{
    /** @var Player */
    private $spymaster;

    /** @var Player */
    private $operative;

    /**
     * @param Player $spymaster
     * @param Player $operative
     */
    public function __construct(Player $spymaster, Player $operative)
    {
        $this->checkSpymaster($spymaster);
        $this->checkOperative($operative);

        $this->spymaster = $spymaster;
        $this->operative = $operative;
    }

    /**
     * @return Player
     */
    public function getSpymaster(): Player
    {
        return $this->spymaster;
    }

    /**
     * @return Player
     */
    public function getOperative(): Player
    {
        return $this->operative;
    }

    /**
     * @param Player $player
     *
     * @throws TeamException
     */
    private function checkSpymaster(Player $player): void
    {
        if (!$player->isSpymaster()) {
            throw new TeamException('Player must be a spymaster.');
        }
    }

    /**
     * @param Player $player
     *
     * @throws TeamException
     */
    private function checkOperative(Player $player): void
    {
        if (!$player->isOperative()) {
            throw new TeamException('Player must be an operative.');
        }
    }
}
