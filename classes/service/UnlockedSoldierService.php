<?php

namespace service;


class UnlockedSoldierService extends BaseService
{


    /**
     * CombatPointsService constructor.
     */
    public function __construct()
    {
    }

    public function checkUploadParams($params)
    {

        if ($params="") {
            return [false, 'lack_of_$params'];
        }
        return [true, 'ok'];
    }

    /**
     * 获取每个阶段解锁相应士兵的json数据
     * @param $unlockArena
     * @return array
     */
    function getUnlockedSoldierJson($unlockArena)
    {
        parent::setNewJsonArray();
        $data = parent::getJsonArray();
        $unlockedSoldier = array();
        foreach ($data as $key => $value) {
            if ($value['unlockArena'] == $unlockArena) {
                array_push($unlockedSoldier, $value);
            }
        }
        if (count($unlockedSoldier) != 0) {
            return parent::show(
                200,
                ok,
                $unlockedSoldier
            );
        } else {
            return parent::show(
                200,
                '该条件无合法士兵！',
                $unlockedSoldier
            );
        }
    }

}
