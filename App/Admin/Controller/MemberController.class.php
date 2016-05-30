<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/25
 * Time: 10:47
 */
namespace Admin\Controller;
use Think\Controller;
class MemberController extends BaseController{
    public function getlist(){
        $this->display();
    }
    public function add(){
        //获取注册项
        $reg_model=D('register');
        $reg_list=$reg_model->where(array('reg_display'=>1))->select();
        $this->assign('reg_list',$reg_list);
        //获取会员等级
        $grade_model=D('grade');
        $grade_list=$grade_model->field('id,gd_name,special')->select();
        $this->assign('grade_list',$grade_list);
        $this->display();
    }
}