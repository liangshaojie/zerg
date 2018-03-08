<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/8
 * Time: 11:53
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategories(){
        $categories = CategoryModel::all([],'img');
        if($categories -> isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }
}