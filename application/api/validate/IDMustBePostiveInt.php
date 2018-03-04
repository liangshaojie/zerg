<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/4/004
 * Time: 18:55
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    protected function isPositiveInteger($value,$rule='',$data = '',$field = ''){
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return $field . '必须是正整数';
    }
}