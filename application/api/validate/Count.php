<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/8
 * Time: 10:04
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];

}