<?php

namespace ctrl;

use framework\util\Singleton;
use service\AnswerService;
use service\LegalCvcAndUnlockedSoldierService;
use service\LegalSoldierService;
use utils\HttpUtil;
use view\JsonView;

class LegalSoldierCtrl extends CtrlBase
{
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
     *输入cvc，获取所有合法士兵
     * @return false|string|JsonView
     */
    public function getLegalSoldier()
    {
        //获取get或post请求数据
        $cvc = HttpUtil::getPostData('cvc');
        /** @var LegalSoldierService $cntSrv */
        $cntSrv = Singleton::get(LegalSoldierService::class);
        //校验数据
        list($checkResult, $checkNotice) = $cntSrv->checkParams($cvc);
        if (true !== $checkResult) {
            $rspArr = AnswerService::makeResponseArray($checkNotice);
            return new JsonView($rspArr);
        }
        //执行函数
        $result = $cntSrv->getLegalSoldier($cvc);
        return new JsonView($result);
    }


}