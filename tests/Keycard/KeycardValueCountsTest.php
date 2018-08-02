<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Keycard\KeycardException;
use Codenames\Keycard\KeycardValueCounts;
use PHPUnit\Framework\TestCase;

final class KeycardValueCountsTest extends TestCase
{
    public function testItThrowsAnExceptionIfTheRedsCountIsNegative(): void
    {
        $this->expectException(KeycardException::class);

        new KeycardValueCounts(-1, 8, 1);
    }

    public function testItThrowsAnExceptionIfTheBluesCountIsNegative(): void
    {
        $this->expectException(KeycardException::class);

        new KeycardValueCounts(8, -1, 1);
    }

    public function testItThrowsAnExceptionIfTheAssassinsCountIsNegative(): void
    {
        $this->expectException(KeycardException::class);

        new KeycardValueCounts(8, 8, -1);
    }

    public function testItCreatesAKeycardValuesCount(): void
    {
        $keycardValueCounts = new KeycardValueCounts(8, 8, 1);

        $this->assertInstanceOf(KeycardValueCounts::class, $keycardValueCounts);
    }

    public function testItGetsTheRedsCount(): void
    {
        $keycardValueCounts = new KeycardValueCounts(8, 8, 1);

        $this->assertEquals(8, $keycardValueCounts->getRedsCount());
    }

    public function testItGetsTheBluesCount(): void
    {
        $keycardValueCounts = new KeycardValueCounts(8, 8, 1);

        $this->assertEquals(8, $keycardValueCounts->getBluesCount());
    }

    public function testItGetsTheAssassinsCount(): void
    {
        $keycardValueCounts = new KeycardValueCounts(8, 8, 1);

        $this->assertEquals(1, $keycardValueCounts->getAssassinsCount());
    }

    public function testItGetsTheTotalCount(): void
    {
        $keycardValueCounts = new KeycardValueCounts(8, 8, 1);

        $this->assertEquals(17, $keycardValueCounts->getTotalCount());
    }
}
