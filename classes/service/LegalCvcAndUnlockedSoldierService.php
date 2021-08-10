<?php

namespace service;


class LegalCvcAndUnlockedSoldierService extends BaseService
{


    /**
     * LegalCvcAndUnlockedSoldierService constructor.
     */
    public function __construct()
    {
    }

    public function checkParams($rarity, $unlockArena, $cvc)
    {
        if (!isset($rarity) || empty($rarity)) {
            return [false, 'lack_of_rarity'];
        }

        if ($unlockArena=="") {
            return [false, 'lack_of_unlockArena'];
        }

        if (!isset($cvc) || empty($cvc)) {
            return [false, 'lack_of_cvc'];
        }

        return [true, 'ok'];
    }

    /**
     * 输入稀有度，当前解锁阶段和cvc，获取该稀有度cvc合法且已解锁的所有士兵
     * @param $rarity
     * @param $quality
     * @param $cvc
     * @return array
     */
    public function getLegalCvcAndUnlockedSoldier($rarity, $unlockArena, $cvc)
    {
        parent::setNewJsonArray();
        $data = parent::getJsonArray();
        $legalCvcAndUnlockedSoldier = array();
        foreach ($data as $key => $value) {
            if ($value['rarity'] == $rarity && $value['unlockArena'] == $unlockArena && $value['cvc'] <= $cvc) {
                array_push($legalCvcAndUnlockedSoldier, $value);
            }
        }
        if (count($legalCvcAndUnlockedSoldier) != 0) {
            return parent::show(
                200,
                ok,
                $legalCvcAndUnlockedSoldier
            );
        } else {
            return parent::show(
                400,
                '该条件无合法士兵！',
                $legalCvcAndUnlockedSoldier
            );
        }

    }

}