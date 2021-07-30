<?php

namespace service;

use framework\util\Singleton;
use PHPUnit\Framework\TestCase;

class LegalCvcAndUnlockedSoldierServiceTest extends TestCase
{

    public function testGetLegalCvcAndUnlockedSoldier()
    {

        /** @var LegalCvcAndUnlockedSoldierService $legalCvcAndUnlockedSoldierService */
        $legalCvcAndUnlockedSoldierService=Singleton::get(LegalCvcAndUnlockedSoldierService::class);
        echo $legalCvcAndUnlockedSoldierService->getLegalCvcAndUnlockedSoldier("1","1","1500");
    }
}
