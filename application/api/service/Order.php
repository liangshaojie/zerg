<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/11/011
 * Time: 19:07
 */

namespace app\api\service;
use app\api\model\Product;


class Order
{
    protected $oProducts;
    protected $products;
    protected $uid;
    public function place($uid,$oProducts){
        $this -> oProducts = $oProducts;
        $this -> products = $this->getProductsByOrder($oProducts);
        $this -> uid = $uid;
    }

    public function getProductsByOrder($oProducts){
        $oPIDs = [];
        foreach ($oProducts as $item) {
            array_push($oPIDs, $item['product_id']);
        }
        // 为了避免循环查询数据库
        $products = Product::all($oPIDs)
            ->visible(['id', 'price', 'stock', 'name', 'main_img_url'])
            ->toArray();
        return $products;
    }
}