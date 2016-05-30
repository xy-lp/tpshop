<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/12/1
 * Time: 13:06
 */
namespace Home\Controller;
use Think\Controller;
class OrderController extends BaseController{
    /*
     * 添加订单页面及操作
     */
    public function addOrder(){
        $cart_moedel=D('cart');
        //判断购物车中是否有商品
        $Total=$cart_moedel->getCartTotal();
        if($Total['total_count']==0){
            $this->error('购物车中没有商品，无法下单',U('Cart/cartlist'),1);
        }
        /*
         * 判断用户是否登录
         */
        $meb_id=$_SESSION['meb_id'];
        if(empty($meb_id)){
            $_SESSION['return url']='Order/addOrder';
            $this->redirect('Member/login',array(),1,'你还没有登录，请先登录.......');
        }
        /*
         * 取出收货人信息
         */
        $address=M('address')->where(array('meb_id'=>$meb_id))->select();
        //p($address);
        $this->assign('address',$address);
        /*
         * 取出购物车中的商品
         */
        $cart_data=$cart_moedel->cartList();
        $getCartTotal=$cart_moedel->getCartTotal();
        $this->assign('getCartTotal',$getCartTotal);
        $this->assign('cart_data',$cart_data);
        $this->display();
    }
    /*
     * 提交订单
     */
    public function flow(){
        $meb_id=$_SESSION['meb_id'];
        $order_model=D('Order');
        /*
         * 订单入库
         */
        $order_data=$order_model->create();
        $order_data['addtime']=time();
        $order_data['meb_id']=$meb_id;
        $order_data['order_sn']='sn_'.uniqid();
        $order_id=$order_model->add($order_data);
        /*
         * 入库订单与商品关系表
         */
        //获取购物车里的数据
        $cart_model=D('cart');
        $cartlist=$cart_model->cartList();
        //入库订单与商品关系表
        foreach($cartlist as $v){
            M('order_goods')->add(array(
                'order_id'=>$order_id,
                'goods_id'=>$v['goods_id'],
                'goods_name'=>$v['info']['goods_name'],
                'goods_attr_id'=>$v['goods_attr_id'],
                'shop_price'=>$v['info']['shop_price'],
                'goods_nums'=>$v['goods_nums']
            ));
        }
        $cart_model->clearCart();
        $this->redirect('Order/done',array('order_sn'=>$order_data['order_sn'],'goods_amount'=>$order_data['goods_amount']));
    }
    /*
     * 显示提交的订单页面
     */
    public function done(){
        $order_data=I('get.');
        //p($order_data);
        $this->assign('orde_data',$order_data);

        //p($payed);
        $this->display();
    }
}