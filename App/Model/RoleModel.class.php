<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/23
 * Time: 19:06
 */
namespace Model;
use Think\Model;
class RoleModel extends Model{
    protected function _after_insert($data,$options){
        $role_id=$data['id'];
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
    }
    protected function _before_delete(&$data,$options){
        $id=$data['where']['id'];
        if(M('role_priv')->where(array('role_id'=>$id))->delete())
            return true;
        else
            $this->error('权限删除失败');
            return false;

    }
}