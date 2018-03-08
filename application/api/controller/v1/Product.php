<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/8
 * Time: 10:02
 */

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;


class Product
{
    public function getRecent($count = 15){
        (new Count()) -> goCheck();
        $products = ProductModel::getMostRecent($count);
        if($products -> isEmpty()){
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }

    public function getAllInCategory($id){
        (new IDMustBePostiveInt()) -> goCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if($products -> isEmpty()){
            throw new ProductException();
        }
        $products = $products->hidden(['summary']);
        return $products;
    }
}