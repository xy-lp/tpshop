<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 添加角色 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
    
</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Role/getlist">角色列表</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加角色 </span>
    <div style="clear:both"></div>
</h1>
<form method="POST" action="/index.php/Admin/Role/edit/id/8" name="theFrom">
    <div class="list-div">
        <table width="100%">
            <tbody><tr>
                <td class="label">角色名</td>
                <td>
                    <input type="text" name="role_name" maxlength="20" value="<?php echo ($role["role_name"]); ?>" size="34"><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td class="label">角色描述</td>
                <td>
                    <textarea name="role_desc" cols="31" rows="6"><?php echo ($role["role_desc"]); ?></textarea>
                    <span class="require-field">*</span></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="Submit" value=" 保存 " class="button">&nbsp;&nbsp;&nbsp;
                    <input type="reset" value=" 重置 " class="button">
                    <input type="hidden" name="id" value="<?php echo ($role["id"]); ?>">
                </td>
            </tr>
            </tbody></table>
    </div>
</form>

<div id="footer">
    共执行 3 个查询，用时 0.013000 秒，Gzip 已禁用，内存占用 2.123 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
<script type="text/javascript" src="/Public/Admin/js/utils.js"></script><!-- 新订单提示信息 -->

</body></html>