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

class Banner extends Model
{
    public function items(){
        return $this -> hasMany('BannerItem','banner_id','id');
    }
    public static function getBannerById($id)
    {
        $result = Db::table('banner_item')
            -> where('banner_id','=',$id)
            -> select();
        return $result;
    }
}