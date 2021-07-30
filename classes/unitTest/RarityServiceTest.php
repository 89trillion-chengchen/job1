<?php

namespace service;

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
