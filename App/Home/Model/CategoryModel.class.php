<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/27
 * Time: 16:18
 */
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model{
    /*
     * 获取左导航栏信息
     */
    public function getNav(){
        $cat_model=M('Category');
        $cat_one=$cat_model->field('cat_id,cat_name,parent_id')->where(array('grade'=>0,'is_show'=>1))->order('sort_order')->limit(8)->select();
        $cat_two=$cat_model->field('cat_id,cat_name,parent_id')->where(array('grade'=>1,'is_show'=>1))->order('sort_order')->select();
        $cat_three=$cat_model->field('cat_id,cat_name,parent_id')->where(array('grade'=>2,'is_show'=>1))->order('sort_order')->select();
        return array('cat_one'=>$cat_one,'cat_two'=>$cat_two,'cat_three'=>$cat_three);
    }
    /*
     * 生成反树型结构
     */
    private function _breadcrumb($list,$cat_id){
        static $arr=array();
        foreach($list as $v){
            if($v['cat_id']==$cat_id){
                $arr[]=$v;
                $this->_breadcrumb($list,$v['parent_id']);
            }
        }
        return $arr;
    }
    /*
     * 生成面包屑的树型结构
     */
    public function breadcrumb($cat_id){
        $list=$this->select();
        return array_reverse($this->_breadcrumb($list,$cat_id));
    }
    /*
     * 获取左边商品分类的导航
     */
    public function getLeftNav($id){
        $cat_model=M('category');
        $cat_parent=$cat_model->field('cat_id,cat_name,parent_id')->where(array('cat_id'=>$id))->find();
        $cat_child=$cat_model->field('cat_id,cat_name')->where(array('parent_id'=>$cat_parent['parent_id'],'is_show'=>1))->select();
        return array('cat_parent'=>$cat_parent,'cat_child'=>$cat_child);
    }
}