<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/10/010
 * Time: 11:39
 */

namespace app\api\controller\v1;


use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;

class Address
{
    public function createOrUpdateAddress(){
        (new AddressNew()) -> goCheck();

        $uid = TokenService::getCurrentUid();
    }
}