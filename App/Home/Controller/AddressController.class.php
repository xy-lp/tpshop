<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/12/1
 * Time: 13:36
 */
namespace Home\Controller;
use Think\Controller;
class AddressController extends BaseController{
    /*
     * 收货地址显示页面
     */
    public function address(){
        $this->display();
    }
    /*
     * 添加收货地址
     */
    public function addAdress(){
        if(IS_POST){
            $model=D('Address');
            $data=$model->create();
            p($data);
            $data['meb_id']=$_SESSION['meb_id'];
            $address='';
            foreach($data['address'] as $v){
                $address.=$v;
            }
            $data['address']=$address;

            if($model->add($data)){
                $this->redirect('Order/addOrder');
                exit;
            }else{
                $this->error('添加失败',U('Order/addOrder'),1);
            }
        }
        $this->display();
    }
}