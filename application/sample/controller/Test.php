<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/1
 * Time: 14:00
 */

namespace app\sample\controller;
use think\Request;
use think\Response;

class Test
{
    public function hello(Request $request){

//        $all = Request::instance() -> get();
        $all = $request -> param();
        var_dump($all);
//        $name = Request::instance() -> param('name');
//        $age = Request::instance() -> param('age');
//        echo $id;
//        echo $name;
//        echo $age;
        return 'hello,qiyue';
    }
}