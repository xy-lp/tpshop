<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/11/28
 * Time: 0:23
 */
function shop_hd_menu(){
    /*
     * 取出左导航栏的信息
     */
    /**************分类列表确定后去掉注释*********************
    //配置mamache信息
    S(array(
    'type'=>'memcache',
    'host'=>'localhost',
    'port'=>'11211'
    ));
    $cat=S('cat');  //获取缓存里的数据
    //判断是否有缓存数据
    if(empty($cat)){
    //如果没有缓存数据，就到数据库中取数据
    $cat_model=D('Home/Category');
    $cat=$cat_model->getNav();
    S('cat',$cat,3600*24);
    }
     **************************************/
    $cat_model=D('Home/Category');
    $cat=$cat_model->getNav();
    return $cat;
}