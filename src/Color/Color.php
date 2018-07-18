<?php

declare(strict_types=1);

namespace Codenames\Color;

class Color
{
    /** @var int */
    private $value;

    /**
     * Create a new color instance.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->checkValue($value);

        $this->value = $value;
    }

    /**
     * Get the value of the color.
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Determine if the color's value is the given value.
     *
     * @param int $value
     *
     * @return bool
     */
    public function isValue(int $value): bool
    {
        $this->checkValue($value);

        return $this->value === $value;
    }

    /**
     * Determine if the value is red.
     *
     * @return bool
     */
    public function isRed(): bool
    {
        return $this->isValue(ColorValues::RED);
    }

    /**
     * Determine if the value is blue.
     *
     * @return bool
     */
    public function isBlue(): bool
    {
        return $this->isValue(ColorValues::BLUE);
    }

    /**
     * @param int $value
     *
     * @throws ColorException
     */
    private function checkValue(int $value): void
    {
        if (!ColorValues::isValidValue($value)) {
            throw new ColorException('Invalid color.');
        }
    }
}
