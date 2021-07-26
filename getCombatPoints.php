<?php
header("content-type:text/html;charset=utf-8");
include 'testm.php';

$id=$_GET['id'];

$main=new Main();
$main->setNewJsonArray();
$data=$main->getJsonArray();
echo getCombatPoints($data,$id)."<br>";

//获取战力
function getCombatPoints($data,$id){
    $num=null;
    foreach ($data as $x=>$x_value){
        //echo $data[$x]['id']."<br>";
        if($data[$x]['id']==$id){
            $num=$x;
            //echo "num: ".$num."<br>";
            break;
        }
    }
    if($num!==null){
        return $data[$num]['combatPoints'];
    }else{
        return 'id错误，未找到该士兵id！';
    }

}

?>
