<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/20
 * Time: 9:06
 */
namespace Admin\Controller;
use Think\Controller;
class BrandController extends BaseController{
    /*
     * 商品品牌显示页面
     */
    public function getlist(){
        $model=M('Brand');
        //获取所有商品品牌的信息
        $list=$model->order('sort_order desc')->select();
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 商品品牌添加页面及操作
     */
    public function add(){
        $model=D('brand');
        if(IS_POST){
            $data=$model->create();     //获取提交的数据
            //判断是否获取到数据
            if(!$data)
                $this->error($model->getError());   //没有获取到数据返回错误信息
            //添加商品品牌
            if($model->add($data))
                $this->success('添加成功',U('Brand/getlist'),1);
            else
                $this->error('添加失败',U('Brand/add'),1);
            exit;
        }
        $this->display();
    }
    /*
     * 商品品牌删除操作
     */
    public function del($id){
        $id=(int)$id;
        //执行删除操作
        if(D('brand')->delete($id))
            $this->success('删除成功',U('Brand/getlist'),1);
        else
            $this->error('删除失败',U('Brand/getlist'),1);
        exit;
    }
    /*
     * 商品品牌修改页面及操作
     */
    public function edit($id){
        $id=(int)$id;
        $model=D('brand');
        if(IS_POST){
            //获取提交的数据
            $data=$model->create();
            //修改操作
            if($model->save($data))
                $this->success('修改成功',U('Brand/getlist'),1);
            else{
                $error=$model->getError();  //获取钩子函数返回的错误
                //如果钩子函数没有错误，则设置$error值
                if(empty($error))
                    $error='修改失败';
                $this->error($error,U('Brand/edit',array('id'=>$data['brand_id'])),1);
            }
            exit;
        }
        //获取与id对应的数据
        $i=$model->where(array('brand_id'=>$id))->find();
        $this->assign('i',$i);
        $this->display();
    }
}