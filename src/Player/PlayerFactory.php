<?php

declare(strict_types=1);

namespace Codenames\Player;

class PlayerFactory
{
    /**
     * @param string $name
     *
     * @return Player
     */
    public function makeSpymaster(string $name): Player
    {
        return $this->makePlayer($name, PlayerRoles::SPYMASTER);
    }

    /**
     * @param string $name
     *
     * @return Player
     */
    public function makeOperative(string $name): Player
    {
        return $this->makePlayer($name, PlayerRoles::OPERATIVE);
    }

    /**
     * @param string $name
     * @param int    $role
     *
     * @return Player
     */
    private function makePlayer(string $name, int $role): Player
    {
        return new Player($name, $role);
    }
}
