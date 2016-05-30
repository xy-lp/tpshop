<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>管理收货地址</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_manager.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_shdz_835.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
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
                                                <?php if(is_array($cat_three)): $i = 0; $__LIST__ = $cat_three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($vo2['parent_id'] == $vo1['cat_id']): ?><a href="/index.php/Home/Address/goodslist/id/<?php echo ($vo2["cat_id"]); ?>"><?php echo ($vo2["cat_name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
		<!-- Header Menu End -->


	<div class="clear"></div>
	<!-- 面包屑 注意首页没有 -->
	<!--<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<a href="">我的商城</a>&nbsp;›&nbsp;
			<a href="">已买到商品</a>
		</span>
	</div>
	<div class="clear"></div>-->
	<!-- 面包屑 End -->

	<!-- Header End -->	

	<!-- 我的个人中心 -->
	<div class="shop_member_bd clearfix">
		<!-- 左边导航 -->
		<!-- 左边导航 -->
<div class="shop_member_bd_left clearfix">

    <div class="shop_member_bd_left_pic">
        <a href="javascript:void(0);"><img src="/Public/Home/images/avatar.png" /></a>
    </div>
    <div class="clear"></div>

    <dl>
        <dt>我的交易</dt>
        <dd><span><a href="/index.php/Home/personal/member">已购买商品</a></span></dd>
        <dd><span><a href="/index.php/Home/Favorite/favorite">我的收藏</a></span></dd>
        <dd><span><a href="/index.php/Home/personal/comment">评价管理</a></span></dd>
    </dl>

    <dl>
        <dt>我的账户</dt>
        <dd><span><a href="/index.php/Home/personal/member_info">个人资料</a></span></dd>
        <dd><span><a href="/index.php/Home/personal/password_eidt">密码修改</a></span></dd>
        <dd><span><a href="/index.php/Home/Address/address">收货地址</a></span></dd>
    </dl>

</div>
<!-- 左边导航 End -->
		<!-- 左边导航 End -->
		
		<!-- 右边购物列表 -->
		<div class="shop_member_bd_right clearfix">
			
			<div class="shop_meber_bd_good_lists clearfix">
				<div class="title"><h3>管理收货地址<a style="float:right;" href="javasrcipt:void(0);" id="new_add_shdz_btn">新增收货地址</a></h3></div>
				<div class="clear"></div>
			<!-- 收货人地址 Title End -->
			<div class="shop_bd_shdz clearfix">
				<div class="shop_bd_shdz_lists clearfix">
					<ul>
						<li><label><span><input type="radio" name="shdz" /></span></label><em>北京</em><em>北京市</em><em>昌平区</em><em>回龙观东大街</em><em>王超平(收)</em><em>1336699232</em><span class="admin_shdz_btn"><a href="">编辑</a><a href="">删除</a></span></li>

						<li><label><span><input type="radio" name="shdz" /></span></label><em>北京</em><em>北京市</em><em>昌平区</em><em>回龙观东大街</em><em>王超平(收)</em><em>1336699232</em><span class="admin_shdz_btn"><a href="">编辑</a><a href="">删除</a></span></li>

						<li><label><span><input type="radio" name="shdz" /></span></label><em>北京</em><em>北京市</em><em>昌平区</em><em>回龙观东大街</em><em>王超平(收)</em><em>1336699232</em><span class="admin_shdz_btn"><a href="">编辑</a><a href="">删除</a></span></li>

						
					</ul>
				</div>
				<!-- 新增收货地址 -->
				<div id="new_add_shdz_contents" style="display:none;" class="shop_bd_shdz_new clearfix">
					<div class="title">新增收货地址</div>
					<div class="shdz_new_form">
						<form>
							<ul>
								<li><label for=""><span>*</span>收货人姓名：</label><input type="text" class="name" /></li>
								<li><label for=""><span>*</span>所在地址：</label>
									<select>
										<option value="">北京</option>
									</select>
									<select>
										<option value="">北京</option>
									</select>
									<select>
										<option value="">昌平</option>
									</select>
								</li>
								<li><label for=""><span>*</span>详细地址：</label><input type="text" class="xiangxi" /></li>
								<li><label for=""><span></span>邮政编码：</label><input type="text" class="youbian" /></li>
								<li><label for=""><span></span>电话：</label><input type="text" class="dianhua" /></li>
								<li><label for=""><span></span>手机号：</label><input type="text" class="shouji" /></li>
								<li><label for="">&nbsp;</label><input type="submit" value="增加收货地址" /></li>
							</ul>
						</from>
					</div>
				</div>
				<!-- 新增收货地址 End -->
			</div>
			<div class="clear"></div>
			</div>
		</div>
		<!-- 右边购物列表 End -->

	</div>
	<!-- 我的个人中心 End -->

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
	<script type="text/javascript">
	jQuery(function(){
		jQuery("#new_add_shdz_btn").toggle(function(){
			jQuery("#new_add_shdz_contents").show(500);
		},function(){
			jQuery("#new_add_shdz_contents").hide(500);
		});
	});
	</script>
</body>
</html>