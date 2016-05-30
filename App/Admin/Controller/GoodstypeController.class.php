<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/19
 * Time: 13:40
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class GoodstypeController extends BaseController{
    /*
     * 显示商品类型
     */
    public function getlist(){
        $page_id=isset($_GET['p'])?$_GET['p']:1;        //获取页码
        $data=getpage('Goodstype',$page_id);    //传递表名和页码，获取分页信息
       /*
        * @param list 获取到相应页码的页面显示数据
        * @param page 获取显示分页的数据
        */
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display();
    }
    /*
     * 添加商品类型页面及操作
     */
    public function add(){
        if(IS_POST){
            $model=D('Goodstype');
            $data=$model->create();     //获取提交的数据
            if(!$data){
                $this->error($model->getError());
            }
            //添加商品类型操作
            if($model->add($data))
                $this->success('添加成功',U('Goodstype/getlist'),1);
            else
                $this->error('添加失败',U('Goodstype/add'),1);
            exit;
        }
        $this->display();
    }
    /*
     * 商品类型删除操作
     * @param $id 要删除那条记录的id
     */
    public function del($id){
        $id=(int)$id;   //防sql注入
        if(D('Goodstype')->delete($id))
            $this->success('删除成功',U('Goodstype/getlist'),1);
        else
            $this->error('删除失败',U('Goodstype/getlist'),1);
        exit;
    }
    /*
     * 商品类型修改页面及操作
     * @param $id 要修改的那条记录id
     */
    public function edit($id){
        $id=(int)$id;   //防sql注入
        $model=D('Goodstype');
        if(IS_POST){
            $data=$model->create();     //获取要提交的数据
            //判断是否获取到数据
            if(!$data){
                $this->error($model->getError());
            }
            $data['id']=I('post.id');   //获取要修改那条记录id
            //执行修改操作
            if($model->save($data))
                $this->success('修改成功',U('Goodstype/getlist'),1);
            else
                $this->error('修改失败',U('Goodstype/getlist',array('id'=>$data['id'])),1);
            exit;
        }
        //获取要修改的记录
        $list=$model->where(array('id'=>$id))->find();
        $this->assign('list',$list);
        $this->display();
    }
}