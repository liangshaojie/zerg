<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/9
 * Time: 16:39
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['img_id','delete_time','product_id'];
    public function imgUrl(){
        return $this -> belongsTo('Image','img_id','id');
    }
}