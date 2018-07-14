<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardColor;
use Codenames\Keycard\KeycardGrid;
use Codenames\Keycard\KeycardGridDimensions;
use Codenames\Team\TeamColors;
use PHPUnit\Framework\TestCase;

final class KeycardTest extends TestCase
{
    /** @var Keycard */
    private $keycard;

    public function setUp(): void
    {
        parent::setUp();

        $color = new KeycardColor(TeamColors::RED);
        $dimensions = new KeycardGridDimensions(2, 2);
        $gridArray = [[0, 0], [0, 0]];
        $grid = new KeycardGrid($dimensions, $gridArray);

        $this->keycard = new Keycard($color, $grid);
    }

    public function testItCreatesAKeycard(): void
    {
        $this->assertInstanceOf(Keycard::class, $this->keycard);
    }

    public function testItGetsTheColor(): void
    {
        $this->assertEquals(TeamColors::RED, $this->keycard->getColor());
    }

    public function testItGetsAValue(): void
    {
        $this->assertEquals(0, $this->keycard->getValue(0, 0));
    }
}
