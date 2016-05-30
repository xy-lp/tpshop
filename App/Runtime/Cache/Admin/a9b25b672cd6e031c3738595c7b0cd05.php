<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 添加会员 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">

</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Member/getlist">会员列表</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加会员 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form method="post" action="/index.php/Admin/member/add" name="theForm" onsubmit="return validate()">
        <table width="100%">
            <tbody><tr>
                <td class="label">会员名称:</td>
                <td><input type="text" name="username" maxlength="60" size="30" value=""><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td class="label">邮件地址:</td>
                <td><input type="text" name="email" maxlength="60" size="30" value=""><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td class="label">登录密码:</td>
                <td><input type="password" name="password" maxlength="20" size="30"><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td class="label">确认密码:</td>
                <td><input type="password" name="confirm_password" maxlength="30" size="30"><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td class="label">会员等级:</td>
                <td><select name="user_rank">
                    <option value="0">非特殊等级</option>
    <?php if(is_array($grade_list)): $i = 0; $__LIST__ = $grade_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gd): $mod = ($i % 2 );++$i;?><option value="<?php echo ($gd["id"]); ?>">--<?php echo ($gd["gd_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select></td>
            </tr>
<?php if(is_array($reg_list)): $i = 0; $__LIST__ = $reg_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$reg): $mod = ($i % 2 );++$i;?><tr>
                <td class="label"><?php echo ($reg["reg_name"]); ?>:</td>
                <td>
                    <input name="reg_name" type="text" size="30" class="inputBg" value="">

                    <!-- <?php if($reg['reg_type']==0): if($reg['reg_input_type']==0): ?><input name="reg_name" type="text" size="30" class="inputBg" value="">
                             <?php else: ?>
                                 <textarea name="reg_name" cols="30" rows="5"></textarea><?php endif; ?>
                     <?php elseif($reg['reg_type']==1): ?>
                             <?php
 $str=$reg['reg_input_val']; $arr=explode("\n",$str); foreach($arr as $v){ ?>
                         <input name="reg_name" type="text" size="30" class="inputBg" value="">
                         <?php
 } ?>
                     <?php else: endif; ?>-->

                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value=" 确定 " class="button">
                    <input type="reset" value=" 重置 " class="button">
                    <input type="hidden" name="act" value="insert">
                    <input type="hidden" name="id" value="">    </td>
            </tr>
            </tbody></table>

    </form>
</div>
<div id="footer">
    共执行 3 个查询，用时 0.008001 秒，Gzip 已禁用，内存占用 2.224 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>