<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/3/003
 * Time: 15:32
 */

namespace app\api\controller\v1;
use app\api\validate\IDMustBePostiveInt;
use app\api\validate\TestValidate;
use think\Validate;


class Banner
{
    public function getBanner($id){
//        $data = [
//            'id' => $id
//        ];
//        $validate = new IDMustBePostiveInt();
//        $result = $validate ->batch() -> check($data);
//        if($result){
//            echo '444';
//        }
        (new IDMustBePostiveInt()) -> goCheck();
        $d = 1;

    }
}