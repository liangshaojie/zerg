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
use think\log;

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
            $this -> recordErrorLog($e);
        }
        $request = Request::instance();
        $result = [
            'msg' => $this -> msg,
            'error_code' => $this -> errorCode,
            'request_url' => $request -> url()
        ];

        return json($result,$this->code);

    }

    private function recordErrorLog(Exception $e){
        Log::init([
            // 日志记录方式，内置 file socket 支持扩展
            'type'  => 'File',
            // 日志保存目录
            'path'  => LOG_PATH,
            // 日志记录级别
            'level' => ['error'],
        ]);
        Log::record($e -> getMessage(),'error');
    }
}