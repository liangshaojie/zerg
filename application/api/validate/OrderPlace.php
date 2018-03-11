<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/11/011
 * Time: 14:00
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
    protected $products = [
        [
            'product_id' => 1,
            'count' => 5
        ],
        [
            'product_id' => 2,
            'count' => 5
        ],
        [
            'product_id' => 3,
            'count' => 5
        ],
        [
            'product_id' => 4,
            'count' => 5
        ]
    ];
    protected $rule = [
        'products' => 'checkProducts'
    ];

    protected $singleRule = [
        'product_id' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger',
    ];

    protected function checkProducts($values){
        if(!is_array($values)){
            throw new ParameterException([
                'msg' => '参数有误，不是数组！'
            ]);
        }
        if(empty($values)){
            throw new ParameterException([
                'msg' => '商品列表不能为空！'
            ]);
        }
        foreach ($values as $value){
            $this->checkProduct($value);
        }
        return true;
    }

    protected function checkProduct($value){
        $validate = new BaseValidate($this -> singleRule);
        $result = $validate -> check($value);
        if(!$result){
            throw new ParameterException([
                'msg' => '商品列表参数错误',
            ]);
        }
    }

}