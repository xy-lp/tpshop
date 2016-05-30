<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/26
 * Time: 13:00
 */
namespace Admin\Model;
use Think\Model;
class AttributeModel extends Model{
    protected $_validate=array(
        array('att_name','require',1,'',3),
        //array('att_name','',1,'unique',1)
    );
    public function showAttr($id){
        //判断
        if($id==0)
            $where=1;
        else
            $where='type_id='.$id;
        $list=M('attribute')->where($where)->field('a.*,b.type_name')->join("a left join tp_goodstype b on a.type_id=b.id")->select();
        return $list;
    }
}