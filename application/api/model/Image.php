<?php

namespace app\api\model;

use think\Model;

class Image extends BaseModel
{
    protected $hidden = ['delete_time','update_time','from','id'];

    public function getUrlAttr($value,$data){
        return $this -> prefixImgUrl($value,$data);
    }
}
