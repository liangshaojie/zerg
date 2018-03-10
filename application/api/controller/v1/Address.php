<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/10/010
 * Time: 11:39
 */

namespace app\api\controller\v1;


use app\api\model\User as UserModel;
use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\lib\exception\SuccessException;

class Address
{
    public function createOrUpdateAddress(){
        (new AddressNew()) -> goCheck();
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        $dataArray = getDatas();
        $userAddress = $user -> address;
        if(!$userAddress){
            $user -> address() -> save($dataArray);
        }else{
            $user -> address -> save($dataArray);
        }
        return new SuccessException();
    }
}