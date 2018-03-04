<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/4/004
 * Time: 18:34
 */

namespace app\api\validate;
use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ];
}