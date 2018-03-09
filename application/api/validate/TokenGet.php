<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/9
 * Time: 10:11
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code,还想获取token,做梦吧！'
    ];

}