<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/7
 * Time: 14:01
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\lib\exception\ThemeExpection;

class Theme
{
    public function getSimpleList($ids=''){
        (new IDCollection())-> goCheck();
        $ids = explode(',',$ids);
        $result = ThemeModel::with('topicImg,headImg')
            ->select($ids);
        if(!$result){
            throw new ThemeExpection();
        }
        return $result;
    }
}