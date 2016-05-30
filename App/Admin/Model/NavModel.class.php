<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/12/4
 * Time: 18:09
 */
namespace Admin\Model;
use Think\Model;
class NavModel extends Model{
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
            if($rows['nav_pid']==$parentid){
                $rows['deep']=$deep;    //设置当前记录的深度
                $tree[]=$rows;
                //通过递归查找子级
                $this->createTree($list, $rows['nav_id'], $deep+1);
            }
        }
        return $tree;   //返回树结构
    }
    /*
     * 生成树
     * @param $parentid 开始生成树结构的父级id
     */
    public function getCategoryTree($parentid=0,$nav_pid){
        //获取所有分类的值
        if(!$nav_pid){
            $list=M('nav')->where(array('is_show'=>1,'nav_pid'=>0))->select();
        }else{
            $list=M('nav')->where(array('is_show'=>1))->select();
        }
        //调用方法获取树结构并返回
        return $this->createTree($list,$parentid);
    }
}