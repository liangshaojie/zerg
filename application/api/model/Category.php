<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/8
 * Time: 11:54
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time','create_time'];
    public function img(){
        return $this -> belongsTo('Image','topic_img_id','id');
    }
}