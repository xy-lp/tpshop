<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/12/5
 * Time: 11:31
 */
namespace Home\Controller;
use Think\Controller;
class PersonalController extends BaseController{
    /*
     * 个人中心
     */
    public function member(){
        $meb_id=$_SESSION['meb_id'];
        if(!$meb_id){
            $this->error('您还没登录，请先登录',U('Member/login'),1);
        }
        $personal_model=D('Member');
        $personal_data=$personal_model->getOrder();
        //p($personal_data);
        $this->assign('personal_data',$personal_data);
        $this->display();
    }
    /*
     * 评价管理
     */
    public function comment(){
        $this->display();
    }
    /*
     * 个人资料
     */
    public function member_info(){
        $this->display();
    }
    /*
     * 密码修改
     */
    public function password_eidt(){
        if(IS_POST){
            $model=D('member');
            $meb_id=$_SESSION['meb_id'];
            $data=$model->create();
            $old=I('old_pwd');
            $i=$model->where(array('id'=>$meb_id))->find();
            if(md5($old)!=$i['password']){
                $this->error('修改失败，原密码错误',U('Personal/password_eidt'),1);
            }
            if($model->where(array('id'=>$meb_id))->setField('password',$data['password'])){
                $this->success('修改成功',U('Personal/member'),1);
            }else{
                $this->error('修改失败，原密码错误',U('Personal/password_eidt'),1);
            }
        }
        $this->display();
    }

}