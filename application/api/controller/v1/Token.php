<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/9
 * Time: 10:10
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code = ''){
        (new TokenGet()) -> goCheck();
        $ut = new UserToken();
        $token = $ut -> get($code);
        return $token;
    }
}