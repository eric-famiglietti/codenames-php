<?php

declare(strict_types=1);

namespace Tests\Codenames\Team;

use Codenames\Team\TeamFactory;
use PHPUnit\Framework\TestCase;

final class TeamFactoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->factory = new TeamFactory();
    }

    public function testItCreatesATeamFactory(): void
    {
        $this->assertInstanceOf(TeamFactory::class, $this->factory);
    }

    public function testItMakesARedTeam(): void
    {
        $team = $this->factory->makeRedTeam('Eric', 'Myles');

        $this->assertTrue($team->isRed());
    }

    public function testItMakesABlueTeam(): void
    {
        $team = $this->factory->makeBlueTeam('Greg', 'Mike');

        $this->assertTrue($team->isBlue());
    }
}
