<?php

namespace service;


class CombatPointsService extends BaseService {


    /**
     * CombatPointsService constructor.
     */
    public function __construct()
    {
    }

    public function checkUploadParams($params)
    {

        if (!isset($params) || empty($params)) {
            return [ false, 'lack_of_$params' ];
        }
        return [ true, 'ok' ];
    }
    /**
     * 获取战力
     * @param $id
     * @return array
     */
    public function getCombatPoints($id){

        $num=array();
        parent::setNewJsonArray();
        $data=parent::getJsonArray();
        //print_r($data);
        foreach ($data as $x=>$x_value){
            if($data[$x]['id']==$id){
                array_push($num,$data[$x]);
                break;
            }
        }

        if($num == null){
            return parent::show(
                200,
                id错误，未找到该士兵id！,
                $num
            );

        }else{
            return parent::show(
                200,
                ok,
                $num
            );
        }

    }
}
