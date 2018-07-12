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
     * @param string $name
     * @param int    $role
     */
    public function __construct(string $name, int $role)
    {
        $this->checkRole($role);

        $this->name = $name;
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param int $role
     *
     * @return bool
     */
    public function isRole(int $role): bool
    {
        $this->checkRole($role);

        return $this->role === $role;
    }

    /**
     * @return bool
     */
    public function isSpymaster(): bool
    {
        return $this->isRole(PlayerRoles::SPYMASTER);
    }

    /**
     * @return bool
     */
    public function isOperative(): bool
    {
        return $this->isRole(PlayerRoles::OPERATIVE);
    }

    /**
     * @param int $role
     *
     * @throws PlayerException
     */
    private function checkRole(int $role): void
    {
        if (!PlayerRoles::isValidValue($role)) {
            throw new PlayerException('Invalid role.');
        }
    }
}
