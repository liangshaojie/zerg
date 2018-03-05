<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/5
 * Time: 15:48
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}