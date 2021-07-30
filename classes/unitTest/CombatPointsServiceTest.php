<?php

namespace service;

use framework\util\Singleton;
use PHPUnit\Framework\TestCase;

class CombatPointsServiceTest extends TestCase
{

    public function testGetCombatPoints()
    {

        /** @var CombatPointsService $combatPointsService */
        $combatPointsService=Singleton::get(CombatPointsService::class);
        echo $combatPointsService->getCombatPoints("10101");

    }
}
