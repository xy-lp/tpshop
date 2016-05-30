<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/27
 * Time: 17:49
 */
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model{
    /*
     * 获取推荐商品
     */
    public function getBestGoods($limit){
        $best_goods=$this->field('id,goods_name,shop_price,image_thumb')->order('id desc')->where(array('is_on_sale'=>1,'is_best'=>1,'is_del'=>0))->limit($limit)->select();
        return $best_goods;
    }
    /*
     * 获取热卖商品
     */
    public function getHotGoods($limit){
        $hot_goods=$this->field('id,goods_name,shop_price,image_thumb')->order('id desc')->where(array('is_on_sale'=>1,'is_hot'=>1,'is_del'=>0))->limit($limit)->select();
        return $hot_goods;
    }
    /*
     * 获取新品
     */
    public function getNewGoods($limit){
        $new_goods=$this->field('id,goods_name,shop_price,image_thumb')->order('id desc')->where(array('is_on_sale'=>1,'is_new'=>1,'is_del'=>0))->limit($limit)->select();
        return $new_goods;
    }
    /*
     * 获取商品的属性
     */
    public function getGoodAttr($id){
        $sql="select a.id,a.attr_id,a.attr_value,b.att_name,b.att_type from tp_goods_attr a left join tp_attribute b on a.attr_id=b.id where a.goods_id=$id";
        $attrdata=$this->query($sql);
        $radiodata=array();
        $onedata=array();
        foreach($attrdata as $v){
            if($v['att_type']==1){
                $radiodata[$v['attr_id']][]=$v;
            }
            if($v['att_type']==0){
                $onedata[]=$v;
            }
        }
        return array('radiodata'=>$radiodata,'onedata'=>$onedata);
    }
    /*
     * 用户历史浏览的商品
     */
    public function getBrowseGoods($good_id){
        $meb_id=$_SESSION['meb_id'];
        $browse=D('meb_browse');
        if($meb_id){
            $info=$browse->where(array('meb_id'=>$meb_id,'goods_id'=>$good_id))->find();
            if($info){
                $browse->where(array('meb_id'=>$meb_id,'goods_id'=>$good_id))->setField('browse_time',time());
            }else{
                $browse->add(array(
                    'meb_id'=>$meb_id,
                    'goods_id'=>$good_id,
                    'browse_time'=>time(),
                ));
            }
        }/*else{
            $bro_goods=isset($_COOKIE['browse'])?unserialize($_COOKIE['browse']):array();
            $bro_key=$meb_id.'-'.$good['id'];
            $bro_goods[$bro_key]=time();
            setcookie('browse',serialize($bro_goods),time()+3600*24,'/');
        }*/
    }
}