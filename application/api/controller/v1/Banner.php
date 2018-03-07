<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/3/003
 * Time: 15:32
 */

namespace app\api\controller\v1;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;
use think\Exception;


class Banner
{
    public function getBanner($id){
        $validate = new IDMustBePostiveInt();
        $validate->batch() ->goCheck();
        $banner = BannerModel::getBannerById($id);
//        $banner -> hidden(['delete_time','items.id']);
//        $banner -> visible(['update_time']);
        if(!$banner){
            throw new BannerMissException();
        }
        $c = config('setting.img_prefix');
        return $banner;
    }
}