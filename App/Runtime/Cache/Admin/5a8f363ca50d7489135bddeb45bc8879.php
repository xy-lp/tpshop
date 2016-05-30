<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 会员注册项设置 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Register/add">添加会员注册项</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 会员注册项设置 </span>
    <div style="clear:both"></div>
</h1>
<form method="post" action="" name="listForm">
    <!-- start reg_fiedls list -->
    <div class="list-div" id="listDiv">

        <table cellspacing="1" id="list-table">
            <tbody><tr>
                <th>会员注册项名称</th>
                <th>排序权值</th>
                <th>是否显示</th>
                <th>是否必填</th>
                <th>属性值的录入方式</th>
                <th>可选值列表</th>
                <th>操作</th>
            </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td class="first-cell" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this,'edit_name', 1)"><?php echo ($vo["reg_name"]); ?></span></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this,'edit_order', 1)"><?php echo ($vo["reg_order"]); ?></span></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><img src="/Public/Admin/images/<?php echo $vo['reg_display']==1?'yes':'no'?>.gif" onclick="listTable.toggle(this, 'toggle_dis', 1)"></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><img src="/Public/Admin/images/<?php echo $vo['reg_need']==1?'yes':'no'?>.gif" onclick="listTable.toggle(this, 'toggle_need', 1)"></td>
                <td nowrap="true" valign="top"><span>
                  <?php if($vo['reg_input_type']==0): ?>手工录入
                      <?php elseif($vo['reg_input_type']==1): ?>从列表中选择
                      <?php else: ?>多行文本框<?php endif; ?>
                </span></td>
                <td valign="top"><span><?php echo ($vo["reg_input_val"]); ?></span></td>
                <td align="center" style="background-color: rgb(255, 255, 255);">
                    <a href="/index.php/Admin/Register/edit/id/<?php echo ($vo["id"]); ?>" title="编辑"><img src="/Public/admin/images/icon_edit.gif" width="16" height="16" border="0"></a>
                    <a href="/index.php/Admin/Register/del/id/<?php echo ($vo["id"]); ?>" onclick="listTable.remove(1, '您确认要删除这条记录吗?')" title="移除"><img src="/Public/Admin/images/icon_drop.gif" border="0" height="16" width="16"></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody></table>

    </div>
    <!-- end reg_fiedls list -->
</form>

<div id="footer">
    共执行 2 个查询，用时 0.010000 秒，Gzip 已禁用，内存占用 2.027 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>