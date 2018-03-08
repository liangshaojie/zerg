<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/8
 * Time: 12:02
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 500;
    public $msg = '指定的分类不存在';
    public $errorCode = 50000;
}