<?php
header("content-type:text/html;charset=utf-8");
include 'testm.php';

$cvc=$_GET['cvc'];

$main=new Main();
$main->setNewJsonArray();
$data=$main->getJsonArray();

print_r(getLegalSoldier($data,$cvc));

/**
 * 获取所有合法士兵
 * @param $data
 * @param $cvc
 * @return false|string
 */
function getLegalSoldier($data,$cvc){
    $legalSoldier=array();
    foreach ($data as $x=>$x_value){
        //echo $data[$x]['cvc']."<br>";
        if($data[$x]['cvc']<=$cvc){
            array_push($legalSoldier,$data[$x]);
        }
    }
    if(count($legalSoldier)!=0){
        return json_encode($legalSoldier);
    }else{
        return "该版本号无合法士兵！";
    }
}

?>
