<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/21
 * Time: 22:41
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController{
    /*
     * 显示管理员列表
     */
    public function getlist(){
        //获取除了超级管理员外的其他用户
        $user_role=array('neq','-1');
        $list=M('admin_user')->where(array('role_id'=>$user_role))->field('user_id,user_name,email,last_login,last_ip,role_id')->select();
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 添加管理员的页面及操作
     */
    public function add(){
        if(IS_POST){
            $model=D('admin_user');
            $data=$model->create();     //获取提交的数据
            //判断是否获取到数据
            if(empty($data)){
                $this->error($model->getError());
            }
            //生成密码密钥
            $data['salt']=md5(uniqid(rand(), TRUE));
            //生成密码
            $data['password']= md5($data['password'].$data['salt']);
            //添加操作
            if($model->add($data))
                $this->success('添加成功',U('User/getlist'),1);
            else
                $this->error('添加失败',U('User/add'),1);
            exit;
        }
        $list=M('role')->select();  //获取所有的权限
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 删除管理员操作
     */
    public function del($id){
        $id=(int)$id;
        //删除操作
        if(D('admin_user')->delete($id))
            $this->success('删除成功',U('User/getlist'),1);
        else
            $this->error('删除失败',U('User/getlist'),1);
        exit;
    }
    /*
     * 修改管理员的页面及操作
     */
    public function edit($id){
        $id=(int)$id;
        $model=D('admin_user');
        if(IS_POST){
            $data=$model->create();     //获取提交的数据
            if(empty($data)){
                $this->error($model->getError());
            }
            //获取旧密码
            $old_password=I('post.old_password');
            //判断是否有旧密码
            if(empty($old_password)){
                //如果没有旧密码提交，清空新密码
                unset($data['password']);
            }else{
                //获取该用户原先的密钥和密码
                $i=$model->field('password,salt')->where(array('user_name'=>$data['user_name']))->find();
                //加密旧密码
                $old_password=md5($old_password.$i['salt']);
                //判断旧密码是否正确
                if($old_password!=$i['password']){
                    $this->error('修改失败，旧密码错误',U('User/edit',array('user_id'=>$data['user_id'])),1);
                }
                $data['password']= md5($data['password'].$i['salt']);
            }
            //执行修改操作
            if($model->save($data))
                $this->success('修改成功',U('User/getlist'),1);
            else
                $this->error('修改失败',U('User/edit',array('user_id'=>$data['user_id'])),1);
            exit;
        }
        $list=$model->field('user_id,user_name,email,password,role_id')->where(array('user_id'=>$id))->find();
        $info=D('role')->select();
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->display();
    }
}