<?php

declare(strict_types=1);

namespace Codenames\Keycard;

use Codenames\Enumeration;

abstract class KeycardValues extends Enumeration
{
    /** @var int */
    const BYSTANDER = 0;

    /** @var int */
    const RED = 1;

    /** @var int */
    const BLUE = 2;

    /** @var int */
    const ASSASSIN = 3;
}
