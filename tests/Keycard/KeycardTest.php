<?php

declare(strict_types=1);

namespace Tests\Codenames\Keycard;

use Codenames\Color\Color;
use Codenames\Color\ColorValues;
use Codenames\Dimension\Dimensions;
use Codenames\Grid\Grid;
use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardGrid;
use PHPUnit\Framework\TestCase;

final class KeycardTest extends TestCase
{
    /** @var Color */
    private $color;

    /** @var Keycard */
    private $keycard;

    public function setUp(): void
    {
        parent::setUp();

        $this->color = new Color(ColorValues::RED);

        $dimensions = new Dimensions(2, 2);
        $values = [[0, 0], [0, 0]];
        $grid = new Grid($dimensions, $values);
        $keycardGrid = new KeycardGrid($grid);

        $this->keycard = new Keycard($this->color, $keycardGrid);
    }

    public function testItCreatesAKeycard(): void
    {
        $this->assertInstanceOf(Keycard::class, $this->keycard);
    }

    public function testItGetsTheColor(): void
    {
        $this->assertEquals($this->color, $this->keycard->getColor());
    }

    public function testItGetsAValue(): void
    {
        $this->assertEquals(0, $this->keycard->getValue(0, 0));
    }
}
