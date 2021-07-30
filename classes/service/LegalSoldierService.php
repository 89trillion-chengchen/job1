<?php


namespace service;



class LegalSoldierService extends BaseService{


    /**
     * LegalCvcAndUnlockedSoldierService constructor.
     */
    public function __construct()
    {
    }

    public function checkParams($cvc)
    {

        if (!isset($cvc) || empty($cvc)) {
            return [ false, 'lack_of_cvc' ];
        }

        return [ true, 'ok' ];
    }

    /**
     * 输入cvc，获取所有合法士兵
     * @param $data
     * @param $cvc
     * @return false|string
     */
    function getLegalSoldier($cvc){
        parent::setNewJsonArray();
        $data=parent::getJsonArray();
        $legalSoldier=array();
        foreach ($data as $x=>$x_value){
            if($data[$x]['cvc']<=$cvc){
                array_push($legalSoldier,$data[$x]);
            }
        }
        if(count($legalSoldier)!=0){
            return parent::show(
                200,
                ok,
                $legalSoldier
            );
        }else{
            return parent::show(
                200,
                该版本号无合法士兵！,
                $legalSoldier
            );
        }

    }


}