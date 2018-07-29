<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardFactory;
use PHPUnit\Framework\TestCase;

final class KeycardFactoryTest extends TestCase
{
    public function testItCreatesAKeycardFactory(): void
    {
        $keycardFactory = new KeycardFactory();

        $this->assertInstanceOf(KeycardFactory::class, $keycardFactory);
    }

    public function testItMakesAKeycard(): void
    {
        $keycardFactory = new KeycardFactory();

        $this->assertInstanceOf(Keycard::class, $keycardFactory->makeKeycard());
    }
}
