<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/20
 * Time: 11:06
 */
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends BaseController{
    /*
     * 商品显示页面
     */
    public function getlist(){
        $model=D('goods');
        //获取商品表中没有被回收的商品信息
        $list=$model->field('id,goods_name,goods_sn,shop_price,goods_number,is_best,is_on_sale,is_hot,is_new')->where(array('is_del'=>0))->select();
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 商品添加页面及操作
     */
    public function add(){
        $model=D('Goods');
        if(IS_POST){
            $data=$model->create();     //获取提交的数据
            //判断是否获取到提交的数据
            if(!$data){
                $this->error($model->getError());
            }
            //执行添加商品的操作
            if($model->add($data))
                $this->success('添加成功',U('Goods/getlist'),1);
            else
                $this->error('添加失败',U('Goods/add'),1);
            exit;
        }
        //显示分类
        $cat_model=D('Category');
        $cat_list=$cat_model->getIdAndNameTree();   //将分类生成树结构
        $this->assign('cat_list',$cat_list);
        //显示品牌
        $brand_model=D('Brand');
        $brand_list=$brand_model->field('brand_id,brand_name')->where(array('is_show'=>1))->select();
        $this->assign('brand_list',$brand_list);
        //显示商品类型
        $type_model=D('goodstype');
        $type_list=$type_model->where(array('status'=>1))->select();
        $this->assign('type_list',$type_list);
        $this->display();
    }
    /*
     * 获取选择的商品类型的属性
     */
    public function showAtrr(){
        $id=(int)$_POST['id'];
        //获取到该类型下所有的属性
        $attrdata=D('attribute')->where(array('type_id'=>$id))->select();
        $this->assign('attrdata',$attrdata);
        $this->display();
    }
    /*
     *商品回收操作
     * @param $id 要回收的商品id
     */
    public function del($id){
        $id=(int)$id;
        $model=D('Goods');
        $data['id']=$id;    //将要回收商品的id存在$data数组中
        $data['is_del']=1;  //字段is_del是用来判断是否回收 0表示没有被回收，1表示被回收
        //修改商品中is_del字段
        if($model->save($data))
            $this->success('删除成功',U('Goods/getlist'),1);
        else
            $this->error('删除失败',U('Goods/getlist'),1);
        exit;
    }
    /*
     * 添加库存
     */
    public function product($id){
        $id=(int)$id;
        $goods_model=D('goods');
        $pro_model=M('product');
        if(IS_POST){
            $goods_id=I('post.goods_id');
            $goods_attr=I('post.attr');
            $product_nums=I('post.goods_nums');
            //p($goods_attr);
            $i=$pro_model->where(array('goods_id'=>$goods_id))->select();
            if($i){
                $pro_model->where(array('goods_id'=>$goods_id))->delete();
            }
            //p($goods_attr);
            $pn='';
            foreach($product_nums as $k=>$v){
                $a=array();
                foreach($goods_attr as $k1=>$v1){
                    $a[]=$v1[$k];
                }
                $str=implode(',',$a);
                $pro_model->add(array(
                    'goods_id'=>$goods_id,
                    'goods_attr_id'=>$str,
                    'goods_nums'=>$v,
                ));

                $pn+=$v;
            }
            $goods_model->where(array('goods_id'=>$goods_id))->setField('goods_number',$pn);
            $this->success('添加库存成功',U('Goods/getlist'),1);
            exit;
        }
        //获取商品的信息
        $goods_info=$goods_model->field('id,goods_name,goods_sn')->where(array('id'=>$id))->find();
        $this->assign('goods_info',$goods_info);
        //获取商品的属性
        $goods_data=$goods_model->getRadio($id);
        $goods_list=array();
        foreach($goods_data as $v){
            $goods_list[$v['attr_id']][]=$v;
        }
        $this->assign('goods_list',$goods_list);
        //获取商品的库存
        $pro_data=$pro_model->where(array('goods_id'=>$id))->select();
        $this->assign('pro_data',$pro_data);
        //p($goods_list);
        $this->display();
    }
}
