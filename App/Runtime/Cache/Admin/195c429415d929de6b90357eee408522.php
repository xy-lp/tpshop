<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 修改会员等级 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
    
</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Grade/getlist">会员等级</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加会员等级 </span>
    <div style="clear:both"></div>
</h1>

<div class="main-div">
    <form action="/index.php/Admin/Grade/edit/id/4" method="post" name="theForm" onsubmit="return validate()">
        <table width="100%">
            <tbody><tr>
                <td class="label">会员等级名称: </td>
                <td><input type="text" name="gd_name" value="<?php echo ($list["gd_name"]); ?>" maxlength="20"><span class="require-field">*</span></td>
            </tr>
            <tr>
                <td class="label">积分下限: </td>
                <td><input type="text" name="min_integral" value="<?php echo ($list["min_integral"]); ?>" size="10" maxlength="20"></td>
            </tr>
            <tr>
                <td class="label">积分上限: </td>
                <td><input type="text" name="max_integral" value="<?php echo ($list["max_integral"]); ?>" size="10" maxlength="20"></td>
            </tr>
            <tr>
                <td class="label"></td>
                <td>
                    <input type="checkbox" name="is_price" value="1" <?php if($list['is_price']==1): ?>checked="true"<?php endif; ?>> 在商品详情页显示该会员等级的商品价格</td>
            </tr>
            <tr>
                <td class="label"></td>
                <td>
                    <input type="checkbox" name="special" value="1" <?php if($list['special']==1): ?>checked="true"<?php endif; ?> onclick="javascript:doSpecial()"> 特殊会员组 <a href="javascript:showNotice('notice_special');" title="点击此处查看提示信息"><img src="/Public/Admin/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>
                    <br><span class="notice-span" style="display:block" id="notice_special">特殊会员组的会员不会随着积分的变化而变化。</span></td>
            </tr>
            <tr>
                <td class="label"><a href="javascript:showNotice('notice_discount');" title="点击此处查看提示信息"><img src="/Public/Admin/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>初始折扣率: </td>
                <td><input type="text" name="discount" value="<?php echo ($list["discount"]); ?>" size="10" maxlength="20"><span class="require-field">*</span>    <br><span class="notice-span" style="display:block" id="notice_discount">请填写为0-100的整数,如填入80，表示初始折扣率为8折</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
                    <input type="submit" value=" 确定 " class="button">
                    <input type="reset" value=" 重置 " class="button">
                </td>
            </tr>
            </tbody></table>
    </form>
</div>
<script type="text/javascript" src="/Public/Admin/js/utils.js"></script><script type="text/javascript" src="/Public/Admin/js/validator.js"></script>

<div id="footer">
    共执行 1 个查询，用时 0.008001 秒，Gzip 已禁用，内存占用 2.065 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

<script language="JavaScript">
    document.onmousemove=function(e)
            {
                var obj = Utils.srcElement(e);
                if (typeof(obj.onclick) == 'function' && obj.onclick.toString().indexOf('listTable.edit') != -1)
                {
                    obj.title = '点击修改内容';
                    obj.style.cssText = 'background: #278296;';
                    obj.onmouseout = function(e)
                    {
                        this.style.cssText = '';
                    }
                }
                else if (typeof(obj.href) != 'undefined' && obj.href.indexOf('listTable.sort') != -1)
                {
                    obj.title = '点击对列表排序';
                }
            }
            <!--


    var MyTodolist;
    function showTodoList(adminid)
    {
        if(!MyTodolist)
        {
            var global = $import("/Public/Admin/js/global.js","js");
            global.onload = global.onreadystatechange= function()
            {
                if(this.readyState && this.readyState=="loading")return;
                var md5 = $import("/Public/Admin/js/md5.js","js");
                md5.onload = md5.onreadystatechange= function()
                {
                    if(this.readyState && this.readyState=="loading")return;
                    var todolist = $import("/Public/Admin/js/todolist.js","js");
                    todolist.onload = todolist.onreadystatechange = function()
                    {
                        if(this.readyState && this.readyState=="loading")return;
                        MyTodolist = new Todolist();
                        MyTodolist.show();
                    }
                }
            }
        }
        else
        {
            if(MyTodolist.visibility)
            {
                MyTodolist.hide();
            }
            else
            {
                MyTodolist.show();
            }
        }
    }

    if (Browser.isIE)
    {
        onscroll = function()
        {
            //document.getElementById('calculator').style.top = document.body.scrollTop;
            document.getElementById('popMsg').style.top = (document.body.scrollTop + document.body.clientHeight - document.getElementById('popMsg').offsetHeight) + "px";
        }
    }

    if (document.getElementById("listDiv"))
    {
        document.getElementById("listDiv").onmouseover = function(e)
        {
            obj = Utils.srcElement(e);

            if (obj)
            {
                if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
                else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
                else return;

                for (i = 0; i < row.cells.length; i++)
                {
                    if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#F4FAFB';
                }
            }

        }

        document.getElementById("listDiv").onmouseout = function(e)
        {
            obj = Utils.srcElement(e);

            if (obj)
            {
                if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
                else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
                else return;

                for (i = 0; i < row.cells.length; i++)
                {
                    if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#FFF';
                }
            }
        }

        document.getElementById("listDiv").onclick = function(e)
        {
            var obj = Utils.srcElement(e);

            if (obj.tagName == "INPUT" && obj.type == "checkbox")
            {
                if (!document.forms['listForm'])
                {
                    return;
                }
                var nodes = document.forms['listForm'].elements;
                var checked = false;

                for (i = 0; i < nodes.length; i++)
                {
                    if (nodes[i].checked)
                    {
                        checked = true;
                        break;
                    }
                }

                if(document.getElementById("btnSubmit"))
                {
                    document.getElementById("btnSubmit").disabled = !checked;
                }
                for (i = 1; i <= 10; i++)
                {
                    if (document.getElementById("btnSubmit" + i))
                    {
                        document.getElementById("btnSubmit" + i).disabled = !checked;
                    }
                }
            }
        }

    }

    //-->
</script>

</body></html>