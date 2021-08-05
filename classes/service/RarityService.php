<?php

namespace service;


class RarityService extends BaseService {


    /**
     * CombatPointsService constructor.
     */
    public function __construct()
    {
    }

    public function checkUploadParams($params)
    {
        if (!isset($params) || empty($params)) {
            return [ false, 'lack_of_params' ];
        }
        return [ true, 'ok' ];
    }

    /**
     * 输入士兵id获取稀有度
     * @param $id
     * @return array
     */
    function getRarity($id){
        parent::setNewJsonArray();
        $data=parent::getJsonArray();
        $rarity=array();
        foreach ($data as $key=>$value){
            if($value['id']==$id){
                $rarity['rarity']=$value[rarity];
                break;
            }
        }

        if($rarity == null){
            return parent::show(
                200,
                'id错误，未找到该士兵id！',
                $rarity
            );

        }else{
            return parent::show(
                200,
                ok,
                $rarity
            );
        }

    }

}
