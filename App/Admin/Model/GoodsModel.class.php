<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/22
 * Time: 22:24
 */
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
    /*
     * 添加操作之前的操作
     * 上传商品图片
     */
    protected  function _before_insert(&$data,$options){
        //定义上传文件的配置信息
        $config = array(
            'mimes'         =>  array('image/jpg','image/png','image/jpeg','image/gif'), //允许上传的文件MiMe类型
            'rootPath'      =>  C('rootPath'),  //上传的文件根节点
            'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
            'savePath'      =>  'Goods/', //保存路径
            'is_array'      =>  0   //声明单文件上传
        );
        //执行上传文件和生成缩略图的操作
        $res  = uploadImage('goods_img',$config,$thumb=array(array(120,120),array(230,230)));
        //判断上述操作是否执行成功
        if($res['ok']==1){
            //将源图和缩略图的地址存放$data数组中写入数据库
            $data['image_path']=$res['img'][0];
            $data['image_thumb']=$res['img'][1];
            $data['image_medium']=$res['img'][2];
        }else{
            //返回上传文件和生成缩略图中产生的错误
            $this->error=$res['error'];
            return false;
        }
    }
    /*
     * 添加成功之后的操作
     * 在商品和属性关系表中添加商品、属性和其对应的值
     * 在商品相册表中添加商品相册图片
     */
    protected function _after_insert($data,$options){
        /*
         * 商品属性
         */
        $goods_id=$data['id'];  //获取已添加商品的id
        $attr=I('post.attr');   //获取提交的商品属性值（数组）
        //通过循环，获取数组中每个商品属性的值
        foreach($attr as $k=>$v){
            //判断属性值是不是二维数组
            if(is_array($v)){
                //如果是二维数组，再循环
                foreach($v as $v1){
                    //将每个属性值分别写入数据库
                    M('goods_attr')->add(array(
                        'goods_id'=>$goods_id,
                        'attr_id'=>$k,
                        'attr_value'=>$v1
                    ));
                }
            }else{
                //如果不是二维数组，直接将属性值写入数据库
                M('goods_attr')->add(array(
                    'goods_id'=>$goods_id,
                    'attr_id'=>$k,
                    'attr_value'=>$v
                ));
            }
        }
    /*
     * 商品相册
     * 多文件上传，并生成相应的缩略图
     */
        //定义上传文件的配置信息
        $config = array(
            'mimes'         =>  array('image/jpg','image/png','image/jpeg','image/gif'), //允许上传的文件MiMe类型
            'rootPath'      =>  C('rootPath'),  //上传文件的根目录
            'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
            'savePath'      =>  'Album/', //保存路径
            'is_array'      =>  1 //声明多文件上传
        );
        //执行文件上传操作并生成相应的缩略图
        $res  = uploadImage('img_url',$config,$thumb=array(array(100,100)));
        //判断上述操作是否执行成功
        if($res['ok']==1){
            //通过循环，获取到每个源图及其缩略图的地址
            foreach($res['img'] as $v){
                //将源图及其缩略图写入数据库
                M('goods_album')->add(array(
                    'goods_id'=>$goods_id,
                    'album_path'=>$v[0],
                    'album_thumb'=>$v[1]
                ));
            }
        }else{
            //执行失败返回对应的错误
            $this->error=$res['error'];
            return false;
        }
    }
    /*
     * 删除商品调用的钩子函数
     * 删除该商品对应的商品图片
     * 删除商品和属性关系表中与商品对应的记录
     * 删除该商品的相册记录及其对应的图片
     */
    public function _before_delete(&$data,$options){
        //获取删除的商品id
        $goods_id=$data['where']['id'];
        //获取商品图片的路径，并删除
        $imgs=$this->field('image_path,image_medium,image_thumb')->where(array('id'=>$goods_id))->find();
        if($imgs[image_path])
            deleteImage($imgs);
        //删除属性的数据
        $attrs=M('goods_attr')->where(array('goods_id'=>$goods_id))->delete();
        //删除相册中相应的商品图片
        $album_imgs=M('goods_album')->where(array('goods_id'=>$goods_id))->select();
        //判断该商品是否有相册信息
        if($album_imgs){
            //通过将相册信息二维数组变成一维数组
            foreach($album_imgs as $v){
                deleteImage($v);    //删除对应的图片
            }
        }
        //删除相册中与商品对应的记录信息
        M('goods_album')->where(array('goods_id'=>$goods_id))->delete();
    }
    /*
     * 根据商品id取出商品属性
     */
    public function getRadio($goods_id){
        $sql="select a.*,b.att_name from tp_goods_attr a left join tp_attribute b on a.attr_id=b.id where goods_id=$goods_id and attr_id in(select attr_id from tp_goods_attr where goods_id=$goods_id group by attr_id having count(*)>1)";
        $data=$this->query($sql);
        //P($sql);
        return $data;
    }
}