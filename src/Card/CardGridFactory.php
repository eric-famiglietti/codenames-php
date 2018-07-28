<?php

declare(strict_types=1);

namespace Codenames\Card;

use Codenames\Deck\Deck;
use Codenames\Dimension\Dimensions;
use Codenames\Grid\Grid;

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
        $values = $this->makeValues($dimensions, $deck);
        $grid = $this->makeGrid($dimensions, $values);

        return new CardGrid($grid);
    }

    /**
     * @param Dimensions $dimensions
     * @param array      $values
     *
     * @return Grid
     */
    private function makeGrid(Dimensions $dimensions, array $values): Grid
    {
        return new Grid($dimensions, $values);
    }

    /**
     * @param Dimensions $dimensions
     * @param Deck       $deck
     *
     * @return array
     */
    private function makeValues(Dimensions $dimensions, Deck $deck): array
    {
        $values = [];

        foreach (range(0, $dimensions->getWidth() - 1) as $x) {
            foreach (range(0, $dimensions->getHeight() - 1) as $y) {
                $values[$x][$y] = $deck->drawCard();
            }
        }

        return $values;
    }
}
