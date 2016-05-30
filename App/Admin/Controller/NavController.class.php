<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/12/4
 * Time: 16:54
 */
namespace Admin\Controller;
use Think\Controller;
class NavController extends Controller{
    public function getlist(){
        $model=D('nav');
        $nav_data=$model->getCategoryTree(0,1);
        $this->assign('nav_data',$nav_data);
        //p($nav_data);
        $this->display();
    }
    public function add(){
        $model=D('nav');
        if(IS_POST){
            $data=$model->create();
            if($model->add($data)){
                $this->success('添加成功',U('Nav/getlist'),1);
                exit;
            }else{
                $this->error('添加失败',U('Nav/add'),1);
            }
        }
        $nav_data=$model->getCategoryTree();
        $this->assign('nav_data',$nav_data);
        //p($nav_data);
        $this->display();
    }
    public function del($id){
        $id=(int)$id;
        $model=D('nav');
        $i=$model->where(array('nav_pid'=>$id))->find();
        if($i)
            $this->error('节点下有子节点不能被删除',U('Nav/getlist'),1);
        if($model->delete($id))
            $this->success('删除成功',U('Nav/getlist'),1);
        else
            $this->error('删除失败',U('Nav/getlist'),1);
        exit;
    }
    public function edit($id){
        $id=(int)$id;
        $model=D('nav');
        if(IS_POST){
            $data=$model->create();
            if($data['nav_pid']==$data['nav_id']){
                $this->error('不能为自己的子节点',U('Nav/edit',array('nav_id'=>$data['nav_id'])),1);
            }
            if($model->save($data)){
                $this->success('修改成功',U('Nav/getlist'),1);
                exit;
            }else{
                $this->error('修改失败',U('Nav/edit',array('nav_id'=>$data['nav_id'])),1);
            }
        }
        $nav_info=$model->where(array('nav_id'=>$id))->find();
        $nav_data=$model->getCategoryTree();
        //p($nav_info);
        $this->assign('nav_info',$nav_info);
        $this->assign('nav_data',$nav_data);
        $this->display();
    }
}