<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        /*
         * 取出热卖、推荐和新品前四条信息
         */
        $goods_model=D('Home/Goods');
        $best_good=$goods_model->getBestGoods(4);    //推荐商品
        $hot_good=$goods_model->getHotGoods(4);      //热卖商品
        $new_good=$goods_model->getNewGoods(4);      //新品
        $this->assign('best_good',$best_good);
        $this->assign('hot_good',$hot_good);
        $this->assign('new_good',$new_good);

        $this->display();
    }
    /*
     * 商品展示页
     */
    public function goodslist($id){
        $id=(int)$id;
        $goods_list=D('goods')->field('id,goods_name,shop_price,image_thumb')->order('id desc')->where(array('cat_id'=>$id))->select();
        $this->assign('goods_list',$goods_list);
        //获取面包屑
        $this->getbreadcrumb($id);
        //左边商品分类导航
        $this->getLeftNav($id);
        //显示特卖推荐商品
        $this->getBestGoods();
        //显示浏览过的商品
        $this->getBrowse();
        $this->display();
    }
    /*
     * 商品详情页
     */
    public function good($id){
        $id=(int)$id;
        $good_model=D('goods');
        $good=$good_model->where(array('id'=>$id,'is_del'=>0))->find();
        //如果没有商品，则跳转到首页
        if(empty($good)){
            //跳转到首页
            echo <<<jump
        <script type="text/javascript">
                alert('该商品已下架');
       </script>
jump;
            $this->redirect('index');
            exit;
        }
        $this->assign('good',$good);
        //获取商品的属性
        $radiodata=$good_model->getGoodAttr($id);
        $this->assign('radiodata',$radiodata['radiodata']);
        $this->assign('onedata',$radiodata['onedata']);
        //获取商品相册
        $album=M('goods_album')->where(array('goods_id'=>$id))->select();
        $this->assign('album',$album);
        //面包屑导航
        $this->getbreadcrumb($id);
        //左边商品分类导航
        $this->getLeftNav($id);
        //显示特卖推荐商品
        $this->getBestGoods();
        //显示浏览过的商品
        $this->getBrowse();
        //添加到用户浏览的表中
        $good_model->getBrowseGoods($good['id']);
        $this->display();
    }
}