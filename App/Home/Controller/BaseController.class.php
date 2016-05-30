<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/28
 * Time: 16:27
 */
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function _initialize(){
        //获取登录用户
        $this->getMember();
        //显示购物车中的商品数量和总金额
        $this->getCartTotal();
        //获取导航信息
        $this->getNavigation();
        $this->getNav();
    }
    /*
     * 登录用户
     */
    protected function getMember(){
        $member=$_SESSION['member'];
        $this->assign('member',$member);
    }
    /*
     * 显示购物车中的商品数量和总金额
     */
    protected function getCartTotal(){
        $Carttotal_model=D('Home/cart');
        $Carttotal_data=$Carttotal_model->getCartTotal();
        $this->assign('total',$Carttotal_data);
    }
    /*
    * 取出左导航栏的信息
    */
    protected function getNavigation(){
        //配置mamache信息
        S(array(
            'type'=>'memcache',
            'host'=>'localhost',
            'port'=>'11211'
        ));
        $cat=S('cat');  //获取缓存里的数据
        //判断是否有缓存数据
        if(empty($cat)){
            //如果没有缓存数据，就到数据库中取数据
            $cat_model=D('Home/Category');
            $cat=$cat_model->getNav();
            S('cat',$cat,3600*24);
        }
        $this->assign('cat_one',$cat['cat_one']);
        $this->assign('cat_two',$cat['cat_two']);
        $this->assign('cat_three',$cat['cat_three']);
    }
    /*
     * 取出商品列表、详情页面中的商品分类信息
     */
    protected function getLeftNav($id){
        //左边商品分类导航
        $cat_left=D('category')->getLeftNav($id);
        $this->assign('cat_parent',$cat_left['cat_parent']);
        $this->assign('cat_child',$cat_left['cat_child']);
    }
    /*
     * 面包屑
     */
    protected function getbreadcrumb($id){
        $catModel=D('Home/Category');
        $breadcrumb=$catModel->breadcrumb($id);
        $this->assign('breadcrumb',$breadcrumb);
    }
    /*
     *获取浏览过的商品
     */
    protected function getBrowse(){
        $meb_id=$_SESSION['meb_id'];
        if($meb_id){
            $goods_id=M('meb_browse')->field('goods_id')->where(array('meb_id'=>$meb_id))->order('browse_time desc')->limit(3)->select();
            $gid=array();
            foreach($goods_id as $v){
                $gid[]=$v['goods_id'];
            }
            $gid=array('in',$gid);
            $goods=M('goods')->where(array('id'=>$gid))->select();
            $this->assign('Browse',$goods);
        }
    }
    /*
     * 获取热卖商品
     */
    protected function getBestGoods(){
        //显示特卖推荐商品
        $goods_model=D('Home/Goods');
        $best_good=$goods_model->getBestGoods(3);    //推荐商品
        $this->assign('best_good',$best_good);
    }
    /*
     *获取中间导航
     */
    protected function getNav(){
        $nav_model=M('Nav');
        $middle_nav=$nav_model->where(array('location'=>'middle'))->order('nav_order')->select();
        $this->assign('middle_nav',$middle_nav);
    }


}