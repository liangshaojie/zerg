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
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessException;
use app\lib\exception\TokenException;
use think\Controller;

class Address extends Controller
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];
    public function checkPrimaryScope(){
        $scope = TokenService::getCurrentTokenVar('scope');
        if($scope){
            if($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }

    public function createOrUpdateAddress(){
        $validate = new AddressNew();
        $validate  -> goCheck();
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        $dataArray = $validate -> getDataByRule(input('post.'));
        $userAddress = $user -> address;
        if(!$userAddress){
            $user -> address() -> save($dataArray);
        }else{
            $user -> address -> save($dataArray);
        }
        return json(new SuccessException(),201);
    }
}