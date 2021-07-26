<?php
header("content-type:text/html;charset=utf-8");
include 'testm.php';


$cvc=$_GET['cvc'];
$rarity=$_GET['rarity'];
$quality=$_GET['quality'];

$main=new Main();
$main->setNewJsonArray();
$data=$main->getJsonArray();
print_r(getLegalCvcAndUnlockedSoldier($data,$rarity,$quality,$cvc));




/**
 *获取该稀有度cvc合法且已解锁的所有士兵
 * @param $data
 * @param $rarity
 * @param $quality
 * @param $cvc
 * @return false|string
 */
function getLegalCvcAndUnlockedSoldier($data,$rarity,$quality,$cvc){
    $legalCvcAndUnlockedSoldier=array();
    foreach ($data as $x=>$x_value){
        //echo $data[$x]['rarity']." ".$data[$x]['quality']." ".$data[$x]['cvc']."<br>";
        if($data[$x]['rarity']==$rarity&&$data[$x]['quality']>=$quality&&$data[$x]['cvc']<=$cvc){
            array_push($legalCvcAndUnlockedSoldier,$data[$x]);
        }
    }
    if(count($legalCvcAndUnlockedSoldier)!=0){
        return json_encode($legalCvcAndUnlockedSoldier);
    }else{
        return "该条件无合法士兵！";
    }
}
?>