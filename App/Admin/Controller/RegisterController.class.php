<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/25
 * Time: 1:14
 */
namespace Admin\Controller;
use Think\Controller;
class RegisterController extends BaseController{
    public function getlist(){
        $list=M('register')->select();
        $this->assign('list',$list);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $model=M('register');
            if($data=$model->create()){
                $i=$model->where(array('reg_name'=>$data['reg_name']))->find();
                if($i){
                    $this->error('添加失败，该注册项已存在',U('Register/add'),1);
                }
                if($model->add($data))
                    $this->success('添加成功',U('Register/getlist'),1);
                else
                    $this->error('添加失败',U('Register/add'),1);
                exit;
            }else{
                $this->error($model->getError());
            }
        }
        $this->display();
    }
    public function del($id){
        $id=(int)$id;
        if(M('register')->delete($id))
            $this->success('删除成功',U('Register/getlist'),1);
        else
            $this->error('删除失败',U('Register/getlist'),1);
        exit;
    }
    public function edit($id){
        $id=(int)$id;
        $model=M('register');
        if(IS_POST){
            if($data=$model->create()){
                if($model->save($data))
                    $this->success('修改成功',U('Register/getlist'),1);
                else
                    $this->error('修改失败',U('Register/edit',array('id'=>$id)),1);
                exit;
            }else{
                $this->error($model->getError());
            }
        }
        $list=$model->where(array('id'=>$id))->find();
        $this->assign('list',$list);
        $this->display();
    }
}