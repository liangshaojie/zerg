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
        'id' => 'require|isPositiveInteger',
    ];

    protected $message = [
        'id' => 'id必须是正整数！'
    ];


}