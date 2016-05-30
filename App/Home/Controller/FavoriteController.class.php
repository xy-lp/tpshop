<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 2015/12/5
 * Time: 12:02
 */
namespace Home\Controller;
use Think\Controller;
class FavoriteController extends BaseController{
    /*
     * 我的收藏
     */
    public function favorite(){
        $this->display();
    }
}