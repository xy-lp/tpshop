<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/19
 * Time: 13:25
 */
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends BaseController{
    /*
     * 商品分类显示页面
     */
    public function getlist(){
        $model=D('Category');
        //获取树结构
        $list=$model->getCategoryTree();
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 商品分类添加页面和操作
     */
    public function add(){
        $model=D('Category');
        if(IS_POST){
            $data=$model->create();     //获取提交的数据
            //判断是不是顶级栏目
            if($data[parent_id]==0){
                $data['grade']=0;  //顶级栏目的等级为0
            }else{
                //如果不是顶级栏目，其等级在父级的等级基础上+1
                $parent=$model->field('grade')->where(array('cat_id'=>$data['parent_id']))->find();
                $data['grade']=$parent['grade']+1;
            }
            //添加商品分类操作
            if($model->add($data))
                $this->success('添加成功',U('Category/getlist'),1);
            else
                $this->error('添加失败',U('Category/add'),1);
            exit;
        }
        //获取商品分类的树结构
        $list=$model->getCategoryTree();
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 商品分类删除操作
     * @param $id 要删除的记录id号
     */
    public function del($id){
        $id=(int)$id;   //防sql注入
        $model=D('category');
        //获取该记录的子级
        $i=$model->where(array('parent_id'=>$id))->select();
        //判断是否有子级
        if($i) {
            $this->error('该节点还有子节点，不能被删除', U('Category/getlist'), 1);
        }
        //商品分类删除操作
        if($model->delete($id))
            $this->success('删除成功',U('Category/getlist'),1);
        else
            $this->error('删除失败',U('Category/getlist'),1);
        exit;
    }
    /*
     * 商品分类修改页面及操作
     * @param $id 要修改的记录id号
     */
    public function edit($id){
        $id=(int)$id;   //防sql注入
        $model=D('Category');
        if(IS_POST){
            $data=$model->create();     //获取提交的数据
            //判断父级是否为自己
            if($data['parent_id']==$data['cat_id']){
                $this->error('不能为自身的子级',U('Category/edit',array('id'=>$data['cat_id'])),1);
            }
            //获取所有的子节点
            $sublist=$model->getCategoryTree($data['cat_id']);
            //循环，判断修改节点的父级是否是自己的子级
            foreach ($sublist as $rows){
                if($rows['cat_id']==$data['parent_id'])
                    $this->error('父级不能是自己的子级',U('Category/edit',array('id'=>$data['cat_id'])),1);
            }
            //判断是不是顶级栏目
            if($data[parent_id]==0){
                $data['grade']=0;  //顶级栏目的等级为0
            }else{
                //如果不是顶级栏目，其等级在父级的等级基础上+1
                $parent=$model->field('grade')->where(array('cat_id'=>$data['parent_id']))->find();
                $data['grade']=$parent['grade']+1;
            }
            //商品分类修改操作
            if($model->save($data))
                $this->success('更改成功',U('Category/getlist'),1);
            else
                $this->error('更改失败',U('Category/edit',array('id'=>$data['cat_id'])),1);
            exit;
        }
        //通过id获取相应的记录
        $info=$model->where(array('cat_id'=>$id))->find();
        $list=$model->getCategoryTree();
        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->display();
    }
}