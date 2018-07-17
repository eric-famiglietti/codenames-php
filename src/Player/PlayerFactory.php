<?php

declare(strict_types=1);

namespace Codenames\Player;

class PlayerFactory
{
    /**
     * Create a new player instance with a spymaster role.
     *
     * @param string $name
     *
     * @return Player
     */
    public function makeSpymaster(string $name): Player
    {
        return $this->makePlayer($name, PlayerRoles::SPYMASTER);
    }

    /**
     * Create a new player instance with an operative role.
     *
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
