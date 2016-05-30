<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/12/6
 * Time: 19:12
 */
namespace Home\Controller;
use Think\Controller;
class PayController extends BaseController{
    public function pay(){
        $order_data=I('post.');
        /*
         * 设置变量
         */
        //'1009001'=>'#(%#WU)(UFGDKJGNDFG',
        $v_mid = '1009001';//商户号
        $v_oid = $order_data['order_sn'];//订单编号
        $v_amount = $order_data['goods_amount'];//订单金额
        $v_moneytype = 'CNY';//人民币类型
        $v_url = __MODULE__.'/Pay/access';//告诉第三方支付平台，把支付结果返回到该页面。
        $key = '#(%#WU)(UFGDKJGNDFG';
        //v_amount v_moneytype v_oid v_mid v_url key
        $v_md5str = strtoupper(md5($v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key));
        //如下的表单是准备提交到第三方支付平台的数据
        $payed=array('v_mid'=>$v_mid,'v_oid'=>$v_oid,'v_amount'=>$v_amount,'v_moneytype'=>$v_moneytype,'v_url'=>$v_url,'key'=>$key,'v_md5str'=>$v_md5str);
        $this->assign('payed',$payed);
        $this->display();
    }
    public function access(){
        //$order_data=I('post.');
        $v_oid = $_POST['v_oid'];
        $v_pstatus = $_POST['v_pstatus'];
        $v_pstring = $_POST['v_pstring'];
        $v_md5str = $_POST['v_md5str'];
        $v_amount = $_POST['v_amount'];
        $v_moneytype = $_POST['v_moneytype'];
        $key = '#(%#WU)(UFGDKJGNDFG';
//验证数据的合法性
        //我们自己也要生成md5密钥
        //v_oid，v_pstatus，v_amount，v_moneytype，key
        $md5info =strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));
        if($v_md5str==$md5info){
            //没有被篡改
            //验证支付是否成功
            if($v_pstatus==20){
                //支付成功，支付成功后，要修改支付状态
                $sql="update order_info set pay_status=1 where order_sn='$v_oid'";
                mysql_query($sql);
                $id = mysql_affected_rows($conn);
                if($id!=-1){
                    //支付成功，跳转到某一个页面，比如用户中心，等等。
                    echo '恭喜你，支付成功';
                }
            }else{

                echo '不要意思，支付失败，请重新支付';
            }

        }else{
            echo '数据有诈';
        }
        //p($order_data);
    }
}