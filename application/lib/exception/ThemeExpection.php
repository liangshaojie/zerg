<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/7
 * Time: 15:57
 */

namespace app\lib\exception;


class ThemeExpection extends BaseException
{
    public $code = 400;
    public $msg = '指定的主图不存在，请检查主题ID';
    public $errorCode = 30000;
}