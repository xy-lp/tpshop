<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/29
 * Time: 14:00
 */
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
    /*
     * 添加商品到购物车
     * @param $good_id int 商品的id
     * @param $good_attr_id array 商品的属性id
     * @param $good_nums int 购买商品的数量
     */
    public function addCart($good_id,$good_attr_id,$good_nums){
        //获取会话中的用户名
        $meb_id=$_SESSION['meb_id'];
        //判断是否登录
        if(!empty($meb_id)){
            //如果登录，判断购物车是否已经存在该商品
            $info=$this->where(array('goods_id'=>$good_id,'goods_attr_id'=>$good_attr_id,'meb_id'=>$meb_id))->select();
            if($info){      //如果商品已存在，则更改商品的数量
                $this->where(array('goods_id'=>$good_id,'goods_attr_id'=>$good_attr_id,'meb_id'=>$meb_id))->setInc('goods_count',$good_nums);
            }else{      //如果商品不存在则添加商品
                $this->add(array(
                    'goods_id'=>$good_id,
                    'goods_attr_id'=>$good_attr_id,
                    'meb_id'=>$meb_id,
                    'goods_nums'=>$good_nums
                ));
            }
        //如果没有登录则将商品写到cookie
        }else{
            //获取cookie中的值
            $cartdata=isset($_COOKIE['cart'])?unserialize($_COOKIE['cart']):array();
            //构造键
            $key=$good_id.'-'.$good_attr_id;
            //判断是否有这个cookie值
            if(empty($cartdata[$key])){
                //不存在就将数量写进数组
                $cartdata[$key]=$good_nums;
            }else{
                //存在，就在原先值的基础上加上数量
                $cartdata[$key]=$cartdata[$key]+$good_nums;
            }
            //完成之后将数组写入cookie中
            setcookie('cart',serialize($cartdata),time()+3600*24,'/');
        }
    }
    /*
     *获取商品的属性名和值
     * @param ￥goods_attr_id array 商品的属性
     */
    public function getAttr($goods_attr_id){
        //如果属性id为空直接返回空
        if(empty($goods_attr_id)){
            return '';
        }
        //在商品、属性的关系表和商品属性表中获取该商品的属性名和相应的属性值
        $sql="select group_concat(concat(b.att_name,':',a.attr_value) separator '<br/>') attrs from tp_goods_attr a left join tp_attribute b on a.attr_id=b.id where a.id in ($goods_attr_id)";
        //执行查询语句
        $data=M()->query($sql);
        return $data[0]['attrs'];
    }
    /*
     * 显示购物车的数据
     */
    public function cartList(){
        //获取保存在会话中用户id
        $meb_id=$_SESSION['meb_id'];

        //判断用户是否登录
        if($meb_id){
            //如果登录了则直接从数据库中提取数据，返回的是二维数组
            $cart_data=$this->where(array('meb_id'=>$meb_id))->select();
        }else{
            //如果没登录则获取cookie中的数据
            $cart=isset($_COOKIE['cart'])?unserialize($_COOKIE['cart']):array();
            if(empty($cart))
                return $cart;
            $cart_data=array();
            foreach($cart as $k=>$v){
                $a=explode('-',$k);
                $cart_data[]=array(
                    'goods_id'=>$a[0],
                    'goods_attr_id'=>$a[1],
                    'goods_nums'=>$v
                );
            }
        }
        $cart_list=array();
        foreach($cart_data as $k=>$v){
            $v['info']=M('goods')->field('goods_name,image_thumb,shop_price')->where(array('id'=>$v['goods_id']))->find();
            $v['attrs']=$this->getAttr($v['goods_attr_id']);
            $cart_list[]=$v;
        }
        return $cart_list;
    }
    /*
     * 获取购物车中的金额和数量
     */
    public function getCartTotal(){
        //取出购物车中所有的数据
        $cart_data=$this->cartList();
        $total_count=0;     //定义一个变量用来保存总的商品数量
        $total_price=0;     //定义一个变量用来保存商品总的金额
        if(!empty($cart_data)){
            //计算总的金额和数量
            foreach($cart_data as $v){
                $total_count+=$v['goods_nums'];
                $total_price+=$v['goods_nums']*$v['info']['shop_price'];
            }
        }
        return array('total_count'=>$total_count,'total_price'=>$total_price);
    }
    /*
     * 当用户登陆后，将保存在cookie中购物车的商品移动到数据库中
     */
    public function cookie2db(){
        //取出保存在cookie中的数据
        $cart_data=isset($_COOKIE['cart'])?unserialize($_COOKIE['cart']):array();
        if($cart_data){
            $meb_id=$_SESSION['meb_id'];
            foreach($cart_data as $k=>$v){
                $a=explode('-',$k);
                $good_id=$a[0];
                $goods_attr_id=$a[1];
                $info=$this->where(array('goods_id'=>$good_id,'goods_attr_id'=>$goods_attr_id,'meb_id'=>$meb_id))->select();
                if($info){
                    $this->where(array('goods_id'=>$good_id,'goods_attr_id'=>$goods_attr_id,'meb_id'=>$meb_id))->setInc('goods_nums',$v);
                }else{
                    $this->add(array(
                        'goods_id'=>$good_id,
                        'goods_attr_id'=>$goods_attr_id,
                        'meb_id'=>$meb_id,
                        'goods_nums'=>$v
                    ));
                }
            }
            setcookie('cart','',time()-1,'/');
        }
    }
    /*
     * 删除操作
     */
    public function delCart($goods_id,$goods_attr_id){
        $meb_id=$_SESSION['meb_id'];
        if($meb_id){
            $this->where(array('goods_id'=>$goods_id,'goods_attr_id'=>$goods_attr_id,'meb_id'=>$meb_id))->delete();
        }else{
            $cart_data=isset($_COOKIE['Cart'])?$_COOKIE['Cart']:array();
            $key=$goods_id.'-'.$goods_attr_id;
            unset($cart_data[$key]);
            setcookie('cart',serialize($cart_data),time()+3600*24,'/');
        }

    }
    /*
     * 修改购物车
     * @param $goods_id 商品的id
     * @param $goods_attr_id 商品的属性id
     * @param $good_nums 商品的更改数量
     */
    public function updateCart($goods_id,$goods_attr_id,$p,$goods_nums){
        $meb_id=$_SESSION['meb_id'];
        if(!empty($meb_id)){
            //已经登录
            if($p==1){
                $this->where(array('goods_id'=>$goods_id,'goods_attr_id'=>$goods_attr_id,'meb_id'=>$meb_id))->setDec('goods_nums',$goods_nums);
            }else{
                $this->where(array('goods_id'=>$goods_id,'goods_attr_id'=>$goods_attr_id,'meb_id'=>$meb_id))->setInc('goods_nums',$goods_nums);
            }

        }else{
            //没有登录则获取cookie购物车的数据
            $cart_data=isset($_COOKIE['cart'])?$_COOKIE['cart']:array();
            //构造键
            $key=$goods_id.'-'.$goods_attr_id;
            if($p==1){
                $cart_data[$key]=$cart_data[$key]-$goods_nums;
            }else{
                $cart_data[$key]=$cart_data[$key]+$goods_nums;
            }
            setcookie('cart',serialize($cart_data),time()+3600*24,'/');
        }
    }
    /*
     * 清空购物车
     */
    public function clearCart(){
        $meb_id=$_SESSION['meb_id'];
        if($meb_id){
            $this->where(array('meb_id'=>$meb_id))->delete();
        }else{
            setcookie('cart','',time()-1,'/');
        }
    }
}