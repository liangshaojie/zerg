<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/7
 * Time: 14:01
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;

class Theme
{
    public function getSimpleList($ids=''){
        (new IDCollection())-> goCheck();
        return 'success';
    }
}