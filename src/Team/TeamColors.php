<?php

declare(strict_types=1);

namespace Codenames\Team;

use Codenames\Enumeration;

abstract class TeamColors extends Enumeration
{
    /** @var int */
    const RED = 0;

    /** @var int */
    const BLUE = 1;
}
