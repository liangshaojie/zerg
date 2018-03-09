<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/7
 * Time: 14:01
 */

namespace app\api\model;

use app\api\model\Product as ProductModel;


class Product extends BaseModel
{
    protected $hidden = ['delete_time','update_time','main_img_id','from','category_id','create_time','pivot'];

    public function getMainImgUrlAttr($value,$data){
        return $this -> prefixImgUrl($value,$data);
    }

    public function imgs(){
        return $this -> hasMany('ProductImage','product_id','id');
    }

    public function properties(){
        return $this -> hasMany('ProductProperty','product_id','id');
    }

    public static function getMostRecent($count){
        $products = self::limit($count) -> order('create_time desc') -> select();
        return $products;
    }

    public static function getProductsByCategoryID($categoryID){
        $products = self::where('category_id','=',$categoryID) ->select();
        return $products;
    }

    public static function getProductDetail($id){
        $product = self::with('imgs,properties') -> find($id);
        return $product;
    }
}