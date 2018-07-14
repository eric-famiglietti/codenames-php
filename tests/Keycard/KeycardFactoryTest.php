<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardFactory;
use PHPUnit\Framework\TestCase;

class KeycardFactoryTest extends TestCase
{
    public function testItCreatesAKeycard(): void
    {
        $factory = new KeycardFactory();

        $this->assertInstanceOf(Keycard::class, $factory->makeKeycard());
    }
}
