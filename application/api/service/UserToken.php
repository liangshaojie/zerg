<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/9
 * Time: 10:27
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code)
    {
        $this -> code = $code;
        $this -> wxAppID = config('wx.app_id');
        $this -> wxAppSecret = config('wx.app_secret');
        $this -> wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);
    }

    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult)) {
            throw new Exception('获取session_key以及openID异常，微信内部错误');
        }else{
            $loginFail = array_key_exists('errcode',$wxResult);
            if($loginFail){
                $this->processLoginError($wxResult);
            }else{
                $this -> grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult){
        $openid = $wxResult['openid'];
        $user =  UserModel::getByOpenID($openid);
        if($user){
            $uid = $user -> id;
        }else{
            $uid = $this -> newUser($openid);
        }
        $cachenValue = $this -> prepareCachedValue($wxResult,$uid);
    }

    private function saveToCache(){
        $key = generateToken();
        

    }

    private function prepareCachedValue($wxResult,$uid){
        $cachenValue = $wxResult;
        $cachenValue['uid'] = $uid;
        $cachenValue['scope'] = 16;
        return $cachenValue;
    }

    private function newUser($openid){
        $user = UserModel::create([
            'openid' => $openid
        ]);
        return $user -> id;
    }


    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }
}