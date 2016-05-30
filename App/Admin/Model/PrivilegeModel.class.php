<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/23
 * Time: 17:09
 */
namespace Admin\Model;
use Think\Model;
class PrivilegeModel extends Model{
    protected $_validate=array(
        array('priv_name','require','权限名称不能为空',1,'',3),
        array('priv_name','','权限名称已存在',1,'unique',1),
    );
    /*
     * 生成树结构
     * @param $list 数组用来生成树结构的数据
     * @param $parentid 开始的父级id
     * @param $deep 节点所在的深度
     */
    private function createTree($list,$parentid=0,$deep=0){
        static $tree=array();   //静态空数组
        foreach ($list as $rows){
            if($rows['parent_pid']==$parentid){
                $rows['deep']=$deep;    //当前节点所在的深度
                $tree[]=$rows;
                //通过递归获取子节点
                $this->createTree($list, $rows['id'], $deep+1);
            }
        }
        return $tree;
    }
    /*
     * 获取树结构
     */
    public function getCategoryTree($parentid=0){
        $list=M('privilege')->select();
        return $this->createTree($list,$parentid);
    }
    //生成分类树（只有cat_id,cat_name）
    public function getIdAndNameTree($parentid=0){
        $list=M('privilege')->field('id,priv_name,parent_pid')->select();
        return $this->createTree($list,$parentid);
    }
    //获取当前子节点id
    public function getChild($id){
        $list=$this->select();
        return $this->__getChild($list,$id);
    }
    //生成当前子节点id
    private function __getChild($list,$id){
        static $id_tree=array();
        foreach ($list as $rows){
            if($rows['parent_pid']==$id){
                $id_tree[]=$rows['id'];
                $this->createTree($list, $rows['id']);
            }
        }
        $id_tree[]=$id;
        return $id_tree;
    }

}