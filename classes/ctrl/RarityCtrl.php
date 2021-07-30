<?php


namespace ctrl;

use framework\util;
use service\AnswerService;
use service\CombatPointsService;
use service\RarityService;
use utils\HttpUtil;
use view\JsonView;





class RarityCtrl extends CtrlBase {

    /**
     * 构造函数，继承父方法
     * @return void
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 输入士兵id获取稀有度
     * @return false|string|JsonView
     */
    public function getRarity(){

        //获取get或post请求数据
        $params = HttpUtil::getPostData('id');


        /** @var RarityService $cntSrv */
        $cntSrv = util\Singleton::get(RarityService::class);

        //校验数据
        list($checkResult, $checkNotice) = $cntSrv->checkUploadParams($params);


        if (true!==$checkResult){
            $rspArr = AnswerService::makeResponseArray($checkNotice);
            return new JsonView($rspArr);
        }

        //执行函数
        $result=$cntSrv->getRarity($params);

        return json_encode($result);



    }



}


?>
