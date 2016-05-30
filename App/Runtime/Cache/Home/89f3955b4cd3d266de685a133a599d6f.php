<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>商品详细页面</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_list.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_goods.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/shop_goods.js" ></script>
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
                                                <?php if(is_array($cat_three)): $i = 0; $__LIST__ = $cat_three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($vo2['parent_id'] == $vo1['cat_id']): ?><a href="/index.php/Home/Index/goodslist/id/<?php echo ($vo2["cat_id"]); ?>"><?php echo ($vo2["cat_name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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


	
	<!-- Goods Body -->
	<div class="shop_goods_bd clear">

		<!-- 商品展示 -->
		<div class="shop_goods_show">
			<div class="shop_goods_show_left">
				<!-- 京东商品展示 -->
				<link rel="stylesheet" href="/Public/Home/css/shop_goodPic.css" type="text/css" />
				<script type="text/javascript" src="/Public/Home/js/shop_goodPic_base.js"></script>
				<script type="text/javascript" src="/Public/Home/js/lib.js"></script>
				<script type="text/javascript" src="/Public/Home/js/163css.js"></script>
				<div id="preview">
					<div class=jqzoom id="spec-n1" onClick="window.open('/')"><IMG height="350" src="/Public/Uploads/<?php echo ($good["image_path"]); ?>" jqimg="/Public/Uploads/<?php echo ($good["image_path"]); ?>" width="350">
						</div>
						<div id="spec-n5">
							<div class=control id="spec-left">
								<img src="/Public/Home/images/left.gif" />
							</div>
							<div id="spec-list">
								<ul class="list-h">
								<li><img src="/Public/Uploads/<?php echo ($good["image_path"]); ?>">
				<?php if(is_array($album)): $i = 0; $__LIST__ = $album;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$avo): $mod = ($i % 2 );++$i;?><li><img src="/Public/Uploads/<?php echo ($avo["album_thumb"]); ?>"> </li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
							<div class=control id="spec-right">
								<img src="/Public/Home/images/right.gif" />
							</div>
							
					    </div>
					</div>

					<SCRIPT type=text/javascript>
						$(function(){			
						   $(".jqzoom").jqueryzoom({
								xzoom:400,
								yzoom:400,
								offset:10,
								position:"right",
								preload:1,
								lens:1
							});
							$("#spec-list").jdMarquee({
								deriction:"left",
								width:350,
								height:56,
								step:2,
								speed:4,
								delay:10,
								control:true,
								_front:"#spec-right",
								_back:"#spec-left"
							});
							$("#spec-list img").bind("mouseover",function(){
								var src=$(this).attr("src");
								$("#spec-n1 img").eq(0).attr({
									src:src.replace("\/n5\/","\/n1\/"),
									jqimg:src.replace("\/n5\/","\/n0\/")
								});
								$(this).css({
									"border":"2px solid #ff6600",
									"padding":"1px"
								});
							}).bind("mouseout",function(){
								$(this).css({
									"border":"1px solid #ccc",
									"padding":"2px"
								});
							});				
						})
						</SCRIPT>
					<!-- 京东商品展示 End -->

			</div>
			<div class="shop_goods_show_right">
				<form action="/index.php/Home/Cart/addCart" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
				<ul>
					<li>
						<strong style="font-size:14px; font-weight:bold;"><?php echo ($good["goods_name"]); ?></strong>
					</li>
					<li>
						<label>价格：</label>
						<span><strong><?php echo ($good["shop_price"]); ?></strong>元</span>
					</li>
					<li>
						<label>运费：</label>
						<span>卖家承担运费</span>
					</li>
					<li>
						<label>累计售出：</label>
						<span>99件</span>
					</li>
	<?php if(is_array($radiodata)): $i = 0; $__LIST__ = $radiodata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rdvo): $mod = ($i % 2 );++$i;?><li>
			<label><?php echo ($rdvo[0]["att_name"]); ?>:</label>
			<?php foreach($rdvo as $v1){?>
					<span>
							<input name="attr[<?php echo $v1['attr_id']?>]" value="<?php echo $v1['id']?>" id="spec_value_227" checked="checked" onclick="changePrice()" type="radio" />
							<?php echo $v1['attr_value'] ?>
					</span>
			<?php } ?>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
					<li class="goods_num">
						<label>购买数量：</label>
						<span><a class="good_num_jian" id="good_num_jian" href="javascript:void(0);"></a><input type="text" value="1" name="good_nums" id="good_nums" class="good_nums" /><a href="javascript:void(0);" id="good_num_jia" class="good_num_jia"></a>(当前库存<?php echo ($good["goods_number"]); ?>件)</span>
					</li>
					<li style="padding:20px 0;">
						<label>&nbsp;</label>
						<input type="hidden" name="goods_id" id="goods_id" value="<?php echo ($good["id"]); ?>"/>
						<span><a href="javascript:" onclick="addCartSubmit()" class="goods_sub goods_sub_gou" >加入购物车</a></span>
					</li>
				</ul>
			</form>
		</div>
			<script type="text/javascript">
				function addCartSubmit(){
					var forms=document.getElementById('ECS_FORMBUY');
					forms.submit();
				}
			</script>
		<!-- 商品展示 End -->

		<div class="clear mt15"></div>
		<!-- Goods Left -->
		<div class="shop_bd_list_left clearfix">
			<!-- 左边商品分类 -->
			<div class="shop_bd_list_bk clearfix">
<div class="title">商品分类</div>
<div class="contents clearfix">
    <dl class="shop_bd_list_type_links clearfix">
        <dt><strong><?php echo ($cat_parent["cat_name"]); ?></strong></dt>
        <dd>
            <?php if(is_array($cat_child)): $i = 0; $__LIST__ = $cat_child;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span><a href="/index.php/Home/Index/goodslist/id/<?php echo ($vo["cat_id"]); ?>"><?php echo ($vo["cat_name"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
</div>
</div>
			<!-- 左边商品分类 End -->

			<!-- 热卖推荐商品 -->
			<!-- 热卖推荐商品 -->
<div class="shop_bd_list_bk clearfix">
    <div class="title">热卖推荐商品</div>
    <div class="contents clearfix">
        <ul class="clearfix">
            <?php if(is_array($best_good)): $i = 0; $__LIST__ = $best_good;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bgvo): $mod = ($i % 2 );++$i;?><li class="clearfix">
                    <div class="goods_name"><a href="/index.php/Home/Index/good/id/<?php echo ($bgvo["id"]); ?>"><?php echo ($bgvo["goods_name"]); ?></a></div>
                    <div class="goods_pic"><span class="goods_price">¥ <?php echo ($bgvo["shop_price"]); ?> </span><a href="/index.php/Home/Index/good/id/<?php echo ($bgvo["id"]); ?>"><img src="/Public/Uploads/<?php echo ($bgvo["image_thumb"]); ?>" /></a></div>
                    <div class="goods_xiaoliang">
                        <span class="goods_xiaoliang_link"><a href="/index.php/Home/Index/good/id/<?php echo ($bgvo["id"]); ?>">去看看</a></span>
                        <span class="goods_xiaoliang_nums">已销售<strong>99</strong>笔</span>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>
<!-- 热卖推荐商品 -->
			<!-- 热卖推荐商品 -->
			<div class="clear"></div>

			<!-- 浏览过的商品 -->
			<div class="shop_bd_list_bk clearfix">
    <div class="title">浏览过的商品</div>
    <div class="contents clearfix">
        <ul class="clearfix">
            <?php if(is_array($Browse)): $i = 0; $__LIST__ = $Browse;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bwvo): $mod = ($i % 2 );++$i;?><li class="clearfix">
                    <div class="goods_name"><a href="/index.php/Home/Index/good/id/<?php echo ($bwvo["id"]); ?>"><?php echo ($bwvo["goods_name"]); ?></a></div>
                    <div class="goods_pic"><span class="goods_price">¥ <?php echo ($bwvo["shop_price"]); ?> </span><a href="/index.php/Home/Index/good/id/<?php echo ($bwvo["id"]); ?>"><img src="/Public/Uploads/<?php echo ($bwvo["image_thumb"]); ?>" /></a></div>
                    <div class="goods_xiaoliang">
                        <span class="goods_xiaoliang_link"><a href="/index.php/Home/Index/good/id/<?php echo ($bwvo["id"]); ?>">去看看</a></span>
                        <span class="goods_xiaoliang_nums">已销售<strong>99</strong>笔</span>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
			<!-- 浏览过的商品 -->

		</div>
		<!-- Goods Left End -->

		<!-- 商品详情 -->
		<script type="text/javascript" src="/Public/Home/js/shop_goods_tab.js"></script>
		<div class="shop_goods_bd_xiangqing clearfix">
			<div class="shop_goods_bd_xiangqing_tab">
				<ul>
					<li id="xiangqing_tab_1" onmouseover="shop_goods_easytabs('1', '1');" onfocus="shop_goods_easytabs('1', '1');" onclick="return false;"><a href=""><span>商品详情</span></a></li>
					<li id="xiangqing_tab_2" onmouseover="shop_goods_easytabs('1', '2');" onfocus="shop_goods_easytabs('1', '2');" onclick="return false;"><a href=""><span>商品评论</span></a></li>
					<li id="xiangqing_tab_3" onmouseover="shop_goods_easytabs('1', '3');" onfocus="shop_goods_easytabs('1', '3');" onclick="return false;"><a href=""><span>商品咨询</span></a></li>
				</ul>
			</div>
			<div class="shop_goods_bd_xiangqing_content clearfix">
				<div id="xiangqing_content_1" class="xiangqing_contents clearfix">
					<p><!--商品详情&#45;&#45;&#45;&#45;11111-->
					<?php if(is_array($onedata)): $i = 0; $__LIST__ = $onedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$odvo): $mod = ($i % 2 );++$i; echo ($odvo["att_name"]); ?>:<?php echo ($odvo["attr_value"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
					</p>
				</div>
				<div id="xiangqing_content_2" class="xiangqing_contents clearfix">
					<p>商品评论----22222</p>
				</div>

				<div id="xiangqing_content_3" class="xiangqing_contents clearfix">
					<p>商品自诩---3333</p>
				</div>
			</div>
		</div>
		<!-- 商品详情 End -->

	</div>
	<!-- Goods Body End -->

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