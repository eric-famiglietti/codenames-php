<?php

declare(strict_types=1);

namespace Tests\Codenames\Team;

use Codenames\Team\TeamFactory;
use PHPUnit\Framework\TestCase;

class TeamFactoryTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->factory = new TeamFactory;
    }
    public function testItMakesARedTeam()
    {
        $team = $this->factory->makeRedTeam('Eric', 'Myles');

        $this->assertTrue($team->isRed());
    }

    public function testItMakesABlueTeam()
    {
        $team = $this->factory->makeBlueTeam('Greg', 'Mike');

        $this->assertTrue($team->isBlue());
    }
}
