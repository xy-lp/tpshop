<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/19
 * Time: 11:57
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller{
    //显示登录界面
    public function Login(){
        /*if(isset($_SERVER['HTTP_REFERER']) && substr($_SERVER['HTTP_REFERER'], -3)=='top'){
            $this->display();
            exit;
        }*/
        $name=$_COOKIE['identifier'];
        if(!empty($name)){
            $model=M('admin_user');
            $token=$_COOKIE['$token'];
            $info=$model->where(array('identifier'=>$name,'$token'=>$token))->field('user_name,token,last_setcookie,role_id')->find();
            if($info && $info['last_setcookie']>time()){
                $data['last_login']=time();     //保存用户登录的时间
                $data['last_ip']=$_SERVER['SERVER_ADDR'];       //保存用户登录的ip地址
                $model->where(array('user_name'=>$data['user_name']))->save($data);     //更新登录用户的信息
                session('role_id',$info['role_id']);
                session('user',$info['user_name']);  //将账号保存到session中
                $this->redirect('Admin/index');
                exit;
            }
        }
        $this->display();
    }
    //登录操作
    public function doLogin(){
        if(IS_POST){
            $verify=new Verify();   //实例化验证码类
            //判断验证码是否正确
            if(!$verify->check(I('captcha'))){
                $this->error('验证码错误',U('Login/login'),1);
            }
            $model=M('admin_user');     //实例化用户（admin_user）表
            $data['user_name']=I('username');   //获取登录用户名
            $i=$model->where($data)->find();    //获取该用户的记录
            //判断登录账号是否存在
            if(!$i){
                $this->error('该账号不存在',U('Login/login'),1);
            }
            $pwd= md5(I('password').$i['salt']);    //获取登录密码，并加密
            //判断登录密码是否正确
            if(!$i || $pwd!=$i['password']){
                $this->error('密码错误，请重新输入',U('Login/login'),1);
            }
            if($i['role_id']==0){      //判断账号是否拥有权限
                $this->error('您的账号没有权限！',U('Login/login'),1);
            }
            $save_pwd=isset($_POST['remember'])?$_POST['remember']:0;   //判断是否保存登录信息
            //如果保存登录，添加cookie
            if($save_pwd!=0){
                $data['identifier'] = md5($i['username']);
                $data['token'] = md5(uniqid(rand(), TRUE));
                cookie('identifier',$data['identifier'],3600*24*7);
                cookie('token',$data['token'],3600*24*7);
                $data['last_setcookie']=time()+(3600*24*7);    //获取cookie过期的时间戳
            }
            $data['last_login']=time();     //保存用户登录的时间
            $data['last_ip']=$_SERVER['SERVER_ADDR'];       //保存用户登录的ip地址
            $model->where(array('user_name'=>$data['user_name']))->save($data);     //更新登录用户的信息
            session('role_id',$i['role_id']);
            session('user',$data['user_name']);        //将用户名保存到session中
            $this->success('登录成功',U('Admin/index'),1);
        }
    }
    //验证码
    public function verify(){
        $config =	array(
            'useImgBg'  =>  false,           // 使用背景图片
            'fontSize'  =>  20,              // 验证码字体大小(px)
            'imageH'    =>  40,               // 验证码图片高度
            'imageW'    =>  160,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        $verify=new Verify($config);    //实例化验证码类
        $verify->entry();       //生成验证码
    }
    //退出登录
    public function outLogin(){
        $user=session('user');  //获取登录的用户名
        session(null);      //  清空会话
        //清空保存cookie信息
        $data['identifier'] ='';
        $data['token']='';
        $data['last_setcookie']="";
        M('admin_user')->where(array('user_name'=>$user))->save($data);  //清除数据库中保存cookie相关信息
        echo <<<jump
        <script type="text/javascript">
            alert('退出成功');
        </script>
jump;
        $this->redirect('Login/login',array(),1,'页面正在跳转中......');
    }
    //清除缓存
    public function clearCache(){
        $user=session('user');       //获取当前的登录用户名
        $data['identifier'] ='';
        $data['token']='';
        $data['last_setcookie']='';
        M('admin_user')->where(array('user_name'=>$user))->save($data);  //清除数据库中保存cookie相关信息
        echo <<<jump
        <script type="text/javascript">
        alert('清除成功');
        window.top.location.href='/index.php/Admin/Admin/index';
</script>
jump;
    }
}