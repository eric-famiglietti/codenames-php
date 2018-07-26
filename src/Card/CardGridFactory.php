<?php

declare(strict_types=1);

namespace Codenames\Card;

use Codenames\Deck\Deck;
use Codenames\Dimension\Dimensions;

class CardGridFactory
{
    /**
     * Create a new card grid instance.
     *
     * @param Dimensions $dimensions
     * @param Deck       $deck
     *
     * @return CardGrid
     */
    public function makeCardGrid(Dimensions $dimensions, Deck $deck): CardGrid
    {
        $grid = $this->makeGrid($dimensions, $deck);

        return new CardGrid($dimensions, $grid);
    }

    /**
     * @param Dimensions $dimensions
     * @param Deck       $deck
     *
     * @return array
     */
    private function makeGrid(Dimensions $dimensions, Deck $deck): array
    {
        $grid = [];

        foreach (range(0, $dimensions->getWidth() - 1) as $x) {
            foreach (range(0, $dimensions->getHeight() - 1) as $y) {
                $grid[$x][$y] = $deck->drawCard();
            }
        }

        return $grid;
    }
}
