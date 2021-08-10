<?php

namespace service;


class BaseService
{

    protected $dataDao;

    protected function __construct($className)
    {
        $this->dataDao = util\Singleton::get($className);
        return $this->dataDao;
    }

    /**
     * 解析json文件并整理格式且只保留有用的数据，生成新的json文件
     */
    public function setNewJsonArray()
    {
        // 从文件中读取数据到PHP变量
        $json_string = file_get_contents('../json/config.army.model.json');

        // 用参数true把JSON字符串强制转成PHP数组
        $data = json_decode($json_string, true);
        $myarray = array();
        foreach ($data as $key => $values) {
        $tmparray = array(
            "id" => $values['id'],
            "rarity" => $values['Rarity'],
            "combatPoints" => $values['CombatPoints'],
            "unlockArena" => $values['UnlockArena'],
            "cvc" => $values['Cvc']
        );
        array_push( $myarray,$tmparray);
    }

        try {
            file_put_contents('../json/newconfig.army.model.json', json_encode($myarray));
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    /**
     * 解析新的json文件返回数组
     * @return mixed
     */
    public function getJsonArray()
    {
        // 从文件中读取数据到PHP变量
        $json_string = file_get_contents('../json/newconfig.army.model.json');
        // 用参数true把JSON字符串强制转成PHP数组
        $data = json_decode($json_string, true);
        return $data;
    }

    function show($status,$msg='',$data=[]) {

        $result = [
            'status'=>intval($status),
            'msg'=>$msg
        ];

        if(!empty($data)|| $data == 0){
            $result['data'] = $data;
        }

        return $result;
    }


}


?>
