<?php

header("content-type:text/html;charset=utf-8");
include 'testm.php';

$quality=$_GET['quality'];

$main=new Main();
$main->setNewJsonArray();
$data=$main->getJsonArray();
print_r(getUnlockedSoldierJson($data,$quality));


/**
 * 获取每个阶段解锁相应士兵的json数据
 * @param $data
 * @param $quality
 * @return false|string
 */
function getUnlockedSoldierJson($data,$quality){
    $unlockedSoldier=array();
    foreach ($data as $x=>$x_value){
        if($data[$x]['quality']>=$quality){
            array_push($unlockedSoldier,$data[$x]);
        }
    }
    if(count($unlockedSoldier)!=0){
        return json_encode($unlockedSoldier);
    }else{
        return "该条件无合法士兵！";
    }
}


?>