<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/7
 * Time: 14:01
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['delete_time','update_time','main_img_id','from','category_id','create_time','pivot'];
}