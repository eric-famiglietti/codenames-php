<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Dimension\Dimensions;
use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardFactory;
use Codenames\Keycard\KeycardValueCounts;
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
        $dimensions = new Dimensions(5, 5);
        $keycardValueCounts = new KeycardValueCounts(8, 8, 1);

        $keycard = $keycardFactory->makeKeycard($dimensions, $keycardValueCounts);

        $this->assertInstanceOf(Keycard::class, $keycard);
    }
}
