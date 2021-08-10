<?php

namespace service;

require "../../lib/raftphp/framework/util/Singleton.php";
require "../service/BaseService.php";
require "../../json/config.army.model.json";
require "../../json/newconfig.army.model.json";
require "../service/LegalCvcAndUnlockedSoldierService.php";
use framework\util\Singleton;
use PHPUnit\Framework\TestCase;
use service\BaseService;
use service\LegalCvcAndUnlockedSoldierService;

class LegalCvcAndUnlockedSoldierServiceTest extends TestCase
{

    public function testGetLegalCvcAndUnlockedSoldier()
    {
        /** @var LegalCvcAndUnlockedSoldierService $legalCvcAndUnlockedSoldierService */
        $legalCvcAndUnlockedSoldierService=Singleton::get(LegalCvcAndUnlockedSoldierService::class);
        echo $legalCvcAndUnlockedSoldierService->getLegalCvcAndUnlockedSoldier("1","1","1500");
    }
}
