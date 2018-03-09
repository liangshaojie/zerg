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
    protected function isPositiveInteger($value,$rule='',$data = '',$field = ''){
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return false;
    }
    protected function isNotEmpty($value,$rule='',$data = '',$field = ''){
        if (empty($value)) {
            return false;
        }else{
            return true;
        }
    }
}
