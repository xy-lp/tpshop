<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/24
 * Time: 23:27
 */
namespace Admin\Controller;
use Think\Controller;
class OrderController extends BaseController{
    public function getlist(){
        $model=D('Order');
        $order_list=$model->getOrder();
        $this->assign('order_list',$order_list);
        //p($order_list);
        $this->display();
    }
    public function add(){
        $this->display();
    }
    public function del($id){
        $id=(int)$id;
        $this->display();
    }
    public function edit($id){
        $id=(int)$id;
        $this->display();
    }
}