<?php

declare(strict_types=1);

namespace Codenames;

use ReflectionClass;

abstract class Enumeration
{
    /**
     * @param mixed $value
     * @return bool
     */
    public static function isValidValue($value): bool
    {
        $class = new ReflectionClass(get_called_class());

        $constants = array_values($class->getConstants());

        return in_array($value, $constants, true);
    }
}
