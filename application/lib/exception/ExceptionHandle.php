<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/5
 * Time: 15:45
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;

class ExceptionHandle extends Handle
{
    public function render(Exception $ex)
    {
        return json('$$$$$$$$$');
    }
}