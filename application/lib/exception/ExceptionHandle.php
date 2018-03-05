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
use think\Request;

class ExceptionHandle extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    public function render(Exception $e)
    {
        if($e instanceof BaseException){
            $this -> code = $e -> code;
            $this -> msg = $e -> msg;
            $this -> errorCode = $e -> errorCode;

        }else{
            $this -> code = 500;
            $this -> msg = '服务器内部错误，不想告诉你';
            $this -> errorCode = 999;
        }
        $request = Request::instance();
        $result = [
            'msg' => $this -> msg,
            'error_code' => $this -> errorCode,
            'request_url' => $request -> url()
        ];

        return json($result,$this->code);

    }
}