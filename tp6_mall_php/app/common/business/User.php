<?php


namespace app\common\business;

use \app\common\model\mysql\User as UserDodle;
class User
{
    /**
     * business层通过getDaraUserstatus来获取数据
     */
    public function getDataUserstatus($value,$limit = 10)
    {
        $model = new UserDodle();
        $results = $model->getDataUserstatus($value,$limit);
        //在config下新建category.php
        $cagegorys = config('category');
        //将二维的数组进行遍历
        foreach ($results as $key => $result){
            //输出下标为$key的数组并且增加categoryName的数据，
            $results[$key]['categoryName'] = $cagegorys[$result['status']] ?? '其他';
        }
        return $results;
    }
}