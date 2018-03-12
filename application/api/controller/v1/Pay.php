<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/12
 * Time: 11:00
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\IDMustBePostiveInt;
use app\api\service\Pay as PayService;

class Pay extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'getPreOrder']
    ];
    public function getPreOrder($id=''){
        (new IDMustBePostiveInt()) -> goCheck();
        $pay= new PayService($id);
        return $pay->pay();
    }

    public function receiveNotify()
    {
//        $xmlData = file_get_contents('php://input');
//        Log::error($xmlData);
        $notify = new WxNotify();
        $notify->handle();
//        $xmlData = file_get_contents('php://input');
//        $result = curl_post_raw('http:/zerg.cn/api/v1/pay/re_notify?XDEBUG_SESSION_START=13133',
//            $xmlData);
//        return $result;
//        Log::error($xmlData);
    }

}