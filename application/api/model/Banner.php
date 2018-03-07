<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/5
 * Time: 15:08
 */

namespace app\api\model;

use think\Db;
use think\Exception;
use think\Model;

class Banner extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function items(){
        return $this -> hasMany('BannerItem','banner_id','id');
    }
    public static function getBannerById($id)
    {
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
    }
}