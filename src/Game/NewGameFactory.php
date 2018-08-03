<?php

declare(strict_types=1);

namespace Codenames\Game;

use Codenames\Card\CardGrid;
use Codenames\Card\CardGridFactory;
use Codenames\Deck\Deck;
use Codenames\Deck\DeckFactory;
use Codenames\Dictionary\Dictionary;
use Codenames\Dimension\Dimensions;
use Codenames\Keycard\Keycard;
use Codenames\Keycard\KeycardFactory;
use Codenames\Keycard\KeycardValueCounts;
use Codenames\Team\Team;
use Codenames\Team\Teams;

class NewGameFactory implements GameFactoryInterface
{
    /**
     * Create a new game instance with sensible default values.
     *
     * @param Team $redTeam
     * @param Team $blueTeam
     *
     * @return Game
     */
    public function makeGame(Team $redTeam, Team $blueTeam): Game
    {
        $teams = new Teams($redTeam, $blueTeam);

        $dimensions = $this->makeDimensions();
        $keycardValueCounts = $this->makeKeycardValueCounts();
        $dictionary = $this->makeDictionary();

        $deck = $this->makeDeck($dictionary);

        $keycard = $this->makeKeycard($dimensions, $keycardValueCounts);
        $cardGrid = $this->makeCardGrid($dimensions, $deck);

        return new Game($teams, $keycard, $cardGrid);
    }

    /**
     * @return Dimensions
     */
    private function makeDimensions(): Dimensions
    {
        return new Dimensions(5, 5);
    }

    /**
     * @return KeycardValueCounts
     */
    private function makeKeycardValueCounts(): KeycardValueCounts
    {
        return new KeycardValueCounts(8, 8, 1);
    }

    /**
     * @return Dictionary
     */
    private function makeDictionary(): Dictionary
    {
        return new Dictionary();
    }

    /**
     * @param Dictionary $dictionary
     *
     * @return Deck
     */
    private function makeDeck(Dictionary $dictionary): Deck
    {
        $deckFactory = new DeckFactory($dictionary);

        return $deckFactory->makeDeck();
    }

    /**
     * @param Dimensions         $dimensions
     * @param KeycardValueCounts $keycardValueCounts
     *
     * @return Keycard
     */
    private function makeKeyCard(Dimensions $dimensions, KeycardValueCounts $keycardValueCounts): Keycard
    {
        $keycardFactory = new KeycardFactory($dimensions, $keycardValueCounts);

        return $keycardFactory->makeKeycard();
    }

    /**
     * @param Dimensions $dimensions
     * @param Deck       $deck
     *
     * @return CardGrid
     */
    private function makeCardGrid(Dimensions $dimensions, Deck $deck): CardGrid
    {
        $cardGridFactory = new CardGridFactory();

        return $cardGridFactory->makeCardGrid($dimensions, $deck);
    }
}
