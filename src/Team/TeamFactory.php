<?php

declare(strict_types=1);

namespace Codenames\Team;

use Codenames\Player\PlayerFactory;

class TeamFactory
{
    /** @var PlayerFactory */
    private $factory;

    /**
     * Create a new team factory instance.
     */
    public function __construct()
    {
        $this->factory = new PlayerFactory();
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

        return $this->makeTeam(TeamColors::RED, $players);
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

        return $this->makeTeam(TeamColors::BLUE, $players);
    }

    /**
     * @param string $spymasterName
     * @param string $operativeName
     *
     * @return TeamPlayers
     */
    private function makePlayers(string $spymasterName, string $operativeName): TeamPlayers
    {
        $spymaster = $this->factory->makeSpymaster($spymasterName);
        $operative = $this->factory->makeOperative($operativeName);

        return new TeamPlayers($spymaster, $operative);
    }

    /**
     * @param int         $color
     * @param TeamPlayers $players
     *
     * @return Team
     */
    private function makeTeam(int $color, TeamPlayers $players): Team
    {
        return new Team($color, $players);
    }
}
