<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/4/004
 * Time: 20:42
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        $request = Request::instance();
        $params = $request -> param();
        $result = $this->check($params);
        if(!$result){
            $e = new ParameterException([
                'msg' => $this -> error,
            ]);
            throw $e;
        }else{
            return true;
        }
    }
}
