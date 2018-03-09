<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/9
 * Time: 11:14
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 500;
    public $msg = '微信内部错误';
    public $errorCode = 50000;
}