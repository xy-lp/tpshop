<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/22
 * Time: 0:27
 */
namespace Admin\Controller;
use Think\Controller;
class PrivilegeController extends BaseController{
    /*
     * 栏目列表显示页面
     */
    public function getlist(){
        $model=D('Privilege');
        $list=$model->getCategoryTree();    //生成树结构
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 栏目列表添加页面及操作
     */
    public function add(){
        $model=D('Privilege');
        if(IS_POST){
            $data=$model->create();     //获取提交的数据
            //判断是否获取到数据
            if(empty($data)){
                $this->error($model->getError());
            }
            //如果是顶级栏目，清空模块、控制器和方法的值
            if($data[parent_pid]==0){
                $data['module_name']='';
                $data['controller_name']='';
                $data['action_name']='';
                $data['priv_level']=0;
            }else{
                //获取所属栏目的等级，在其基础上加一
                $parent=$model->field('priv_level')->where(array('id'=>$data['parent_pid']))->find();
                $data['priv_level']=$parent['priv_level']+1;
            }
            //执行添加操作
            if($model->add($data))
                $this->success('添加成功',U('Privilege/getlist'),1);
            else
                $this->error('添加失败',U('Privilege/add'),1);
            exit;
        }
        $list=$model->getIdAndNameTree();   //获取树结构
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 栏目删除操作
     * @param $id 要删除那条记录的id
     */
    public function del($id){
        $id=(int)$id;
        $model=D('Privilege');
        //判断该栏目下是否有子节点
        $i=$model->where(array('parent_pid'=>$id))->select();
        if($i) {
            $this->error('该节点还有子节点，不能被删除', U('Privilege/getlist'), 1);
        }
        //栏目删除操作
        if($model->delete($id))
            $this->success('删除成功',U('Privilege/getlist'),1);
        else
            $this->error('删除失败',U('Privilege/getlist'),1);
        exit;
    }
    /*
     * 栏目修改操作
     * @param $id 要修改的那条记录的id
     */
    public function edit($id){
        $id=(int)$id;
        $model=D('Privilege');
        if(IS_POST){
            $data=$model->create();     //获取提交的数据
            //判断父级是否是自己
            if($data['id']==$data['parent_pid']){
                $this->error('不能为自身的节点',U('Privilege/edit',array('id'=>$data['id'])),1);
            }
            //获取当前栏目所有的子节点
            $sublist=$model->getCategoryTree($data['id']);
            //通过循环，判断父级是不是自己的子级
            foreach($sublist as $v){
                if($v['id']==$data['parent_pid']){
                    $this->error('父级不能为自己的子级',U('Privilege/edit',array('id'=>$data['id'])),1);
                }
            }
            //判断是不是顶级栏目
            if($data[parent_pid]==0){
                $data['priv_level']=0;  //顶级栏目的等级为0
            }else{
                //如果不是顶级栏目，其等级在父级的等级基础上+1
                $parent=$model->field('priv_level')->where(array('id'=>$data['parent_pid']))->find();
                $data['priv_level']=$parent['priv_level']+1;
            }
            //执行修改操作
            if($model->save($data))
                $this->success('更改成功',U('Privilege/getlist'),1);
            else
                $this->error('更改失败',U('Privilege/edit',array('id'=>$data['id'])),1);
            exit;
        }
        //获取到要修改的那条记录
        $info=$model->where(array('id'=>$id))->find();
        $list=$model->getIdAndNameTree();
        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->display();
    }
}