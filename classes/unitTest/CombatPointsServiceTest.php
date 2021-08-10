<?php

namespace service;

require "../../lib/raftphp/framework/util/Singleton.php";
require "../../json/config.army.model.json";
require "../../json/newconfig.army.model.json";
require "../service/BaseService.php";
require "../service/CombatPointsService.php";
use framework\util\Singleton;
use PHPUnit\Framework\TestCase;
use service\BaseService;
use service\CombatPointsService;


class CombatPointsServiceTest extends TestCase
{

    public function testGetCombatPoints()
    {
        /** @var CombatPointsService $combatPointsService */
        $combatPointsService=Singleton::get(CombatPointsService::class);
        print_r($combatPointsService->getCombatPoints('10101'));
    }
}
