<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/11/011
 * Time: 13:46
 */

namespace app\api\controller;

use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller
{
    public function checkPrimaryScope(){
        TokenService::needPrimaryScope();
    }
    public function checkExclusiveScope(){
        TokenService::needExclusiveScope();
    }
}