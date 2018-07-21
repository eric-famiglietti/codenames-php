<?php

declare(strict_types=1);

namespace Codenames\Role;

use Codenames\Enumeration;

abstract class RoleValues extends Enumeration
{
    /** @var int */
    const SPYMASTER = 0;

    /** @var int */
    const OPERATIVE = 1;
}
