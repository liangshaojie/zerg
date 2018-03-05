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
use think\Exception;


class Banner
{
    public function getBanner($id){
        $validate = new IDMustBePostiveInt();
        $validate->goCheck();
        try{
            $banner = BannerModel::getBannerById($id);
        }catch (Exception $ex){
            $err = [
                'error_code' => 10001,
                'msg' => $ex -> getMessage()
            ];
            return json($err,400);
        }
        return $banner;
    }
}