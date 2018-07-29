<?php

declare(strict_types=1);

namespace Tests\Codenames\Card;

use Codenames\Card\Card;
use Codenames\Card\CardException;
use PHPUnit\Framework\TestCase;

final class CardTest extends TestCase
{
    public function testItThrowsAnExceptionIfWordIsEmpty(): void
    {
        $this->expectException(CardException::class);

        new Card('');
    }

    public function testItCreatesACard(): void
    {
        $card = new Card('Orangutan');

        $this->assertInstanceOf(Card::class, $card);
    }

    public function testItReturnsTheWord(): void
    {
        $card = new Card('Orangutan');

        $this->assertEquals('Orangutan', $card->getWord());
    }
}
