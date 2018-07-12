<?php

declare(strict_types=1);

namespace Codenames\Player;

use Codenames\Enumeration;

abstract class PlayerRoles extends Enumeration
{
    /** @var int */
    const SPYMASTER = 0;

    /** @var int */
    const OPERATIVE = 1;
}
