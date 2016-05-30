<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/25
 * Time: 20:22
 */
namespace Admin\Model;
use Think\Model;
class Admin_userModel extends Model{
    protected $_validate=array(
        array('reg_name','require','管理员名称不能为空',1,'',3),
        array('reg_name','','管理员名称已存在',1,'unique',1),
    );
}