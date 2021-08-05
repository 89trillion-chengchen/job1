<?php

namespace ctrl;

use framework\util\Singleton;
use service\AnswerService;
use service\LegalCvcAndUnlockedSoldierService;
use utils\HttpUtil;
use view\JsonView;

class LegalCvcAndUnlockedSoldierCtrl extends CtrlBase
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
     * 输入稀有度，当前解锁阶段和cvc，获取该稀有度cvc合法且已解锁的所有士兵
     * @return false|string|JsonView
     */
    public function getLegalCvcAndUnlockedSoldier()
    {
        //获取get或post请求数据
        $cvc = HttpUtil::getPostData('cvc');
        $rarity = HttpUtil::getPostData('rarity');
        $unlockArena = HttpUtil::getPostData('unlockArena');

        /** @var LegalCvcAndUnlockedSoldierService $cntSrv */
        $cntSrv = Singleton::get(LegalCvcAndUnlockedSoldierService::class);

        //校验数据
        list($checkResult, $checkNotice) = $cntSrv->checkParams($rarity, $unlockArena, $cvc);
        if (true !== $checkResult) {
            $rspArr = AnswerService::makeResponseArray($checkNotice);
            return new JsonView($rspArr);
        }
        //执行函数
        $result = $cntSrv->getLegalCvcAndUnlockedSoldier($rarity, $unlockArena, $cvc);

        return new JsonView($result);
    }


}