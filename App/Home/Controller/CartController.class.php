<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/29
 * Time: 11:45
 */
namespace Home\Controller;
use Think\Controller;
class CartController extends BaseController{
    /*
     * 添加到购物车
     */
    public function addCart(){
        //获取提交的商品id,商品属性id以及商品数量
        $good_id=I('post.goods_id');
        $good_nums=I('post.good_nums');
        $attr_id=I('post.attr');
        //定义一个空字符串
        $good_attr_id='';
        //将商品属性数组转成字符串
        if($attr_id){
            $good_attr_id=implode(',',$attr_id);
        }
        $cart_model=D('Cart');
        //添加到购物车表的操作
        $cart_model->addCart($good_id,$good_attr_id,$good_nums);
        $this->success('添加购物车成功',U('Cart/cartList'),1);
    }
    /*
     * 显示购物车
     */
    public function cartlist(){
        $cart_model=D('cart');
        //获取购物车表中的所有数据
        $cart_list=$cart_model->cartList();
        $this->assign('cart_list',$cart_list);
        $this->display();
    }
    /*
     * 删除购物车中的商品
     * @param $goods_id 商品的id
     * @param $goods_attr_id array 商品的属性id
     */
    public function delCart($goods_id,$goods_attr_id){
        $goods_id=(int)$goods_id;
        $cart_model=D('Cart');
        //删除操作
        $cart_model->delCart($goods_id,$goods_attr_id);
        $this->redirect('Cart/cartlist');
        //$this->success('删除购物车成功',U('cartlist'),0);
    }
    /*
     * 购物车的修改
     * @param $goods_id 商品的id
     * @param $goods_attr_id array 商品的属性id
     * @param $goods_nums 商品添加的数量，默认为1
     */
    public function updateCart($goods_id,$goods_attr_id,$p=0,$goods_nums=1){
        $goods_id=(int)$goods_id;
        $cartmodel=D('Cart');
        //修改操作
        $cartmodel->updateCart($goods_id,$goods_attr_id,$p,$goods_nums);
        echo 'ok';  //执行完毕返回ok
    }
    /*
     * 清空购物车
     */
    public function clearCart(){
        //判断是否登录
        $meb_id = $_SESSION['meb_id'];
        if(!empty($meb_id)){
            //删除数据库里面的数据
            $this->where("meb_id=$meb_id")->delete();
        }else{
            //清空cookie
            setcookie('cart','',time()-1,'/');
        }
    }
}