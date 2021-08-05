<?php

namespace ctrl;

use framework\util;
use service\AnswerService;
use service\CombatPointsService;
use utils\HttpUtil;
use view\JsonView;

class CombatPointsCtrl extends CtrlBase
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

     * @return false|string|JsonView
     */
    /**
     * 输入id获取战力
     * @return JsonView
     */
    public function getCombatPoints()
    {
        //获取get或post请求数据
        $params = HttpUtil::getPostData('id');

        /** @var CombatPointsService $cntSrv */
        $cntSrv = util\Singleton::get(CombatPointsService::class);

        //校验数据
        list($checkResult, $checkNotice) = $cntSrv->checkUploadParams($params);

        if (true !== $checkResult) {
            $rspArr = AnswerService::makeResponseArray($checkNotice);
            return new JsonView($rspArr);
        }

        //执行函数
        $result = $cntSrv->getCombatPoints($params);

        return new JsonView($result);
    }

}


?>
