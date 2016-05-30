<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/28
 * Time: 1:09
 */
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class MemberController extends BaseController{
    public function login(){
        if(IS_POST){
            $verify=new Verify();
            $code=I('code');
            if(!$verify->check($code)){
                $this->error('验证码错误',U('Member/login'),1);
            }
            $mdoel=D('Member');
            $data=$mdoel->create();
            if(empty($data)) {
                $this->error($mdoel->getError());
            }
            $i=$mdoel->where(array('meb_name'=>$data['meb_name']))->find();
            if(!$i){
                $this->error('用户名不存在',U('Member/login'),1);
            }
            $pwd=md5($data['password'].$data['meb_name']);
            if($pwd!=$i['password']){
                $this->error('密码错误',U('Member/login'),1);
            }
            if(!empty($_SESSION['return url'])){
                $url=$_SESSION['return url'];
            }else{
                $url='Index/index';
            }
            session('meb_id',$i['id']);
            session('member',$data['meb_name']);
            $cartmodel=D('Cart');
            $cartmodel->cookie2db();
            $this->success('登录成功',U($url),1);
            exit;
        }
        $this->display();
    }
    public function register(){
        if(IS_POST){
            if(empty($_POST['treaty'])){
                $this->error('没有同意服务协议，添加失败!',U('Member/register'),1);
            }
            $verify=new Verify();
            $code=I('code');
            if(!$verify->check($code)){
                $this->error('验证码错误',U('Member/register'),1);
            }
            $mdoel=D('Member');
            $data=$mdoel->create();
            if(empty($data)) {
                $this->error($mdoel->getError());
            }
            $data['password']=md5($data['meb_name'].$data['password']);
            $data['add_time']=time();
            if($mdoel->add($data)){
                $this->success('添加成功',U('Member/login'),1);
                exit;
            }
            else{
                $error=$mdoel->getError();
                if(empty($error))
                    $error='添加失败';
                $this->error($error,U('Member/register'),1);
            }
        }
        $this->display();
    }
    public function outlogin(){
        session(null);
        $this->redirect('login',array(),1,'退出成功');
    }
    public function Verify(){
        $config =	array(
            'fontSize'  =>  15,              // 验证码字体大小(px)
            'imageH'    =>  32,               // 验证码图片高度
            'imageW'    =>  120,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        $verify=new Verify($config);
        $verify->entry();
    }
}