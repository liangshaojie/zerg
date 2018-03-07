<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/7
 * Time: 14:02
 */

namespace app\api\model;


class Theme extends BaseModel
{
    public function topicImg(){
        return $this -> belongsTo('Image','topic_img_id','id');
    }
    public function headImg(){
        return $this -> belongsTo('Image','head_img_id','id');
    }
}