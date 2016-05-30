<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/24
 * Time: 22:58
 */
namespace Admin\Controller;
use Think\Controller;
class TrashController extends BaseController{
    public function getlist(){
        $list=M('goods')->field('id,goods_name,goods_sn,shop_price')->where(array('is_del'=>1))->select();
        $this->assign('list',$list);
        $this->display();
    }
    public function restore($id){
        $id=(int)$id;
        $model=D('goods');
        $data['id']=$id;
        $data['is_del']=0;
        if($model->save($data))
            $this->success('还原成功',U('Trash/getlist'),1);
        else
            $this->error('还原失败',U('Trash/getlist'),1);
        exit;

    }
    public function del($id){
        $id=(int)$id;
        $model=D('goods');
        if($model->where(array('id'=>$id))->delete())
            $this->success('删除成功',U('Trash/getlist'),1);
        else
            $this->error('删除失败',U('Trash/getlist'),1);
        exit;
    }
}