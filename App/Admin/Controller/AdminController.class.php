<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/10/31
 * Time: 17:29
 */
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController{
    public function index(){
        $this->display();
    }
    public function top(){
        $this->display();
    }
    public function menu(){
        $role_id=$_SESSION['role_id'];  //获取会话中的角色id
        $model=M('privilege');
        //如果角色id为-1,则该用户是超级管理员
        if($role_id!=-1){
            //获取所有通过角色id获取对应的权限
            $priv_id=M('role_priv')->where(array('role_id'=>$role_id))->select();
            $priv_arr=array();
            //通过循环，获得权限id组成的一维数组
            foreach($priv_id as $v){
                $priv_arr[]=$v['priv_id'];
            }
            $priv_id=array('in',$priv_arr);
            //通过权限id,获取顶级栏目
            $list=$model->field('id,priv_name')->where(array('id'=>$priv_id,'priv_level'=>0))->select();
            //通过权限id,获取二级栏目
            $child=$model->where(array('id'=>$priv_id,'priv_level'=>1))->select();
        }else{
            //超级管理员，拥有所有的权限
            $list=$model->field('id,priv_name')->where(array('priv_level'=>0))->select();
            $child=$model->where(array('priv_level'=>1))->select();
        }
        $this->assign('list',$list);
        $this->assign('child',$child);
        $this->display();
    }
    public function drag(){
        $this->display();
    }
    public function main(){
        $this->display();
    }
}