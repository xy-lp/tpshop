<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 自定义导航栏 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
</head>
<body style="cursor: auto;">

<h1>
    <span class="action-span"><a href="/index.php/Admin/Nav/add">添加导航</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 自定义导航栏 </span>
    <div style="clear:both"></div>
</h1>
    <div class="list-div" id="listDiv">
        <table cellspacing="1" cellpadding="3" id="list-table">
            <tbody><tr>
                <th>名称</th><th>是否显示</th><th>是否新窗口</th><th>排序</th><th>位置</th><th width="60px">操作</th>
            </tr>
    <?php if(is_array($nav_data)): $i = 0; $__LIST__ = $nav_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nbvo): $mod = ($i % 2 );++$i;?><tr>
                <td style="background-color: rgb(255, 255, 255);"><?php echo str_repeat('--',$nbvo['deep']*3),$nbvo['nav_name']?></td>
                <td align="center" style="background-color: rgb(255, 255, 255);">
                    <!--  -->
                    <img src="/Public/Admin/images/<?php echo $nbvo['is_show']==1?'yes':'no'?>.gif" onclick="listTable.toggle(this, 'toggle_ifshow', 3)">
                    <!--  --></td>
                <td align="center" style="background-color: rgb(255, 255, 255);">
                    <!--  -->
                    <img src="/Public/Admin/images/<?php echo $nbvo['open_new']==1?'yes':'no'?>.gif" onclick="listTable.toggle(this, 'toggle_opennew', 3)">
                    <!--  --></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_sort_order', 3)"><?php echo ($nbvo["nav_order"]); ?></span><!--  --></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><?php echo ($nbvo["location"]); ?></td>
                <td align="center" style="background-color: rgb(255, 255, 255);"><!--  --><a href="/index.php/Admin/Nav/edit/id/<?php echo ($nbvo["nav_id"]); ?>" title="编辑"><img src="/Public/Admin/images/icon_edit.gif" width="16" height="16" border="0"></a>
                    <a href="/index.php/Admin/Nav/del/id/<?php echo ($nbvo["nav_id"]); ?>" onclick="return confirm('确定删除?');" title="确定删除?"><img src="/Public/Admin/images/no.gif" width="16" height="16" border="0"><!--  --></a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody></table>

        <table cellpadding="4" cellspacing="0">
            <tbody><tr>
                <td align="right">      <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
                    <div id="turn-page">
                        总计  <span id="totalRecords">21</span>
                        个记录分为 <span id="totalPages">2</span>
                        页当前第 <span id="pageCurrent">1</span>
                        页，每页 <input type="text" size="3" id="pageSize" value="15" onkeypress="return listTable.changePageSize(event)">
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
              <option value="1">1</option><option value="2">2</option>          </select>
        </span>
                    </div>
                </td>
            </tr>
            </tbody></table>
    </div>
</form>

<div id="footer">
    共执行 3 个查询，用时 0.009001 秒，Gzip 已禁用，内存占用 2.125 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>