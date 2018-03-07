<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/7
 * Time: 15:11
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids必须以逗号隔开的正整数！'
    ];

    protected function checkIDs($value){
        $values = explode(',',$value);
        if(empty($values)){
            return false;
        }
        foreach ($values as $id){
            if(!$this -> isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}