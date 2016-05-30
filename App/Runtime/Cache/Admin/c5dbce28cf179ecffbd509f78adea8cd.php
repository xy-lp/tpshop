<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ECSHOP 管理中心 - 会员等级 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Grade/add">添加会员等级</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 会员等级 </span>
    <div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">
    <!-- start ads list -->
    <div class="list-div" id="listDiv">

        <table cellspacing="1" id="list-table">
            <tbody><tr>
                <th>会员等级名称</th>
                <th>积分下限</th>
                <th>积分上限</th>
                <th>初始折扣率(%)</th>
                <th>特殊会员组</th>
                <th>显示价格</th>
                <th>操作</th>
            </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this,'edit_name', 1)"><?php echo ($vo["gd_name"]); ?></span></td>
                <td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_min_points', 1)"><?php echo ($vo["min_integral"]); ?></span></td>
                <td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_max_points', 1)"><?php echo ($vo["max_integral"]); ?></span></td>
                <td align="right" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_discount', 1)"><?php echo ($vo["discount"]); ?></span></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><img src="/Public/Admin/images/<?php echo $vo['special']==0?'no':'yes'?>.gif" onclick="listTable.toggle(this, 'toggle_special', 1)"></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><img src="/Public/Admin/images/<?php echo $vo['is_price']==0?'no':'yes'?>.gif" onclick="listTable.toggle(this, 'toggle_showprice', 1)"></td>
                <td align="center" style="background-color: rgb(255, 255, 255);">
                    <a href="/index.php/Admin/Grade/edit/id/<?php echo ($vo["id"]); ?>" title="编辑"><img src="/Public/admin/images/icon_edit.gif" width="16" height="16" border="0"></a>
                    <a href="/index.php/Admin/Grade/del/id/<?php echo ($vo["id"]); ?>" onclick="listTable.remove(1, '您确认要删除这条记录吗?')" title="移除"><img src="/Public/Admin/images/icon_drop.gif" border="0" height="16" width="16"></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody></table>

    </div>
    <!-- end user ranks list -->
</form>
<div id="footer">
    共执行 2 个查询，用时 0.010001 秒，Gzip 已禁用，内存占用 2.048 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>



</body></html>