<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/20
 * Time: 9:39
 */
namespace Admin\Model;
use Think\Model;
use Think\Upload;
use Think\Image;
class BrandModel extends Model{
    /*
     * 自动验证
     */
    protected $_validate=array(
        //在新增数据是，判断品牌是否为空，或已存在
        array('brand_name','require','品牌名称不能为空!',1,'',3),
        array('brand_name','','品牌名称已存在!',1,'unique',1),
        //判断单位数量的值是否为数字
        array('measure_unit','number','单位数量请输入数字',2,'',3),
    );
    /*
     * 在添加品牌之前上传图片，并生成缩略图
     */
    protected function _before_insert(&$data,$options){
        if($_FILES['brand_logo']['error']==0){  // 判断是否有文件上传
            //@param $config array 实例化upload类需要传递的参数
            $config = array(
                'mimes'         =>  array('image/jpg','image/png','image/jpeg','image/gif'), //允许上传的文件MiMe类型
                'rootPath'      =>  C('rootPath'),  //保存根目录
                'savePath'      =>  'Brand/', //保存路径
                'is_array'      =>  0,     //单文件上传
            );
            /*
             * 调用函数，执行上传并生成缩略图操作
             * @param   brand_logo  上传文件控件的表单名
             * @param   $config  上传文件的参数
             * @param   $thumb  二维数组，传递生成缩略图的长宽参数
             */
            $res  = uploadImage('brand_logo',$config,$thumb=array(array(25,25)));
            //判断是否上传且生成缩略图成功
            if($res['ok']==1){
                //将返回的地址，放入$data数组中，写入数据库相应字段中
                $data['brand_img']=$res['img'][0];
                $data['brand_logo']=$res['img'][1];
            }else{
                //上传失败，返回错误信息
                $this->error=$res['error'];
                return false;
            }
        }
    }
    /*
     * 在删除品牌时，删掉上传的图片和缩略图
     */
    protected function _before_delete(&$data,$options){
        //获取要删除品牌的id
        $brand_id=$data['where']['brand_id'];
        //获取图片的地址，并删除
        $imgs=M('brand')->field('brand_img,brand_logo')->where(array('brand_id'=>$brand_id))->find();
        if($imgs['brand_img'])  //判断该数据中是否有源图地址
            deleteImage($imgs);     //调用函数删除图片
    }
    /*
     * 在更新品牌时，替换以前的图片
     */
    protected function _after_update($data,$options){
        if($_FILES['brand_logo']['error']==0) {  // 判断是否有文件上传
            //清空历史上传的图片和缩略图
            $brand_id=$data['brand_id'];
            $imgs=M('brand')->field('brand_img,brand_logo')->where(array('brand_id'=>$brand_id))->find();
            if($imgs['brand_img'])  //判断该数据中是否有源图地址
                deleteImage($imgs);     //调用函数删除图片
            /*
             * 添加新的图片，并更新数据库中的数据
             * @param $config array 实例化upload类需要传递的参数
             */
            $config = array(
                'mimes'         =>  array('image/jpg','image/png','image/jpeg','image/gif'), //允许上传的文件MiMe类型
                'rootPath'      =>  C('rootPath'),  //保存根目录
                'savePath'      =>  'Brand/', //保存路径
                'is_array'      =>  0,     //单文件上传
            );
            /*
             * 调用函数，执行上传并生成缩略图操作
             * @param   brand_logo  上传文件控件的表单名
             * @param   $config  上传文件的参数
             * @param   $thumb  二维数组，传递生成缩略图的长宽参数
             */
            $res  = uploadImage('brand_logo',$config,$thumb=array(array(25,25)));
            //判断是否上传且生成缩略图成功
            if($res['ok']==1){
                unset($data);   //清空$data数组
                $data['brand_img']=$res['img'][0];
                $data['brand_logo']=$res['img'][1];
                $data['brand_id']=$brand_id;
                //将图片和缩略图地址写入数据库相应字段中
                if(M('brand')->save($data))
                    return true;
                else{
                    //写入失败，返回错误信息
                    $this->error='图片上传失败';
                    return false;
                }

            }else{
                //上传失败，返回错误信息
                $this->error=$res['error'];
                return false;
            }
        }
    }
}