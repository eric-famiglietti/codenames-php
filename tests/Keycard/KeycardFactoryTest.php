<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Dimension\Dimensions;
use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardException;
use Codenames\Keycard\KeycardFactory;
use Codenames\Keycard\KeycardValueCounts;
use PHPUnit\Framework\TestCase;

final class KeycardFactoryTest extends TestCase
{
    public function testItThrowsAnExceptionIfTheNumberOfValuesExceedsTheGridSize(): void
    {
        $this->expectException(KeycardException::class);

        $dimensions = new Dimensions(5, 5);
        $keycardValueCounts = new KeycardValueCounts(12, 12, 1);

        new KeycardFactory($dimensions, $keycardValueCounts);
    }

    public function testItCreatesAKeycardFactory(): void
    {
        $dimensions = new Dimensions(5, 5);
        $keycardValueCounts = new KeycardValueCounts(8, 8, 1);
        $keycardFactory = new KeycardFactory($dimensions, $keycardValueCounts);

        $this->assertInstanceOf(KeycardFactory::class, $keycardFactory);
    }

    public function testItMakesAKeycard(): void
    {
        $dimensions = new Dimensions(5, 5);
        $keycardValueCounts = new KeycardValueCounts(8, 8, 1);
        $keycardFactory = new KeycardFactory($dimensions, $keycardValueCounts);

        $keycard = $keycardFactory->makeKeycard();

        $this->assertInstanceOf(Keycard::class, $keycard);
    }
}
