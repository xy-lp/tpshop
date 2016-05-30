<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 订单列表 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">

</head>
<body>

<h1>
    <span class="action-span"><a href="order.php?act=order_query">订单查询</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 订单列表 </span>
    <div style="clear:both"></div>
</h1>
<div class="form-div">
    <form action="javascript:searchOrder()" name="searchForm">
        <img src="/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
        订单号<input name="order_sn" type="text" id="order_sn" size="15">
        收货人<input name="consignee" type="text" id="consignee" size="15">
        订单状态    <select name="status" id="status">
        <option value="-1">请选择...</option>
        <option value="0" selected="">待确认</option><option value="100">待付款</option><option value="101">待发货</option><option value="102">已完成</option><option value="1">付款中</option><option value="2">取消</option><option value="3">无效</option><option value="4">退货</option><option value="6">部分发货</option>    </select>
        <input type="submit" value=" 搜索 " class="button">
        <a href="order.php?act=list&amp;composite_status=0">待确认</a>
        <a href="order.php?act=list&amp;composite_status=100">待付款</a>
        <a href="order.php?act=list&amp;composite_status=101">待发货</a>
    </form>
</div>

<!-- 订单列表 -->
<form method="post" action="order.php?act=operate" name="listForm" onsubmit="return check()">
    <div class="list-div" id="listDiv">

        <table cellpadding="3" cellspacing="1">
            <tbody><tr>
                <th>
                    <input onclick="listTable.selectAll(this, &quot;checkboxes&quot;)" type="checkbox"><a href="javascript:listTable.sort('order_sn', 'DESC');">订单号</a>    </th>
                <th><a href="javascript:listTable.sort('add_time', 'DESC');" title="点击对列表排序">下单时间</a><img src="/Public/Admin/images/sort_desc.gif"></th>
                <th><a href="javascript:listTable.sort('consignee', 'DESC');">收货人</a></th>
                <th><a href="javascript:listTable.sort('total_fee', 'DESC');">总金额</a></th>
                <th><a href="javascript:listTable.sort('order_amount', 'DESC');">应付金额</a></th>
                <th>订单状态</th>
                <th>操作</th>
            </tr>
    <?php if(is_array($order_list)): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$olvo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($olvo["order_sn"]); ?></td>
                <td><?php echo ($olvo["addtime"]); ?></td>
                <td><?php echo ($olvo["consignee"]); ?></td>
                <td><?php echo ($olvo["goods_amount"]); ?></td>
                <td><?php echo ($olvo["goods_amount"]); ?></td>
                <td><?php echo ($olvo["pay_status"]); ?></td>
                <td>
                    <a href="/index.php/Admin/Order/edit/id/<?php echo ($olvo["id"]); ?>" title="编辑"><img src="/Public/Admin/images/icon_edit.gif" width="16" height="16" border="0"></a>
                    <a href="/index.php/Admin/Order/del/id/<?php echo ($olvo["id"]); ?>" onclick="return confirm('确定删除?');" title="确定删除?"><img src="/Public/Admin/images/no.gif" width="16" height="16" border="0"></a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody></table>

        <!-- 分页 -->
        <table id="page-table" cellspacing="0">
            <tbody><tr>
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
    <div>
        <input name="confirm" type="submit" id="btnSubmit" value="确认" class="button" disabled="true" onclick="this.form.target = '_self'">
        <input name="invalid" type="submit" id="btnSubmit1" value="无效" class="button" disabled="true" onclick="this.form.target = '_self'">
        <input name="cancel" type="submit" id="btnSubmit2" value="取消" class="button" disabled="true" onclick="this.form.target = '_self'">
        <input name="remove" type="submit" id="btnSubmit3" value="移除" class="button" disabled="true" onclick="this.form.target = '_self'">
        <input name="print" type="submit" id="btnSubmit4" value="打印订单" class="button" disabled="true" onclick="this.form.target = '_blank'">
        <input name="batch" type="hidden" value="1">
        <input name="order_id" type="hidden" value="">
    </div>
</form>


<div id="footer">
    共执行 4 个查询，用时 0.028002 秒，Gzip 已禁用，内存占用 4.610 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>