<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/6
 * Time: 10:04
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}