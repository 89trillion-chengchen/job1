<?php
class soldierClass{
    //id
    var $id;
    //稀有度
    var $rarity;
    //战斗力
    var $combatPoints;
    //解锁阶段
    var $quality;
    //版本号
    var $cvc;

    /**
     * soldierClass constructor.
     * @param $id
     * @param $rarity
     * @param $combatPoints
     * @param $quality
     * @param $cvc
     */
    public function __construct($id, $rarity, $combatPoints, $quality, $cvc)
    {
        $this->id = $id;
        $this->rarity = $rarity;
        $this->combatPoints = $combatPoints;
        $this->quality = $quality;
        $this->cvc = $cvc;
    }


}
?>
