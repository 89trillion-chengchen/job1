<?php

namespace service;

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
