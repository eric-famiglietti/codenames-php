<?php

declare(strict_types=1);

namespace Codenames\Player;

class Player
{
    /** @var string */
    private $name;

    /** @var int */
    private $role;

    /**
     * Create a new player instance.
     *
     * @param string $name
     * @param int    $role
     *
     * @throws PlayerException if the role is not a valid player role
     */
    public function __construct(string $name, int $role)
    {
        $this->checkRole($role);

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
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * Determine if the player is the given role.
     *
     * @param int $role
     *
     * @return bool
     *
     * @throws PlayerException if the role is not a valid player role
     */
    public function isRole(int $role): bool
    {
        $this->checkRole($role);

        return $this->role === $role;
    }

    /**
     * Determine if the player is a spymaster.
     *
     * @return bool
     */
    public function isSpymaster(): bool
    {
        return $this->isRole(PlayerRoles::SPYMASTER);
    }

    /**
     * Determine if the player is an operative.
     *
     * @return bool
     */
    public function isOperative(): bool
    {
        return $this->isRole(PlayerRoles::OPERATIVE);
    }

    /**
     * @param int $role
     *
     * @throws PlayerException if the role is not a valid player role
     */
    private function checkRole(int $role): void
    {
        if (!PlayerRoles::isValidValue($role)) {
            throw new PlayerException('Invalid role.');
        }
    }
}
