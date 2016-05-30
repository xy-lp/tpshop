<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/23
 * Time: 14:11
 */
namespace Admin\Controller;
use Model\PrivilegeModel;
use Model\RoleModel;
use Think\Controller;
class RoleController extends BaseController{
    public function getlist(){
        $model=new RoleModel();
        $list=$model->field('a.*,group_concat(c.priv_name) priv_list')->join("a left join tp_role_priv b on a.id=b.role_id left join tp_privilege c on c.id=b.priv_id")->group("a.id")->select();
        $this->assign('list',$list);
        $this->display();
    }
    public function add(){
        $model=new RoleModel();
        $priv_model=new PrivilegeModel();
        if(IS_POST){
            $data=$model->create();
            $i=$model->where(array('role_name'=>$data['role_name']))->find();
            if($i){
                $this->error('该角色名已存在，请重新输入',U('Role/add'),1);
            }
            if($model->add($data))
                $this->success('添加成功',U('Role/getlist'),1);
            else
                $this->error('添加失败',U('Role/add'),1);
            exit;
        }
        $list=$priv_model->field('id,priv_name,parent_pid,priv_level')->where(array('priv_level'=>0))->select();
        $info=$priv_model->field('id,priv_name,parent_pid,priv_level')->where(array('priv_level'=>1))->select();
        $child=$priv_model->field('id,priv_name,parent_pid,priv_level')->where(array('priv_level'=>2))->select();
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->assign('child',$child);
        $this->display();
    }
    public function del($id){
        $id=(int)$id;
        $model=new RoleModel();
        if($model->delete($id))
            $this->success('删除成功',U('Role/getlist'),1);
        else{
            $error=$model->getError();
            if(empty($error)){
                $error='删除失败';
            }
            $this->error($error);
        }
        exit;
    }
    public function edit($id){
        $id=(int)$id;
        $model=new RoleModel();
        if(IS_POST){
            $data=$model->create();
            if($model->save($data))
                $this->success('修改成功',U('Role/getlist'),1);
            else
                $this->error('修改失败',U('Role/edit',array('id'=>$data['id'])),1);
            exit;
        }
        $role=$model->where(array('id'=>$id))->find();
        $this->assign('role',$role);
        $this->display();
    }
    public function privlist($id){
        $id=(int)$id;
        $priv_model=new PrivilegeModel();
        $rp_model=M('role_priv');
        if(IS_POST){
            $role_id=I('post.id');
            $rp_model->where(array('role_id'=>$role_id))->delete();
            $priv_id=I('post.action_code');
            foreach($priv_id as $v){
                if(is_array($v)){
                    foreach($v as $v1)
                        M('role_priv')->add(array(
                            'role_id'=>$role_id,
                            'priv_id'=>$v1
                        ));
                }else{
                    M('role_priv')->add(array(
                        'role_id'=>$role_id,
                        'priv_id'=>$v
                    ));
                }
            }
            $this->success('更新成功',U('Role/getlist'),1);
            exit;
        }
        $role_lst=$rp_model->where(array('role_id'=>$id))->select();
        foreach($role_lst as $v){
            $rp[]=$v;
        }
        $list=$priv_model->field('id,priv_name,parent_pid,priv_level')->where(array('priv_level'=>0))->select();
        $info=$priv_model->field('id,priv_name,parent_pid,priv_level')->where(array('priv_level'=>1))->select();
        $child=$priv_model->field('id,priv_name,parent_pid,priv_level')->where(array('priv_level'=>2))->select();
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->assign('child',$child);
        $this->assign('rp',$rp);
        $this->assign('id',$id);
        $this->display();
    }
}