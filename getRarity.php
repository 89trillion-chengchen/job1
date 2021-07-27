<?php
header("content-type:text/html;charset=utf-8");
include 'testm.php';

$id=$_GET['id'];


$main=new Main();
$main->setNewJsonArray();
$data=$main->getJsonArray();



echo getRarity($data,$id);


/**
 * 获取稀有度
 * @param $data
 * @param $id
 * @return mixed|string
 */
function getRarity($data,$id){
    //echo "id: ".$id."<br>";
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
        return $data[$num]['rarity'];
    }else{
        return 'id错误，未找到该士兵id！';
    }
}


?>
