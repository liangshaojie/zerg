<?php
/**
 * Created by PhpStorm.
 * User: 15618
 * Date: 2018/3/12
 * Time: 11:15
 */

namespace app\api\service;


class Pay
{
    private $orderID;
    private $orderNO;
    function __construct($orderID)
    {
        if (!$orderID)
        {
            throw new Exception('订单号不允许为NULL');
        }
        $this->orderID = $orderID;
    }

    public function pay(){

    }

}