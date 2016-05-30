<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/8
 * Time: 0:47
 */
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function __construct(){
        parent::__construct();
        $this->checkLogin();
        $this->checkRole();
    }
    private function checkLogin(){
        $user=session('user');
        $i=M('admin_user')->where(array('user_name'=>$user))->find();
        if(!$i){
            $this->redirect('Login/login',array(),1,'你还没登录，请先登录');
        }
    }
    private function checkRole(){
        $user=session('user');
        $i=M('admin_user')->where(array('user_name'=>$user))->find();
        //$role_id=$i['role_id'];

    }

}