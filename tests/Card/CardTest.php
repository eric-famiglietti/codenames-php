<?php

declare(strict_types=1);

namespace Tests\Codenames\Card;

use Codenames\Card\Card;
use PHPUnit\Framework\TestCase;

final class CardTest extends TestCase
{
    public function testItReturnsTheCodename(): void
    {
        $card = new Card('Orangutan');

        $this->assertEquals('Orangutan', $card->getCodename());
    }
}
