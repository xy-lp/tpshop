<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/19
 * Time: 13:54
 */
namespace Admin\Controller;
use Think\Controller;
class AttributeController extends BaseController{
    /*
     * 商品属性显示页面
     * @param $id 商品类型id,用来获取其属性
     */
    public function getlist($id){
        $id=(int)$id;   //防sql注入
        $model=D('attribute');
        //传递id,获取该类型的属性
        $list=$model->showAttr($id);
        //获取商品类型记录
        $info=M('goodstype')->select();
        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->assign('id',$id);
        $this->display();
    }
    /*
     * 商品类型添加页面及操作
     */
    public function add(){
        if(IS_POST){
            $model=M('attribute');
            $data=$model->create();     //获取提交的数据
            //判断在该类型中是否已存在这属性
            $i=$model->where(array('att_name'=>$data['att_name'],'type_id'=>$data['type_id']))->find();
            if($i ||$data['type_id']==0)
                $this->error('添加失败，该类型中已经存在此属性',U('Attribute/add'),1);
            //商品属性添加操作
            if($model->add($data))
                $this->success('添加成功',U('Attribute/getlist',array('id'=>$data['type_id'])),1);
            else
                $this->error('添加失败，该类型中已经存在此属性',U('Attribute/add'),1);
            exit;
        }
        $type_id=I('get.id');   //获得该属性所属类型的id
        //获取所有商品类型
        $info=D('goodstype')->select();
        $this->assign('info',$info);
        $this->assign('type_id',$type_id);
        $this->display();
    }
    /*
     * 商品属性删除操作
     * @param $id 要删除记录的id
     * @param $type_id  该商品属性所属的类型id
     */
    public function del($id,$type_id){
        $id=(int)$id;
        //商品属性删除操作
        if(M('attribute')->delete($id))
            $this->success('删除成功',U('attribute/getlist',array('id'=>$type_id)),1);
        else
            $this->error('删除失败',U('attribute/getlist',array('id'=>$type_id)),1);
        exit;
    }
    /*
     * 商品属性修改页面及操作
     * @param $id 要操作记录的id
     */
    public function edit($id){
        $id=(int)$id;       //防sql注入
        $model=D('attribute');
        if(IS_POST){
            $data=$model->create();     //获取提交的数据
            //判断录入方式，如果录入方式不是列表选择，则清空可选列表的值
            if($data['att_input_type']!=1)
                $data['att_input_val']='';
            //执行修改操作
            if($model->save($data))
                $this->success('修改成功',U('attribute/getlist',array('id'=>$data['type_id'])),1);
            else
                $this->error('修改失败',U('attribute/edit',array('id'=>$data['id'])),1);
            exit;
        }
        //获取修改的那条记录
        $list=$model->where(array('id'=>$id))->find();
        //获取到所有的类型
        $info=M('goodstype')->select();
        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->display();
    }
}