<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 角色管理 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">

</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Role/add">添加角色</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 角色管理 </span>
    <div style="clear:both"></div>
</h1>
<script type="text/javascript" src="/Public/Admin/js/utils.js"></script><script type="text/javascript" src="js/listtable.js"></script>
<div class="list-div" id="listDiv">

    <table cellspacing="1" cellpadding="3" id="list-table">
        <tbody><tr>
            <th>角色名</th>
            <th>角色描述</th>
            <th>角色权限</th>
            <th>操作</th>
        </tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td width="10%"><?php echo ($vo["role_name"]); ?></td>
        <td width="25%"><?php echo ($vo["role_desc"]); ?></td>
        <td width="50%"><?php echo ($vo["priv_list"]); ?></td>
        <td width="15%" align="center" style="background-color: rgb(255, 255, 255);">
            <a href="/index.php/Admin/Role/privlist/id/<?php echo ($vo["id"]); ?>" title="分派权限"><img src="/Public/Admin/images/icon_priv.gif" border="0" height="16" width="16"></a>&nbsp;&nbsp;
            <a href="/index.php/Admin/Role/edit/id/<?php echo ($vo["id"]); ?>" title="编辑"><img src="/Public/Admin/images/icon_edit.gif" border="0" height="16" width="16"></a>&nbsp;&nbsp;
            <a href="/index.php/Admin/Role/del/id/<?php echo ($vo["id"]); ?>" onclick="listTable.remove(1, '您确认要删除这条记录吗?')" title="移除"><img src="/Public/Admin/images/icon_drop.gif" border="0" height="16" width="16"></a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody></table>

</div>

<div id="footer">
    共执行 2 个查询，用时 0.010000 秒，Gzip 已禁用，内存占用 2.037 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>