<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/12/5
 * Time: 15:46
 */
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model{
    public function getOrder(){
        $sql="select a.*,b.consignee from tp_order a left join tp_address b on a.address_id=b.id";
        $order_data=$this->query($sql);
        //p($order_data);
        return $order_data;
    }
}