<?php
include 'soldier.php';
/*echo "获取页面传来的参数";
$type = $_GET['type'];
$proId = $_GET['id'];
echo $type . "产品type";
echo $proId . "产品Id";*/

$id=10101;
$cvc=1800;
$rarity=1;
$quality=1;

setNewJsonArray();
$data=getJsonArray();
print("<pre>"); // 格式化输出数组
print_r($data[0]);
print("</pre>");

//echo getRarity($data,$id)."<br>";
//echo getCombatPoints($data,$id)."<br>";
//print_r(getLegalSoldier($data,$cvc));
//print_r(getLegalCvcAndUnlockedSoldier($data,$rarity,$quality,$cvc));
print_r(getUnlockedSoldierJson($data,$quality));



/*echo "<br>";
echo $id;
echo "<br>";
echo getCombatPoints($data,$id);
echo "<br>";

echo "<br>";
echo getLegalSoldier($data,$cvc);
echo "<br>";*/



function setNewJsonArray(){
// 从文件中读取数据到PHP变量
    $json_string = file_get_contents('json/config.army.model.json');
// 用参数true把JSON字符串强制转成PHP数组
    $data = json_decode($json_string, true);
    $myarray=array();
    foreach ($data as $x=>$x_values){
        $soldier=new soldierClass($data[$x]['id'],$data[$x]['Rarity'],$data[$x]['CombatPoints'],$data[$x]['Quality'],$data[$x]['Cvc']);
        array_push($myarray,$soldier);
    }
    //print_r($myarray);
    try {
        file_put_contents('json/newconfig.army.model.json',json_encode($myarray));
    }catch (Exception $e){
        echo $e->getMessage();
    }

}

function getJsonArray(){
    // 从文件中读取数据到PHP变量
    $json_string = file_get_contents('json/newconfig.army.model.json');
    // 用参数true把JSON字符串强制转成PHP数组
    $data = json_decode($json_string, true);
    return $data;
}

//获取该稀有度cvc合法且已解锁的所有士兵
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
//获取稀有度
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
//获取所有合法士兵
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

//获取每个阶段解锁相应士兵的json数据
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
