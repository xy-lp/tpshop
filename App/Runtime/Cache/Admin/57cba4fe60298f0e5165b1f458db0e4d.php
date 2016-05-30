<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 修改会员注册项 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
</head>
<body style="cursor: auto;">

<h1>
    <span class="action-span"><a href="/index.php/Admin/Register/getlist">会员注册项设置</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加会员注册项 </span>
    <div style="clear:both"></div>
</h1>

<div class="main-div">
    <form action="/index.php/Admin/Register/edit/id/4" method="post" name="theForm" onsubmit="return validate()">
        <table width="100%">
            <tbody><tr>
                <td class="label">注册项名称: </td>
                <td><input type="text" name="reg_name" value="<?php echo ($list["reg_name"]); ?>" maxlength="20"><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td class="label">排序权值: </td>
                <td><input type="text" name="reg_order" value="<?php echo ($list["reg_order"]); ?>" maxlength="3" size="5"></td>
            </tr>
            <tr>
                <td class="label">是否显示: </td>
                <td><input type="radio" name="reg_display" value="1" <?php if($list['reg_display']==1): ?>checked="true"<?php endif; ?>>是&nbsp;&nbsp;&nbsp;<input type="radio" name="reg_display" value="0" <?php if($list['reg_display']==0): ?>checked="true"<?php endif; ?>>否</td>
            </tr>
            <tr>
                <td class="label">是否必填: </td>
                <td><input type="radio" name="reg_need" value="1" <?php if($list['reg_need']==1): ?>checked="true"<?php endif; ?>>是&nbsp;&nbsp;&nbsp;<input type="radio" name="reg_need" value="0" <?php if($list['reg_need']==0): ?>checked="true"<?php endif; ?>>否</td>
            </tr>
            <tr>
                <td class="label"><a href="javascript:showNotice('noticeAttrType');" title="点击此处查看提示信息"><img src="/Public/admin/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>注册项是否可选</td>
                <td>
                    <input type="radio" name="reg_type" value="0" checked="true" onclick="typecheck(0)" <?php if($list['reg_type']==0): ?>checked="true"<?php endif; ?>> 无属性
                    <input type="radio" name="reg_type" value="1" onclick="typecheck(1)" <?php if($list['reg_type']==1): ?>checked="true"<?php endif; ?>> 单选属性
                    <input type="radio" name="reg_type" value="2" onclick="typecheck(1)" <?php if($list['reg_type']==2): ?>checked="true"<?php endif; ?>> 复选属性          <br><span class="notice-span" style="display:block" id="noticeAttrType">选择"单选/复选属性"时，该注册项可选择,录入方式只能选择列表选择。选择"无属性"时，该注册项只能输入，录入方式可选择手工录入和文本框录入。</span>
                </td>
            </tr>
            <tr style="display: table-row ;">
                <td class="label">该项的录入方式：</td>
                <td>

                    <input type="radio" id="reg_hand" name="reg_input_type" value="0" checked="true" onclick="radioClicked(0)" <?php if($list['reg_input_type']==0): ?>checked="true"<?php endif; ?>>
                    手工录入
                    <input type="radio" id="reg_listing" name="reg_input_type" value="1" onclick="radioClicked(1)" <?php if($list['reg_input_type']==1): ?>checked="true"<?php endif; ?>>
                    从下面的列表中选择（一行代表一个可选值）
                    <input type="radio" id="reg_text" name="reg_input_type" value="2" onclick="radioClicked(0)" <?php if($list['reg_input_type']==2): ?>checked="true"<?php endif; ?>>
                    多行文本框        </td>
            </tr>
            <tr>
                <td class="label">可选值列表：</td>
                <td>
                    <textarea name="reg_input_val" cols="30" rows="5" disabled=""><?php echo ($list["reg_input_val"]); ?></textarea>
                </td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td align="left">
                    <input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
                    <input type="hidden" name="old_field_name" value="">
                    <input type="submit" value=" 确定 " class="button">
                    <input type="reset" value=" 重置 " class="button">
                </td>

            </tr>
            </tbody></table>
    </form>
</div>

<div id="footer">
    共执行 1 个查询，用时 0.011001 秒，Gzip 已禁用，内存占用 2.040 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

<script type="text/javascript">
    /**
     * 点击类型按钮时切换选项的禁用状态
     */
    function radioClicked(n)
    {
        document.forms['theForm'].elements["reg_input_val"].disabled = n > 0 ? false : true;
    }
    /*
     *点击是否可选按钮是切换录入方式状态
     */
    window.onload=function(){
        typecheck(0);
    }
    function typecheck(n){
        var hand=document.getElementById('reg_hand');
        var listing=document.getElementById('reg_listing')
        var text=document.getElementById('reg_text');
        var val=document.forms['theForm'].elements["reg_input_val"];
        if(n==0){
            hand.setAttribute('checked','checked');
            hand.removeAttribute("disabled");
            text.removeAttribute("disabled");
            listing.setAttribute('disabled',true);
            val.setAttribute('disabled',true);
        }
        else{
            listing.setAttribute('checked',true);
            hand.setAttribute('disabled',true);
            text.setAttribute('disabled',true);
            listing.removeAttribute("disabled");
            val.removeAttribute("disabled");
        }
    }
</script>

</body></html>