<?php

declare(strict_types=1);

namespace Tests\Codenames\Dictionary;

use Codenames\Dictionary\Dictionary;
use PHPUnit\Framework\TestCase;

final class DictionaryTest extends TestCase
{
    public function testItCreatesADictionary(): void
    {
        $dictionary = new Dictionary();

        $this->assertInstanceOf(Dictionary::class, $dictionary);
    }

    public function testItGetsTheWords(): void
    {
        $dictionary = new Dictionary();

        $words = $dictionary->getWords();

        $this->assertEquals('art', $words[0]);
    }
}
