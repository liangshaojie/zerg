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
}