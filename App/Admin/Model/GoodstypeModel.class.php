<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/19
 * Time: 18:35
 */
namespace Admin\Model;
use Think\Model;
use Think\Page;
class GoodstypeModel extends Model{
    protected $_validate=array(
        array('type_name','require','商品类型名称不能为空',1,'',3),
        array('type_name','','商品类型名称已存在',1,'unique',1)
    );
    protected $insertFields=array('type_name','status');
    protected $updateFields = array('type_name','status');
}