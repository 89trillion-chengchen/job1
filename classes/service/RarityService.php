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
            return [ false, 'lack_of_$params' ];
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
        $num=array();
        foreach ($data as $x=>$x_value){
            //echo $data[$x]['id']."<br>";
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
