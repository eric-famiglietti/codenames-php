<?php

declare(strict_types=1);

namespace Codenames\Player;

use Codenames\Role\Role;
use Codenames\Role\RoleValues;

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
        $role = new Role(RoleValues::SPYMASTER);

        return $this->makePlayer($name, $role);
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
        $role = new Role(RoleValues::OPERATIVE);

        return $this->makePlayer($name, $role);
    }

    /**
     * @param string $name
     * @param Role   $role
     *
     * @return Player
     */
    private function makePlayer(string $name, Role $role): Player
    {
        return new Player($name, $role);
    }
}
