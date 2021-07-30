<?php

namespace service;

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
