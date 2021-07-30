<?php

namespace service;



class LegalCvcAndUnlockedSoldierService extends BaseService{


    /**
     * LegalCvcAndUnlockedSoldierService constructor.
     */
    public function __construct()
    {
    }

    public function checkParams($rarity, $quality, $cvc)
    {

        if (!isset($rarity) || empty($rarity)) {
            return [ false, 'lack_of_rarity' ];
        }

        if (!isset($quality) || empty($quality)) {
            return [ false, 'lack_of_quality' ];
        }

        if (!isset($cvc) || empty($cvc)) {
            return [ false, 'lack_of_cvc' ];
        }

        return [ true, 'ok' ];
    }

    /**
     * 输入稀有度，当前解锁阶段和cvc，获取该稀有度cvc合法且已解锁的所有士兵
     * @param $rarity
     * @param $quality
     * @param $cvc
     * @return array
     */
    public function getLegalCvcAndUnlockedSoldier($rarity,$quality,$cvc){

        parent::setNewJsonArray();
        $data=parent::getJsonArray();

        $legalCvcAndUnlockedSoldier=array();
        foreach ($data as $x=>$x_value){
            if($data[$x]['rarity']==$rarity&&$data[$x]['quality']>=$quality&&$data[$x]['cvc']<=$cvc){
                array_push($legalCvcAndUnlockedSoldier,$data[$x]);
            }
        }
        if(count($legalCvcAndUnlockedSoldier)!=0){

            return parent::show(
                200,
                ok,
                $legalCvcAndUnlockedSoldier
            );


        }else{

            return parent::show(
                200,
                该条件无合法士兵！,
                $legalCvcAndUnlockedSoldier
            );
        }

    }

}