<?php

declare(strict_types=1);

namespace Codenames\Team;

use Codenames\Color\Color;
use Codenames\Color\ColorValues;
use Codenames\Player\PlayerFactory;
use Codenames\Player\Players;

class TeamFactory
{
    /** @var PlayerFactory */
    private $playerFactory;

    /**
     * Create a new team factory instance.
     */
    public function __construct()
    {
        $this->playerFactory = new PlayerFactory();
    }

    /**
     * Make a new team instance with a red color.
     *
     * @param string $spymasterName
     * @param string $operativeName
     *
     * @return Team
     */
    public function makeRedTeam(string $spymasterName, string $operativeName): Team
    {
        $players = $this->makePlayers($spymasterName, $operativeName);
        $color = $this->makeColor(ColorValues::RED);

        return $this->makeTeam($color, $players);
    }

    /**
     * Make a new team instance with a blue color.
     *
     * @param string $spymasterName
     * @param string $operativeName
     *
     * @return Team
     */
    public function makeBlueTeam(string $spymasterName, string $operativeName): Team
    {
        $players = $this->makePlayers($spymasterName, $operativeName);
        $color = $this->makeColor(ColorValues::BLUE);

        return $this->makeTeam($color, $players);
    }

    /**
     * @param int $value
     *
     * @return Color
     */
    private function makeColor(int $value): Color
    {
        return new Color($value);
    }

    /**
     * @param string $spymasterName
     * @param string $operativeName
     *
     * @return Players
     */
    private function makePlayers(string $spymasterName, string $operativeName): Players
    {
        $spymaster = $this->playerFactory->makeSpymaster($spymasterName);
        $operative = $this->playerFactory->makeOperative($operativeName);

        return new Players($spymaster, $operative);
    }

    /**
     * @param Color   $color
     * @param Players $players
     *
     * @return Team
     */
    private function makeTeam(Color $color, Players $players): Team
    {
        return new Team($color, $players);
    }
}
