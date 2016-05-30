<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 自定义导航栏 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">

</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Nav/getlist">返回列表</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 自定义导航栏 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form action="/index.php/Admin/Nav/add" method="post" name="form" onsubmit="return checkForm();">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tbody><tr>
                <td>系统内容</td> <td>
                <select onchange="add_main(this.value);" name="nav_pid" id="nav_pid">
                    <option value="0">---顶级---</option>
        <?php if(is_array($nav_data)): $i = 0; $__LIST__ = $nav_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ndvo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($ndvo["nav_id"]); ?>"><?php echo str_repeat('--',$ndvo['deep']),$ndvo['nav_name']?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
            </tr>
            <tr>
                <td>名称</td> <td><input type="text" name="nav_name" value="" id="nav_name" size="40" onkeypress="javascript:key();"></td>
            </tr>
            <tr>
                <td><a href="javascript:showNotice('notice_url');" title="如果是本站的网址，可缩写为与商城根目录相对地址，如index.php；<br>其他情况都应该输入完整的网址，如http://www.ecshop.com/">
                    <img src="/Public/Admin/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">链接地址</a></td>
                <td><input type="text" name="nav_url" value="" id="nav_url" size="40" onkeypress="javascript:key();"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <span class="notice-span" style="display:block" id="notice_url">如果是本站的网址，可缩写为与商城根目录相对地址，如index.php；<br>其他情况都应该输入完整的网址，如http://www.ecshop.com/</span></td>
            </tr>
            <tr>
                <td>排序</td> <td><input type="text" name="nav_order" value="" size="40"></td>
            </tr>
            <tr>
                <td>是否显示</td> <td><select name="is_show">
                <option value="1">是</option><option value="0">否</option>
            </select></td>
            </tr>
            <tr>
                <td>是否新窗口</td> <td><select name="open_new">
                <option value="0">否</option><option value="1">是</option>
            </select></td>
            </tr>
            <tr>
                <td>位置</td> <td><select name="location">
                <option value="top">顶部</option><option value="middle">中间</option><option value="bottom">底部 </option>
            </select></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="step" value="2">
                    <input type="hidden" name="act" value="add">
                    <input type="submit" class="button" name="Submit" value=" 确定 ">
                </td>
            </tr>
            </tbody></table>
    </form>
</div>

<div id="footer">
    共执行 1 个查询，用时 0.013001 秒，Gzip 已禁用，内存占用 2.189 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>