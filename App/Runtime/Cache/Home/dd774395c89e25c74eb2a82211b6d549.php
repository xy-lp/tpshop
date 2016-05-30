<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>购物车页面</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_gouwuche.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.goodnums.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/shop_gouwuche.js" ></script>
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		$(function(){
			//选择“-”，用获取class的方式选取
			$(".decr").click(function(){
				var otr=$(this).parent().parent().parent();
				//商品的单价
				var danjia=parseFloat(otr.find('span:first').html());
				//获取商品数量
				var num=parseInt(otr.find('input[name=good_nums]').val());
				//获取小计价格
				var count_price=parseFloat(otr.find('span:last').html());
				//商品的id
				var goods_id=otr.find("input[name=goods_id]").val();
				//商品的属性id
				var goods_attr_id=otr.find("input[name=goods_attr_id]").val();
				//商品新的数量
				var new_num=num-1;
				//商品新的小计价格
				var new_price=count_price-danjia;
				//使用ajax来完成修改数据库的操作
				$.ajax({
					type:'get',
					url:'/index.php/Home/Cart/updateCart/goods_id/'+goods_id+'/goods_attr_id/'+goods_attr_id+'/p/1',
					success:function(msg){
						//console.log(msg);
						if(msg=='ok'){
							//成功，将新值赋给相应的表单
							otr.find('input[name=good_nums]').val(new_num);
							otr.find('span:last').html(new_price);
						}else{
							alert(0);
						}
					}
				});
			});
			//选择“+”，用获取class的方式选取
			$(".incr").click(function(){
				var otr=$(this).parent().parent().parent();
				//商品的单价
				var danjia=parseFloat(otr.find('span:first').html());
				//获取商品数量
				var num=parseInt(otr.find('input[name=good_nums]').val());
				//获取小计价格
				var count_price=parseFloat(otr.find('span:last').html());
				//商品的id
				var goods_id=otr.find("input[name=goods_id]").val();
				//商品的属性id
				var goods_attr_id=otr.find("input[name=goods_attr_id]").val();
				//商品新的数量
				var new_num=num+1;
				//商品新的小计价格
				 var new_price=count_price+danjia;
				//使用ajax来完成修改数据库的操作
				$.ajax({
					type:'get',
					url:'/index.php/Home/Cart/updateCart/goods_id/'+goods_id+'/goods_attr_id/'+goods_attr_id+'/p/0',
					success:function(msg){
						//console.log(msg);
						if(msg=='ok'){
							//成功，将新值赋给相应的表单
							otr.find('input[name=good_nums]').val(new_num);
							otr.find('span:last').html(new_price);
						}else{
							alert(0);
						}
					}
				});
			});
		});
	</script>
</head>
<body>
		<!-- Header  -wll-2013/03/24 -->
	<!-- Header  -wll-2013/03/24 -->
<div class="shop_hd">
    <!-- Header TopNav -->
    <div class="shop_hd_topNav">
        <div class="shop_hd_topNav_all">
            <!-- Header TopNav Left -->
            <div class="shop_hd_topNav_all_left">
                <?php
 if(!empty($member)){ ?>
                    <p><?php echo $member?>，欢迎来到<b><a href="/">ShoopNC商城</a></b>[<a href="/index.php/Home/Member/outLogin">退出登录</a>]</p>
                <?php
 }else{ ?>
                    <p>您好，欢迎来到<b><a href="/">ShoopNC商城</a></b>[<a href="/index.php/Home/Member/login">登录</a>][<a href="/index.php/Home/Member/register">注册</a>]</p>
                <?php }?>
            </div>
            <!-- Header TopNav Left End -->

            <!-- Header TopNav Right -->
            <div class="shop_hd_topNav_all_right">
                <ul class="topNav_quick_menu">

                    <li>
                        <div class="topNav_menu">
                            <a href="/index.php/Home/Personal/member" class="topNavHover">我的商城<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;" >
                                <ul>
                                    <li><a title="已买到的商品" target="_top" href="/index.php/Home/Personal/member">已买到的商品</a></li>
                                    <li><a title="个人主页" target="_top" href="/index.php/Home/Personal/member">个人主页</a></li>
                                    <li><a title="我的好友" target="_top" href="#">我的好友</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="topNav_menu">
                            <a href="#" class="topNavHover">卖家中心<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;">
                                <ul>
                                    <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
                                    <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="/index.php/Home/cart/cartlist" class="topNavHover">购物车<b><?php echo ($total["total_count"]); ?></b>种商品<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;">
                                <!--
                                <ul>
                                  <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
                                  <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
                                </ul>
                                -->
                                <p>还没有商品，赶快去挑选！</p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="#" class="topNavHover">我的收藏<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;">
                                <ul>
                                    <li><a title="收藏的商品" target="_top" href="#">收藏的商品</a></li>
                                    <li><a title="收藏的店铺" target="_top" href="#">收藏的店铺</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="topNav_menu">
                            <a href="#">站内消息</a>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- Header TopNav Right End -->
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- Header TopNav End -->

    <!-- TopHeader Center -->
    <div class="shop_hd_header">
        <div class="shop_hd_header_logo"><h1 class="logo"><a href="/"><img src="/Public/Home/images/logo.png" alt="ShopCZ" /></a><span>ShopCZ</span></h1></div>
        <div class="shop_hd_header_search">
            <ul class="shop_hd_header_search_tab">
                <li id="search" class="current">商品</li>
                <li id="shop_search">店铺</li>
            </ul>
            <div class="clear"></div>
            <div class="search_form">
                <form method="post" action="index.php">
                    <div class="search_formstyle">
                        <input type="text" class="search_form_text" name="search_content" value="搜索其实很简单！" />
                        <input type="submit" class="search_form_sub" name="secrch_submit" value="" title="搜索" />
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            <div class="search_tag">
                <a href="">李宁</a>
                <a href="">耐克</a>
                <a href="">Kappa</a>
                <a href="">双肩包</a>
                <a href="">手提包</a>
            </div>

        </div>
    </div>
    <div class="clear"></div>
    <!-- TopHeader Center End -->

    <!-- Header Menu -->
    <div class="shop_hd_menu">
        <!-- 所有商品菜单 -->

        <div id="shop_hd_menu_all_category" class="shop_hd_menu_all_category"><!-- 首页去掉 id="shop_hd_menu_all_category" 加上clsss shop_hd_menu_hover -->
            <div class="shop_hd_menu_all_category_title"><h2 title="所有商品分类"><a href="javascript:void(0);">所有商品分类</a></h2><i></i></div>
            <div id="shop_hd_menu_all_category_hd" class="shop_hd_menu_all_category_hd">
                <ul class="shop_hd_menu_all_category_hd_menu clearfix">
                    <!-- 单个菜单项 -->
                    <?php if(is_array($cat_one)): $i = 0; $__LIST__ = $cat_one;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="cat_1" class="">
                            <h3><a href="javascript:" title="<?php echo ($vo["cat_name"]); ?>"><?php echo ($vo["cat_name"]); ?></a></h3>
                            <div id="cat_1_menu" class="cat_menu clearfix" style="">
                                <dl class="clearfix">
                                    <?php if(is_array($cat_two)): $i = 0; $__LIST__ = $cat_two;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($vo1['parent_id'] == $vo['cat_id']): ?><dt><a href="javascript:" href=""><?php echo ($vo1["cat_name"]); ?></a></dt>
                                            <dd>
                                                <?php if(is_array($cat_three)): $i = 0; $__LIST__ = $cat_three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($vo2['parent_id'] == $vo1['cat_id']): ?><a href="/index.php/Home/Cart/goodslist/id/<?php echo ($vo2["cat_id"]); ?>"><?php echo ($vo2["cat_name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </dl>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="more"><a href="">查看更多分类</a></li>
                </ul>
            </div>
        </div>
        <!-- 所有商品菜单 END -->

        <!-- 普通导航菜单 -->
        <ul class="shop_hd_menu_nav">
            <li class="current_link"><a href="/index.php"><span>首页</span></a></li>
            <?php if(is_array($middle_nav)): $i = 0; $__LIST__ = $middle_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mnvo): $mod = ($i % 2 );++$i;?><li class="link"><a href=""><span><?php echo ($mnvo["nav_name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- 普通导航菜单 End -->
    </div>
    <!-- Header Menu End -->
</div>
<div class="clear"></div>
<!-- 面包屑 注意首页没有 -->
<div class="shop_hd_breadcrumb">
    <strong>当前位置：</strong>
		<span>
			<a href="/index.php">首页</a>
<?php if(is_array($breadcrumb)): $i = 0; $__LIST__ = $breadcrumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bcvo): $mod = ($i % 2 );++$i;?>&nbsp;›&nbsp;<a href=""><?php echo ($bcvo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		</span>
</div>
<div class="clear"></div>
<!-- 面包屑 End -->

<!-- Header End -->
	<!-- 面包屑 注意首页没有
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<a href="">我的商城</a>&nbsp;›&nbsp;
			<a href="">我的购物车</a>
		</span>
	</div>
	<div class="clear"></div>
	 面包屑 End -->

	<!-- Header End -->
	
	<!-- 购物车 Body -->
	<div class="shop_gwc_bd clearfix">
		<!-- 在具体实现的时候，根据情况选择其中一种情况 -->
		<!-- 购物车为空 -->
			<div class="empty_cart mb10" style="display: <?php echo 'none'?>">
				<div class="message">
					<p>购物车内暂时没有商品，您可以<a href="index.html">去首页</a>挑选喜欢的商品</p>
				</div>
			</div>
		<!-- 购物车为空 end-->
		
		<!-- 购物车有商品 -->
		<div class="shop_gwc_bd_contents clearfix">
			<!-- 购物流程导航 -->
			<div class="shop_gwc_bd_contents_lc clearfix">
				<ul>
					<li class="step_a hover_a">确认购物清单</li>
					<li class="step_b">确认收货人资料及送货方式</li>
					<li class="step_c">购买完成</li>
				</ul>
			</div>
			<!-- 购物流程导航 End -->

			<!-- 购物车列表 -->
			<table>
				<thead>
					<tr>
						<th style="width: 1%"><input type="checkbox" name="boxAll[]" /></th>
						<th colspan="2"><span>商品</span></th>
						<th><span>商品属性</span></th>
						<th><span>单价(元)</span></th>
						<th><span>数量</span></th>
						<th><span>小计</span></th>
						<th><span>操作</span></th>
					</tr>
				</thead>
				<tbody>
<?php if(is_array($cart_list)): $i = 0; $__LIST__ = $cart_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td style="width: 1%"><input type="checkbox" name="box[]" /></td>
					<td class="gwc_list_pic" style="width: 10%"><a href=""><img src="/Public/Uploads/<?php echo ($vo['info']["image_thumb"]); ?>" /></a></td>
					<td class="gwc_list_title" style="width: 25%"><a href=""><?php echo ($vo['info']["goods_name"]); ?></a><input type="hidden" name="goods_id" value="<?php echo ($vo["goods_id"]); ?>"/></td>
					<td class="gwc_list_attr" style="width: 18%"><a href=""><?php echo ($vo["attrs"]); ?></a></td><input type="hidden" name="goods_attr_id" value="<?php echo ($vo["goods_attr_id"]); ?>"/>
					<td class="gwc_list_danjia" style="width: 10%">￥<span><?php echo ($vo['info']["shop_price"]); ?></span></td>
					<td class="gwc_list_shuliang" style="width: 10%"><span><a class="decr" href="javascript:">-</a><input type="text" value="<?php echo ($vo["goods_nums"]); ?>" name="good_nums" id="good_nums" class="good_nums" /><a class="incr" href="javascript:">+</a></span></td>
					<td class="gwc_list_xiaoji" style="width: 10%">￥<span><?php echo $vo['goods_nums']*$vo['info']['shop_price']?></span></td>
					<td class="gwc_list_caozuo" style="width: 15%"><a href="">收藏</a><a href="/index.php/Home/Cart/delCart/goods_id/<?php echo ($vo["goods_id"]); ?>/goods_attr_id/<?php echo ($vo["goods_attr_id"]); ?>" onclick="return confirm('你确定要删除吗？')">删除</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</tbody>
				<tfoot>
					<tr>
						<td colspan="8">
							<div class="gwc_foot_zongjia">商品总价(不含运费)<span>￥<strong id="good_zongjia"><?php echo ($getCartTotal["total_price"]); ?></strong></span></div>
							<div class="clear"></div>
							<div class="gwc_foot_links">
								<a href="/index.php" class="go">继续购物</a>
								<a href="/index.php/Home/Order/addOrder" class="op">确认并填写订单</a>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
			<!-- 购物车列表 End -->
		</div>
		<!-- 购物车有商品 end -->

	</div>
	<!-- 购物车 Body End -->

	<!-- Footer - wll - 2013/3/24 -->
		<!-- Footer - wll - 2013/3/24 -->
<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
<div class="clear"></div>
<div class="shop_footer">
    <div class="shop_footer_link">
        <p>
            <a href="/index.php/Home/Index/index">首页</a>|
            <a href="#">招聘英才</a>|
            <a href="#">广告合作</a>|
            <a href="#">关于ShopCZ</a>|
            <a href="#">关于我们</a>
        </p>
    </div>
    <div class="shop_footer_copy">
        <p>Copyright 2007-2013 ShopCZ Inc.,All rights reserved.<br />d by ShopCZ 2.4 </p>
    </div>
</div>
<!-- Footer End -->
	<!-- Footer End -->

</body>
</html>