<?php

declare(strict_types=1);

namespace Codenames\Player;

use Codenames\Role\Role;

class Player
{
    /** @var string */
    private $name;

    /** @var Role */
    private $role;

    /**
     * Create a new player instance.
     *
     * @param string $name
     * @param Role   $role
     */
    public function __construct(string $name, Role $role)
    {
        $this->name = $name;
        $this->role = $role;
    }

    /**
     * Get the name of the player.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the role of the player.
     *
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }
}
