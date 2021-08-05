<?php
namespace ctrl;

use framework\util;
use service\AnswerService;
use service\CombatPointsService;
use service\UnlockedSoldierService;
use utils\HttpUtil;
use view\JsonView;


class UnlockedSoldierCtrl extends CtrlBase
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
     * 获取每个阶段解锁相应士兵的json数据
     * @return JsonView
     */
    public function getUnlockedSoldierJson()
    {
        //获取get或post请求数据
        $unlockArena = HttpUtil::getPostData('unlockArena');
        /** @var UnlockedSoldierService $cntSrv */
        $cntSrv = util\Singleton::get(UnlockedSoldierService::class);
        //校验数据
        list($checkResult, $checkNotice) = $cntSrv->checkUploadParams($unlockArena);
        if (true !== $checkResult) {
            $rspArr = AnswerService::makeResponseArray($checkNotice);
            return new JsonView($rspArr);
        }
        //执行函数
        $result = $cntSrv->getUnlockedSoldierJson($unlockArena);
        return new JsonView($result);

    }


}


?>
