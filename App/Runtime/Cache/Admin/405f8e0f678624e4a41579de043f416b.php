<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 商品回收站 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/Admin/js/transport.js"></script><script type="text/javascript" src="js/common.js"></script><script language="JavaScript">
    <!--
    // 这里把JS用到的所有语言都赋值到这里
    var process_request = "正在处理您的请求...";
    var todolist_caption = "记事本";
    var todolist_autosave = "自动保存";
    var todolist_save = "保存";
    var todolist_clear = "清除";
    var todolist_confirm_save = "是否将更改保存到记事本？";
    var todolist_confirm_clear = "是否清空内容？";
    var goods_name_not_null = "商品名称不能为空。";
    var goods_cat_not_null = "商品分类必须选择。";
    var category_cat_not_null = "分类名称不能为空";
    var brand_cat_not_null = "品牌名称不能为空";
    var goods_cat_not_leaf = "您选择的商品分类不是底级分类，请选择底级分类。";
    var shop_price_not_null = "本店售价不能为空。";
    var shop_price_not_number = "本店售价不是数值。";
    var select_please = "请选择...";
    var button_add = "添加";
    var button_del = "删除";
    var spec_value_not_null = "规格不能为空";
    var spec_price_not_number = "加价不是数字";
    var market_price_not_number = "市场价格不是数字";
    var goods_number_not_int = "商品库存不是整数";
    var warn_number_not_int = "库存警告不是整数";
    var promote_not_lt = "促销开始日期不能大于结束日期";
    var promote_start_not_null = "促销开始时间不能为空";
    var promote_end_not_null = "促销结束时间不能为空";
    var drop_img_confirm = "您确实要删除该图片吗？";
    var batch_no_on_sale = "您确实要将选定的商品下架吗？";
    var batch_trash_confirm = "您确实要把选中的商品放入回收站吗？";
    var go_category_page = "本页数据将丢失，确认要去商品分类页添加分类吗？";
    var go_brand_page = "本页数据将丢失，确认要去商品品牌页添加品牌吗？";
    var volume_num_not_null = "请输入优惠数量";
    var volume_num_not_number = "优惠数量不是数字";
    var volume_price_not_null = "请输入优惠价格";
    var volume_price_not_number = "优惠价格不是数字";
    var cancel_color = "无样式";
    //-->
</script>
</head>
<body style="cursor: auto;">

<h1>
    <span class="action-span"><a href="goods.php?act=list">商品列表</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品回收站 </span>
    <div style="clear:both"></div>
</h1>
<script type="text/javascript" src="/Public/Admin/js/utils.js"></script><script type="text/javascript" src="js/listtable.js"></script>
<!-- 商品搜索 -->
<!-- $Id: goods_search.htm 16790 2009-11-10 08:56:15Z wangleisvn $ -->
<div class="form-div">
    <form action="javascript:searchGoods()" name="searchForm">
        <img src="/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
        <!-- 关键字 -->
        关键字 <input type="text" name="keyword" size="15">
        <input type="submit" value=" 搜索 " class="button">
    </form>
</div>


<script language="JavaScript">
    function searchGoods()
    {
        listTable.filter['keyword'] = Utils.trim(document.forms['searchForm'].elements['keyword'].value);
        listTable.filter['page'] = 1;
        listTable.loadList();
    }
</script>

<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
    <!-- start goods list -->
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tbody><tr>
                <th>
                    <input onclick="listTable.selectAll(this, &quot;checkboxes&quot;)" type="checkbox">
                    <a href="javascript:listTable.sort('goods_id');" title="点击对列表排序">编号</a><img src="/Public/Admin/images/sort_desc.gif">    </th>
                <th><a href="javascript:listTable.sort('goods_name');">商品名称</a></th>
                <th><a href="javascript:listTable.sort('goods_sn');">货号</a></th>
                <th><a href="javascript:listTable.sort('shop_price');">价格</a></th>
                <th>操作</th>
            </tr><tr>
            </tr><tr><td class="no-records" colspan="10" style="background-color: rgb(255, 255, 255);">没有找到任何记录</td></tr>
            </tbody></table>
        <!-- end goods list -->

        <!-- 分页 -->
        <table id="page-table" cellspacing="0">
            <tbody><tr>
                <td style="background-color: rgb(255, 255, 255);">
                    <input type="hidden" name="act" value="batch">
                    <select name="type" id="selAction" onchange="changeAction()">
                        <option value="">请选择...</option>
                        <option value="restore">还原</option>
                        <option value="drop">移除</option>
                    </select>
                    <select name="target_cat" style="display:none" onchange="checkIsLeaf(this)"><option value="0">请选择...</option></select>
                    <input type="submit" value=" 确定 " id="btnSubmit" name="btnSubmit" class="button" disabled="">
                </td>
                <td align="right" nowrap="true" style="background-color: rgb(255, 255, 255);">
                    <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
                    <div id="turn-page">
                        总计  <span id="totalRecords">0</span>
                        个记录分为 <span id="totalPages">1</span>
                        页当前第 <span id="pageCurrent">1</span>
                        页，每页 <input type="text" size="3" id="pageSize" value="15" onkeypress="return listTable.changePageSize(event)">
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
              <option value="1">1</option>          </select>
        </span>
                    </div>
                </td>
            </tr>
            </tbody></table>
    </div>

</form>

<script language="JavaScript">
    listTable.recordCount = 0;
    listTable.pageCount = 1;

    listTable.filter.cat_id = '0';
    listTable.filter.intro_type = '';
    listTable.filter.is_promote = '0';
    listTable.filter.stock_warning = '0';
    listTable.filter.brand_id = '0';
    listTable.filter.keyword = '';
    listTable.filter.suppliers_id = '';
    listTable.filter.is_on_sale = '';
    listTable.filter.sort_by = 'goods_id';
    listTable.filter.sort_order = 'DESC';
    listTable.filter.extension_code = '';
    listTable.filter.is_delete = '1';
    listTable.filter.real_goods = '-1';
    listTable.filter.record_count = '0';
    listTable.filter.page_size = '15';
    listTable.filter.page = '1';
    listTable.filter.page_count = '1';
    listTable.filter.start = '0';


    onload = function()
    {
        startCheckOrder(); // 开始检查订单
        document.forms['listForm'].reset();
    }

    function confirmSubmit(frm, ext)
    {
        if (frm.elements['type'].value == 'restore')
        {

            return confirm("您确实要把该商品还原吗？");

        }
        else if (frm.elements['type'].value == 'drop')
        {

            return confirm("彻底删除商品将删除与该商品有关的所有信息。\n您确实要删除选中的商品吗？");

        }
        else if (frm.elements['type'].value == '')
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function changeAction()
    {
        var frm = document.forms['listForm'];

        if (!document.getElementById('btnSubmit').disabled &&
                confirmSubmit(frm, false))
        {
            frm.submit();
        }
    }

</script>
<div id="footer">
    共执行 7 个查询，用时 0.065004 秒，Gzip 已禁用，内存占用 3.157 MB<br>
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
                var md5 = $import("js/md5.js","js");
                md5.onload = md5.onreadystatechange= function()
                {
                    if(this.readyState && this.readyState=="loading")return;
                    var todolist = $import("js/todolist.js","js");
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