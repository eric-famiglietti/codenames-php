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
     *
     * @throws PlayerException if the name is an empty string
     */
    public function __construct(string $name, Role $role)
    {
        $name = trim($name);

        $this->checkName($name);

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

    /**
     * @param string $name
     *
     * @throws PlayerException if the name is an empty string
     */
    private function checkName(string $name): void
    {
        if (empty($name)) {
            throw new PlayerException('Name must not be an empty string.');
        }
    }
}
