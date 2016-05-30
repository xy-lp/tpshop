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

    <style type="text/css">
    .shop_bd_shdz_title{width:1000px; margin-top: 10px; height:50px; line-height: 50px; overflow: hidden; background-color:#F8F8F8;}
    .shop_bd_shdz_title h3{width:120px; text-align: center; height:40px; line-height: 40px; font-size: 14px; font-weight: bold;  background:#FFF; border:1px solid #E8E8E8; border-radius:4px 4px 0 0; float: left;  position: relative; top:10px; left:10px; border-bottom: none;}
    .shop_bd_shdz_title p{float: right;}
    .shop_bd_shdz_title p a{margin:0 8px; color:#555555;}

	.shop_bd_shdz_lists{width:1000px;}
	.shop_bd_shdz_lists ul{width:1000px;}
	.shop_bd_shdz_lists ul li{width:980px; border-radius: 3px; margin:5px 0; padding-left:18px; line-height: 40px; height:40px; border:1px solid #FFE580; background-color:#FFF5CC;}
	.shop_bd_shdz_lists ul li label{color:#626A73; font-weight: bold;}
	.shop_bd_shdz_lists ul li label span{padding:10px;}
	.shop_bd_shdz_lists ul li em{margin:0 4px; color:#626A73;}

	.shop_bd_shopping_lists{width:1000px;}
	.shop_bd_shopping_lists ul{width:1000px;}
	.shop_bd_shopping_lists ul li{width:980px; border-radius: 3px; margin:5px 0; padding-left:18px; line-height: 40px; height:40px; border:1px solid #cccccc;}
	.shop_bd_shopping_lists ul li label{color:#626A73; font-weight: bold;}
	.shop_bd_shopping_lists ul li label span{padding:10px;}
	.shop_bd_shopping_lists ul li em{margin:0 4px; color:#626A73;}

	.shop_bd_payment_lists{width:1000px;}
	.shop_bd_payment_lists ul{width:1000px;}
	.shop_bd_payment_lists ul li{width:980px; border-radius: 3px; margin:5px 0; padding-left:18px; line-height: 40px; height:40px; border:1px solid #cccccc;}
	.shop_bd_payment_lists ul li label{color:#626A73; font-weight: bold;}
	.shop_bd_payment_lists ul li label span{padding:10px;}
	.shop_bd_payment_lists ul li em{margin:0 4px; color:#626A73;}

	.shop_bd_shdz{width:1000px; margin:10px auto 0;}
	.shop_bd_shdz_new{border:1px solid #ccc; width:998px;}
	.shop_bd_shdz_new div.title{width:990px; padding-left:8px; line-height:35px; height:35px; border-bottom:1px solid #ccc; background-color:#F2F2F2; font-color:#656565; font-weight: bold; font-size:14px;}
	.shdz_new_form{width:980px; padding:9px;}
	.shdz_new_form ul{width:100%;}
	.shdz_new_form ul li{clear:both; width:100%; padding:5px 0; height:25px; line-height: 25px;}
	.shdz_new_form ul li label{float:left;width:100px; text-align: right; padding-right: 10px;}
	.shdz_new_form ul li label span{color:#f00; font-weight: bold; font-size:14px; position: relative; left:-3px; top:2px;}
    </style>

	<script type="text/javascript">
	jQuery(function(){
		jQuery("#new_add_shdz_btn").toggle(function(){
			jQuery("#new_add_shdz_contents").show(500);
		},function(){
			jQuery("#new_add_shdz_contents").hide(500);
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
                            <a href="#" class="topNavHover">我的商城<i></i></a>
                            <div class="topNav_menu_bd" style="display:none;" >
                                <ul>
                                    <li><a title="已买到的商品" target="_top" href="#">已买到的商品</a></li>
                                    <li><a title="个人主页" target="_top" href="#">个人主页</a></li>
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
                            <h3><a href="" title="<?php echo ($vo["cat_name"]); ?>"><?php echo ($vo["cat_name"]); ?></a></h3>
                            <div id="cat_1_menu" class="cat_menu clearfix" style="">
                                <dl class="clearfix">
                                    <?php if(is_array($cat_two)): $i = 0; $__LIST__ = $cat_two;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($vo1['parent_id'] == $vo['cat_id']): ?><dt><a href="女装" href=""><?php echo ($vo1["cat_name"]); ?></a></dt>
                                            <dd>
                                                <?php if(is_array($cat_three)): $i = 0; $__LIST__ = $cat_three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($vo2['parent_id'] == $vo1['cat_id']): ?><a href="/index.php/Home/Order/goodslist/id/<?php echo ($vo2["cat_id"]); ?>"><?php echo ($vo2["cat_name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
            <li class="current_link"><a href=""><span>首页</span></a></li>
            <li class="link"><a href=""><span>团购</span></a></li>
            <li class="link"><a href=""><span>品牌</span></a></li>
            <li class="link"><a href=""><span>优惠卷</span></a></li>
            <li class="link"><a href=""><span>积分中心</span></a></li>
            <li class="link"><a href=""><span>运动专场</span></a></li>
            <li class="link"><a href=""><span>微商城</span></a></li>
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
	<!-- 面包屑 注意首页没有 -->
	<!--<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<a href="">我的商城</a>&nbsp;›&nbsp;
			<a href="">我的购物车</a>
		</span>
	</div>
	<div class="clear"></div>-->
	<!-- 面包屑 End -->

	<!-- Header End -->
	
	<!-- 购物车 Body -->
	<div class="shop_gwc_bd clearfix">
		<div class="shop_gwc_bd_contents clearfix">
			<!-- 购物流程导航 -->
			<div class="shop_gwc_bd_contents_lc clearfix">
				<ul>
					<li class="step_a">确认购物清单</li>
					<li class="step_b hover_b">确认收货人资料及送货方式</li>
					<li class="step_c">购买完成</li>
				</ul>
			</div>
			<!-- 购物流程导航 End -->
				<!-- 新增收货地址 -->
				<div id="new_add_shdz_contents" style="display:none;" class="shop_bd_shdz_new clearfix">
					<div class="title">新增收货地址</div>
					<div class="shdz_new_form">
						<form id="addressForm" action="/index.php/Home/Address/addAdress" method="post">
							<ul>
								<li><label for=""><span>*</span>收货人姓名：</label><input type="text" name="consignee" class="name" /></li>
								<li><label for=""><span>*</span>所在地址：</label>

								</li>
								<li><label for=""><span>*</span>详细地址：</label><input type="text" name="address" class="xiangxi" /></li>
								<li><label for=""><span></span>邮政编码：</label><input type="text" name="post" class="youbian" /></li>
								<li><label for=""><span></span>手机号：</label><input type="text" name="mobile" class="shouji" /></li>
								<li><label for="">&nbsp;</label><input type="submit" value="增加收货地址" /></li>
							</ul>
							</from>
					</div>
				</div>
		</div>
		<!-- 新增收货地址 End -->
		<form id="orderForm" action="/index.php/Home/Order/flow" method="post">
			<div class="clear"></div>
			<!-- 收货地址 title -->
			<div class="shop_bd_shdz_title">
				<h3>收货人地址</h3>
				<p><a href="javasrcipt:void(0);" id="new_add_shdz_btn">新增收货地址</a><a href="javascript:void(0);">管理收货地址</a></p>
			</div>
			<div class="clear"></div>
			<!-- 收货人地址 Title End -->
			<div class="shop_bd_shdz clearfix">
				<div class="shop_bd_shdz_lists clearfix">
					<ul>
						<?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><label>寄送至：<span><input type="radio" name="address" checked="" /></span></label><em><?php echo ($vo["address"]); ?></em><em><?php echo ($vo["consignee"]); ?>(收)</em><em><?php echo ($vo["mobile"]); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
				</div>

			<div class="clear"></div>
			<!-- 配送方式 shipping Start -->
			<div class="shop_bd_shdz_title">
				<h3>配送方式</h3>
			</div>
			<div class="clear"></div>
			<div class="shop_bd_shdz clearfix">
				<div class="shop_bd_shopping_lists clearfix">
					<ul>
						<li><input type="radio" name="shopping" value="1" checked=""/>申通快递</li>
						<li><input type="radio" name="shopping" value="2"/>顺丰快递</li>
						<li><input type="radio" name="shopping" value="3"/>圆通快递</li>
						<li><input type="radio" name="shopping" value="4"/>韵达快递</li>
					</ul>
				</div>
			<!-- 配送方式 shipping End -->

			<div class="clear"></div>
			<!-- 支付方式 shipping Start -->
			<div class="shop_bd_shdz_title">
				<h3>支付方式</h3>
			</div>
			<div class="clear"></div>
			<div class="shop_bd_shdz clearfix">
				<div class="shop_bd_payment_lists clearfix">
					<ul>
						<li><input type="radio" name="payment" value="1" checked=""/>在线支付</li>
						<li><input type="radio" name="payment" value="2"/>银行转账</li>
						<li><input type="radio" name="payment" value="3"/>货到付款</li>
					</ul>
				</div>
				<!-- 支付方式 shipping End -->

			<div class="clear"></div>
			<!-- 购物车列表 -->
			<div class="shop_bd_shdz_title">
				<h3>确认购物清单</h3>
			</div>
			<div class="clear"></div>
			<table>
				<thead>
					<tr>
						<th><span></span></th>
						<th><span>商品</span></th>
						<th><span>单价(元)</span></th>
						<th><span>数量</span></th>
						<th><span>小计</span></th>
					</tr>
				</thead>
				<tbody>
<?php if(is_array($cart_data)): $i = 0; $__LIST__ = $cart_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td class="gwc_list_pic"><a href=""><img src="/Public/Uploads/<?php echo ($vo['info']["image_thumb"]); ?>" /></a></td>
						<td class="gwc_list_title"><span><?php echo ($vo['info']["goods_name"]); ?></span></td>
						<td class="gwc_list_danjia">￥<span><?php echo ($vo['info']["shop_price"]); ?></span></td>
						<td class="gwc_list_shuliang"><span><?php echo ($vo["goods_nums"]); ?></span></td>
						<td class="gwc_list_xiaoji" style="color: red">￥<span><?php echo $vo['goods_nums']*$vo['info']['shop_price']?></span></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5">
							<div class="gwc_foot_zongjia">商品总价(不含运费)<span>￥<strong id="good_zongjia"><?php echo ($getCartTotal["total_price"]); ?></strong></span></div>
							<div class="clear"></div>
							<div class="gwc_foot_links">
								<a href="/index.php/Home/Cart/cartlist" class="go">返回上一步</a>
								<input type="submit" class="op"/>提交订单
								<a href="javascript:" onclick="orderSubmit()" class="op">提交订单</a>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
			<!-- 购物车列表 End -->
			</form>
		</div>
	</div>
	<!-- 购物车 Body End -->

	<!-- Footer - wll - 2013/3/24 -->
	<!-- Footer - wll - 2013/3/24 -->
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
<script type="text/javascript">
	function orderSubmit(){
		document.getElementById('orderForm').submit();
	}
</script>