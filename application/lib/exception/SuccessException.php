<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/10/010
 * Time: 12:24
 */

namespace app\lib\exception;


class SuccessException extends BaseException
{
    public $code = 201;
    public $msg = 'Ok';
    public $errorCode = 0;
}