<?php

namespace service;

require "../../lib/raftphp/framework/util/Singleton.php";
require "../service/BaseService.php";
require "../../json/config.army.model.json";
require "../../json/newconfig.army.model.json";
require "../service/LegalSoldierService.php";
use framework\util\Singleton;
use PHPUnit\Framework\TestCase;

class LegalSoldierServiceTest extends TestCase
{

    public function testGetLegalSoldier()
    {

        /** @var LegalSoldierService $legalSoldierService */
        $legalSoldierService=Singleton::get(LegalSoldierService::class);
        echo $legalSoldierService->getLegalSoldier("1500");
    }
}
