<?php

namespace service;

require "../../lib/raftphp/framework/util/Singleton.php";
require "../service/BaseService.php";
require "../../json/config.army.model.json";
require "../../json/newconfig.army.model.json";
require "../service/RarityService.php";
use framework\util\Singleton;
use PHPUnit\Framework\TestCase;

class RarityServiceTest extends TestCase
{

    public function testGetRarity()
    {

        /** @var RarityService $rarityService */
        $rarityService=Singleton::get(RarityService::class);
        echo $rarityService->getRarity("10101");
    }
}
