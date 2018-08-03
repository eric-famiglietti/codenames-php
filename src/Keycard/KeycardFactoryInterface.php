<?php

declare(strict_types=1);

namespace Codenames\Keycard;

interface KeycardFactoryInterface
{
    /**
     * Create a new keycard instance.
     *
     * @return Keycard
     */
    public function makeKeycard(): Keycard;
}
