<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 类型管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="/index.php/Admin/Goodstype/add">新建商品类型</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品类型 </span>
<div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm">
<!-- start goods type list -->
<div class="list-div" id="listDiv">

	<table width="100%" cellpadding="3" cellspacing="1" id="listTable">
		<tbody>
			<tr>
				<th>商品类型名称</th>
				<th>属性分组</th>
				<th>属性数</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td class="first-cell"><span onclick="javascript:listTable.edit(this, 'edit_type_name', 1)"><?php echo ($vo["type_name"]); ?></span></td>
              <td></td>
              <td align="right">
                <?php
 $count=M('attribute')->where(array('type_id'=>$vo['id']))->count('id'); echo $count[0]; ?>
              </td>
              <td align="center">
                <?php if($vo['status'] == 1): ?><img src="/Public/admin/images/yes.gif"></td>
                <?php else: ?>
                  <img src="/Public/admin/images/no.gif"></td><?php endif; ?>

              <td align="center">

                <a href="<?php echo U('Attribute/getlist',array('id'=>$vo['id']));?>" title="属性列表">属性列表</a> |
                <a href="<?php echo U('Goodstype/edit',array('id'=>$vo['id']));?>" title="编辑">编辑</a> |
                <a href="<?php echo U('Goodstype/del',array('id'=>$vo['id']));?>" onclick="listTable.remove(1, '删除商品类型将会清除该类型下的所有属性。\n您确定要删除选定的商品类型吗？')" title="移除">移除</a>
              </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>


      <tr>
      <td align="right" nowrap="true" colspan="6" style="background-color: rgb(255, 255, 255);">
            <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
            <div id="turn-page">
        总计  <span id="totalRecords"><?php echo ($page['count']); ?></span>
        个记录分为 <span id="totalPages"><?php echo ($page['page_count']); ?></span>
        页当前第 <span id="pageCurrent"><?php echo ($page['page_id']); ?></span>
        页，每页 <input type="text" size="3" id="pageSize" value="<?php echo ($page['page_size']); ?>" onblur="editsize(this.value)">
        <span id="page-link">
          <a href="/index.php/Admin/Goodstype/getlist/p/1">第一页</a>
          <a href="/index.php/Admin/Goodstype/getlist/p/<?php echo ($page['page_id']-1); ?>">上一页</a>
          <a href="/index.php/Admin/Goodstype/getlist/p/<?php echo ($page['page_id']+1); ?>">下一页</a>
          <a href="/index.php/Admin/Goodstype/getlist/p/<?php echo ($page['page_count']); ?>">最末页</a>
          <select id="gotoPage" onchange="searchAttr(this.value)">
            <?php
 for($i=1,$n=$page['page_count'];$i<=$n;$i++){ ?>
               <option value="<?php echo $i?>" <?php if($i == $page['page_id']): ?>selected="selected"<?php endif; ?>><?php echo $i?></option>
            <?php
 } ?>
          </select>
        </span>
      </div>
      </td>
    </tr>
  </tbody></table>

</div>
<!-- end goods type list -->
</form>

<div id="footer">
	版权所有 &copy; 2012-2013 传智播客 - PHP培训 - </div>
</div>


<script type="text/javascript">
  function searchAttr(page){
    location.href="/index.php/Admin/Goodstype/getlist/p/"+page;
  }
</script>
</body>
</html>