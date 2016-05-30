<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/25
 * Time: 0:21
 */
namespace Admin\Controller;
use Think\Controller;
class GradeController extends BaseController{
    /*
     * 显示会员等级页面
     */
    public function getlist(){
        //获取会员等级的所有数据
        $list=M('grade')->select();
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 添加会员等级页面和操作
     */
    public function add(){
        if(IS_POST){
            $model=M('grade');
            if($data=$model->create()){
                $i=$model->where(array('gd_name'=>$data['gd_name']))->find();
                if($i){
                    $this->error('该等级已存在，请重新输入',U('Grade/add'),1);
                }
                //会员等级添加操作
                if($model->add($data))
                    $this->success('添加成功',U('Grade/getlist'),1);
                else
                    $this->error('添加失败',U('Grade/add'),1);
            }else
                $this->error($model->getError());
            exit;
        }
        $this->display();
    }
    /*
     * 删除页面及操作
     */
    public function del($id){
        $id=(int)$id;
        //会员等级删除操作
        if(M('grade')->delete($id))
            $this->success('删除成功',U('Grade/getlist'),1);
        else
            $this->error('删除失败',U('Grade/getlist'),1);
        exit;
    }
    /*
     * 修改页面及操作
     */
    public function edit($id){
        $id=(int)$id;
        $model=M('grade');
        if(IS_POST){
            if($data=$model->create()){
                //会员等级修改的操作
                if($model->save($data))
                    $this->success('修改成功',U('Grade/getlist'),1);
                else
                    $this->error('修改失败',U('Grade/edit',array('id'=>$data['id'])),1);
            }else
                $this->error($model->getError());
            exit;
        }
        //获取要修改的那条记录
        $list=$model->where(array('id'=>$id))->find();
        $this->assign('list',$list);
        $this->display();
    }
}