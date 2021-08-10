<?php

namespace service;

require "../../lib/raftphp/framework/util/Singleton.php";
require "../service/BaseService.php";
require "../../json/config.army.model.json";
require "../../json/newconfig.army.model.json";
require "../service/UnlockedSoldierService.php";
use framework\util\Singleton;
use PHPUnit\Framework\TestCase;

class UnlockedSoldierServiceTest extends TestCase
{

    public function testGetUnlockedSoldierJson()
    {
        /** @var unlockedSoldierService $unlockedSoldierService */
        $unlockedSoldierService=Singleton::get(UnlockedSoldierService::class);
        echo $unlockedSoldierService->getUnlockedSoldierJson("1");
    }
}
