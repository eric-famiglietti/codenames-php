<?php

declare(strict_types=1);

namespace Codenames\Role;

class Role
{
    /** @var int */
    private $value;

    /**
     * Create a new role instance.
     *
     * @param int $value
     *
     * @throws RoleException if the value is not a valid role value
     */
    public function __construct(int $value)
    {
        $this->checkValue($value);

        $this->value = $value;
    }

    /**
     * Get the value of the role.
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Determine if the role's value is the given value.
     *
     * @param int $value
     *
     * @return bool
     *
     * @throws RoleException if the value is not a valid role value
     */
    public function isValue(int $value): bool
    {
        $this->checkValue($value);

        return $this->value === $value;
    }

    /**
     * Determine if the role is spymaster.
     *
     * @return bool
     */
    public function isSpymaster(): bool
    {
        return RoleValues::SPYMASTER === $this->value;
    }

    /**
     * Determine if the role is operative.
     *
     * @return bool
     */
    public function isOperative(): bool
    {
        return RoleValues::OPERATIVE === $this->value;
    }

    /**
     * @param int $value
     *
     * @throws RoleException if the value is not a valid role value
     */
    private function checkValue(int $value): void
    {
        if (!RoleValues::isValidValue($value)) {
            throw new RoleException('Invalid role value.');
        }
    }
}
