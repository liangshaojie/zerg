<?php

namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel
{
    protected $hidden = ['delete_time','update_time','id','banner_id','img_id'];
    public function img(){
        return $this -> belongsTo('Image','img_id','id');
    }
}
