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

class Banner
{
    public static function getBannerById($id)
    {
//        $result = Db::query('select * from banner_item WHERE banner_id=?',[$id]);
//        return $result;
        $result = Db::table('banner_item')
            -> where('banner_id','=',$id)
            -> select();
        return $result;
    }
}