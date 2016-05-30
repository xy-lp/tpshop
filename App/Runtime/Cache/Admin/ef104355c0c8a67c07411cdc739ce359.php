<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 添加订单 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">

</head>
<body>

<h1>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加订单 </span>
    <div style="clear:both"></div>
</h1>
<form name="theForm" action="order.php?act=step_post&amp;step=user&amp;order_id=0&amp;step_act=add" method="post" onsubmit="return checkUser()">
    <div class="main-div" style="padding: 15px">
        <label><input type="radio" name="anonymous" value="1" checked=""> 匿名用户</label><br>
        <label><input type="radio" name="anonymous" value="0" id="user_useridname"> 按会员编号或会员名搜索</label>
        <input name="keyword" type="text" value="">
        <input type="button" class="button" name="search" value=" 搜索 " onclick="searchUser();">
        <select name="user"></select>
        <p><strong>注意：</strong>搜索结果只显示前20条记录，如果没有找到相应会员，请更精确地查找。另外，如果该会员是从论坛注册的且没有在商城登录过，也无法找到，需要先在商城登录。</p>
    </div>
    <div style="text-align:center">
        <p>
            <input name="submit" type="submit" class="button" value="下一步">
            <input type="button" value="取消" class="button" onclick="location.href='order.php?act=process&amp;func=cancel_order&amp;order_id=0&amp;step_act=add'">
        </p>
    </div>
</form>


<div id="footer">
    共执行 1 个查询，用时 0.026001 秒，Gzip 已禁用，内存占用 4.603 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>