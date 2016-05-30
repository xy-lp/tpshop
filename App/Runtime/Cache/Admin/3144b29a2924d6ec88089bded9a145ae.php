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
<form method="POST" action="/index.php/Admin/Role/privlist/id/8" name="theFrom">
    <div class="list-div">
        <table cellspacing="1" id="list-table">
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td width="18%" valign="top" class="first-cell">
                        <input name="action_code[]" type="checkbox" value="<?php echo ($vo["id"]); ?>" onclick="check('4,5',this);" class="checkbox" <?php foreach($rp as $v){if($vo['id']==$v['priv_id'])echo 'checked="checked"';}?>><?php echo ($vo["priv_name"]); ?></td>
                    <td>
                        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($vo['id'] == $vo1['parent_pid']): ?><volist name="child" id="vo2">
                                    <?php if($vo1['id'] == $vo2['parent_pid']): ?><div style="width:200px;float:left;">
                                            <label for="<?php echo ($vo2["id"]); ?>"><input type="checkbox" name="action_code[]" value="<?php echo ($vo2["id"]); ?>" id="<?php echo ($vo2["id"]); ?>" class="checkbox" onclick="checkrelevance('', <?php echo ($vo2["id"]); ?>)" title="" <?php foreach($rp as $v){if($vo2['id']==$v['priv_id'])echo 'checked="checked"';}?>>
                                                <?php echo ($vo1["priv_name"]); ?>/<?php echo ($vo2["priv_name"]); ?></label>
                                        </div>
                                        <?php else: ?>
                                        <div style="width:200px;float:left;">
                                            <label for="<?php echo ($vo1["id"]); ?>"><input type="checkbox" name="action_code[]" value="<?php echo ($vo1["id"]); ?>" id="<?php echo ($vo1["id"]); ?>" class="checkbox" onclick="checkrelevance('',<?php echo ($vo1["id"]); ?>)" title="" <?php foreach($rp as $v){if($vo1['id']==$v['priv_id'])echo 'checked="checked"';}?>>
                                                <?php echo ($vo1["priv_name"]); ?></label>
                                        </div><?php endif; ?>
                                    <volist><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>


            <td align="center" colspan="2">
                <input type="checkbox" name="checkall" value="checkbox" onclick="checkAll(this.form, this);" class="checkbox">全选      &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="Submit" value=" 保存 " class="button">&nbsp;&nbsp;&nbsp;
                <input type="reset" value=" 重置 " class="button">
                <input type="hidden" name="id" value="<?php echo ($id); ?>">
            </td>
            </tr>
            </tbody></table>
    </div>
</form>


<script language="javascript">
    function checkAll(frm, checkbox)
    {
        for (i = 0; i < frm.elements.length; i++)
        {
            if (frm.elements[i].name == 'action_code[]' || frm.elements[i].name == 'action_code[]')
            {
                frm.elements[i].checked = checkbox.checked;
            }
        }
    }

    function check(list, obj)
    {
        var frm = obj.form;

        for (i = 0; i < frm.elements.length; i++)
        {
            if (frm.elements[i].name == "action_code[]")
            {
                var regx = new RegExp(frm.elements[i].value + "(?!_)", "i");

                if (list.search(regx) > -1) {frm.elements[i].checked = obj.checked;}
            }
        }
    }

    function checkrelevance(relevance, priv_list)
    {
        if(document.getElementById(priv_list).checked && relevance != '')
        {
            document.getElementById(relevance).checked=true;
        }
        else
        {
            var ts=document.getElementsByTagName("input");

            for (var i=0; i<ts.length;i++)
            {
                var text=ts[i].getAttribute("title");

                if( text == priv_list)
                {
                    document.getElementById(ts[i].value).checked = false;
                }
            }
        }
    }
</script>

<div id="footer">
    共执行 3 个查询，用时 0.013000 秒，Gzip 已禁用，内存占用 2.123 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
<script type="text/javascript" src="/Public/Admin/js/utils.js"></script><!-- 新订单提示信息 -->

</body></html>