<?php

declare(strict_types=1);

namespace Codenames;

use ReflectionClass;

abstract class Enumeration
{
    /**
     * Determine if the given value exists.
     *
     * @param int $value
     *
     * @return bool
     */
    public static function isValidValue(int $value): bool
    {
        $class = new ReflectionClass(get_called_class());

        $constants = array_values($class->getConstants());

        return in_array($value, $constants, true);
    }
}
