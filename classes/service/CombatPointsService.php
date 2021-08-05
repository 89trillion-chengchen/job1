<?php

namespace service;


class CombatPointsService extends BaseService
{


    /**
     * CombatPointsService constructor.
     */
    public function __construct()
    {
    }

    public function checkUploadParams($params)
    {
        if (!isset($params) || empty($params)) {
            return [false, 'lack_of_params'];
        }
        return [true, 'ok'];
    }

    /**
     * 获取战力
     * @param $id
     * @return array
     */
    public function getCombatPoints($id)
    {
        $combatPoints = array();
        parent::setNewJsonArray();
        $data = parent::getJsonArray();
        foreach ($data as $key => $value) {
            if ($value['id'] == $id) {
                $combatPoints['combatPoints'] = $value[combatPoints];
                break;
            }
        }
        if ($combatPoints == null) {
            return parent::show(
                200,
                'id错误，未找到该士兵id！',
                $combatPoints
            );

        } else {
            return parent::show(
                200,
                ok,
                $combatPoints
            );
        }

    }
}
