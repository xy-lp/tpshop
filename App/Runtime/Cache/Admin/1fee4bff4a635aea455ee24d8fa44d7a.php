<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 会员列表 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Member/add">添加会员</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 会员列表 </span>
    <div style="clear:both"></div>
</h1>
<div class="form-div">
    <form action="javascript:searchUser()" name="searchForm">
        <img src="/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
        &nbsp;会员等级 <select name="user_rank"><option value="0">所有等级</option><option value="1">注册用户</option></select>
        &nbsp;会员积分大于&nbsp;<input type="text" name="pay_points_gt" size="8">&nbsp;会员积分小于&nbsp;<input type="text" name="pay_points_lt" size="10">
        &nbsp;会员名称 &nbsp;<input type="text" name="keyword"> <input type="submit" value=" 搜索 ">
    </form>
</div>

<form method="POST" action="" name="listForm" onsubmit="return confirm_bath()">

    <!-- start users list -->
    <div class="list-div" id="listDiv">
        <!--用户列表部分-->
        <table cellpadding="3" cellspacing="1">
            <tbody><tr>
                <th>
                    <input onclick="listTable.selectAll(this, &quot;checkboxes&quot;)" type="checkbox">
                    <a href="javascript:listTable.sort('user_id');">编号</a><img src="/Public/Admin/images/sort_desc.gif">    </th>
                <th><a href="javascript:listTable.sort('user_name');">会员名称</a></th>
                <th><a href="javascript:listTable.sort('email');">邮件地址</a></th>
                <th><a href="javascript:listTable.sort('is_validated');">是否已验证</a></th>
                <th>可用资金</th>
                <th>冻结资金</th>
                <th>等级积分</th>
                <th>消费积分</th>
                <th><a href="javascript:listTable.sort('reg_time');">注册日期</a></th>
                <th>操作</th>
            </tr><tr>
            </tr><tr><td class="no-records" colspan="10" style="background-color: rgb(255, 255, 255);">没有找到任何记录</td></tr>
            <tr>
                <td colspan="2" style="background-color: rgb(255, 255, 255);">
                    <input type="hidden" name="act" value="batch_remove">
                    <input type="submit" id="btnSubmit" value="删除会员" disabled="true" class="button"></td>
                <td align="right" nowrap="true" colspan="8" style="background-color: rgb(255, 255, 255);">
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
    <!-- end users list -->
</form>

<div id="footer">
    共执行 4 个查询，用时 0.010001 秒，Gzip 已禁用，内存占用 2.224 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>