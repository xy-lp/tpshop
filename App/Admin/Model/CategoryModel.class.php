<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/19
 * Time: 23:46
 */
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    /*
     * 自动验证
     */
    protected $_validate=array(
        //在新增数据是，判断品牌是否为空，或已存在
        array('cat_name','require','分类名称不能为空!',1,'',3),
        //array('cat_name','','分类名称已存在!',1,'unique',1),
    );
    /*
     * 生成树结构
     * @param   $list 需要生成树结构的数据
     * @param   $parentid   数据中生成树结构的起点（父类id）
     * @param   $deep   深度，在显示数据用来缩进
     */
    private function createTree($list,$parentid=0,$deep=0){
        static $tree=array();   //定义一个静态的空数组
        //循环，获取需要的数据
        foreach ($list as $rows){
            if($rows['parent_id']==$parentid){
                $rows['deep']=$deep;    //设置当前记录的深度
                $tree[]=$rows;
                //通过递归查找子级
                $this->createTree($list, $rows['cat_id'], $deep+1);
            }
        }
        return $tree;   //返回树结构
    }
    /*
     * 生成树
     * @param $parentid 开始生成树结构的父级id
     */
    public function getCategoryTree($parentid=0){
        //获取所有分类的值
        $list=M('category')->select();
        //调用方法获取树结构并返回
        return $this->createTree($list,$parentid);
    }
    /*
     * 生成分类树（只有cat_id,cat_name）
     * @param $parentid 开始生成树结构的父级id
     */
    public function getIdAndNameTree($parentid=0){
        //获取需要的分类字段值
        $list=M('category')->field('cat_id,cat_name,parent_id')->select();
        //调用方法获取树结构并返回
        return $this->createTree($list,$parentid);
    }
    /*
     * 获取当前子节点id
     * @param $id 当前节点id
     */
    public function getChild($id){
        //获取所有分类的值
        $list=$this->select();
        //调用方法获取子节点树结构并返回
        return $this->__getChild($list,$id);
    }
    /*
     * 生成当前子节点id的树结构
     * @param $list 所需要生成树结构的数据
     * @param $id 当前节点id
     */
    private function __getChild($list,$id){
        static $id_tree=array();    //定义一个静态的空数组
        //循环，获取需要的数据
        foreach ($list as $rows){
            if($rows['parent_id']==$id){
                $id_tree[]=$rows['cat_id'];
                //通过递归查找子级
                $this->createTree($list, $rows['cat_id']);
            }
        }
        $id_tree[]=$id;     //将子节点的id也放进数组中
        return $id_tree;
    }
    //获取导航栏
    public function getNav(){
        $cat_model=M('Category');
        $cat_one=$cat_model->field('cat_id,cat_name,parent_id')->where(array('grade'=>0,'is_show'=>1))->order('sort_order')->limit(8)->select();
        $cat_two=$cat_model->field('cat_id,cat_name,parent_id')->where(array('grade'=>1,'is_show'=>1))->order('sort_order')->select();
        $cat_three=$cat_model->field('cat_id,cat_name,parent_id')->where(array('grade'=>2,'is_show'=>1))->order('sort_order')->select();
        return array('cat_one'=>$cat_one,'cat_two'=>$cat_two,'cat_three'=>$cat_three);
    }
}