<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/28
 * Time: 13:27
 */
namespace Home\Model;
use Think\Model;
use Think\Verify;
class MemberModel extends Model{
    public function getOrder(){
        $meb_id=$_SESSION['meb_id'];
        $sql="select a.order_sn,a.goods_amount,b.goods_name,b.goods_attr_id,b.shop_price,b.goods_nums,c.image_thumb,a.pay_status from tp_order a left join tp_order_goods b on a.id=b.order_id left join tp_goods c on b.goods_id=c.id where a.meb_id=$meb_id";
        $data=$this->query($sql);
        $cart_model=D('Cart');
        $array=array();
        foreach($data as $k=>$v){
            $data[$k]['goods_attr'][]=$cart_model->getAttr($v['goods_attr_id']);
        }
        //p($array);
        return $data;
    }
}