<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 属性管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="/index.php/Admin/Attribute/getlist/id/<?php echo ($list['type_id']); ?>">商品属性</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 编辑属性 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="/index.php/Admin/Attribute/edit" method="post" name="theForm" onsubmit="return validate();">
  <table width="100%" id="general-table">
      <tbody><tr>
        <td class="label">属性名称：</td>
        <td>
          <input type="text" name="att_name" value="<?php echo ($list["att_name"]); ?>" size="30">
          <span class="require-field">*</span>        </td>
      </tr>
      <tr>
        <td class="label">所属商品类型：</td>
        <td>
          <select name="type_id" onchange="onChangeGoodsType(this.value)">
          <option value="0">请选择...</option>
          <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo1["id"]); ?>" <?php if($vo1['id'] == $list['type_id']): ?>selected="true"<?php endif; ?>><?php echo ($vo1["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </tr>
      <tr id="attrGroups" style="display: none;">
        <td class="label">属性分组：</td>
        <td>
          <select name="attr_group">
                    </select>
        </td>
      </tr>
      <tr>
        <td class="label"><a href="javascript:showNotice('noticeAttrType');" title="点击此处查看提示信息"><img src="/Public/admin/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>属性是否可选</td>
        <td>
          <input type="radio" name="att_type" value="0" <?php if($list['att_type']==0): ?>checked="true"<?php endif; ?>> 唯一属性          <input type="radio" name="att_type" value="1" <?php if($list['att_type']==1): ?>checked="true"<?php endif; ?>> 单选属性          <input type="radio" name="att_type" value="2" <?php if($list['att_type']==2): ?>checked="true"<?php endif; ?>> 复选属性          <br><span class="notice-span" style="display:block" id="noticeAttrType">选择"单选/复选属性"时，可以对商品该属性设置多个值，同时还能对不同属性值指定不同的价格加价，用户购买商品时需要选定具体的属性值。选择"唯一属性"时，商品的该属性值只能设置一个值，用户只能查看该值。</span>
        </td>
      </tr>
      <tr>
        <td class="label">该属性值的录入方式：</td>
        <td>
          <input type="radio" name="att_input_type" value="0" <?php if($list['att_input_type']==0): ?>checked="true"<?php endif; ?> onclick="radioClicked(0)">
          手工录入          <input type="radio" name="att_input_type" value="1" <?php if($list['att_input_type']==1): ?>checked="true"<?php endif; ?> onclick="radioClicked(1)">
          从下面的列表中选择（一行代表一个可选值）          <input type="radio" name="att_input_type" value="2" <?php if($list['att_type']==2): ?>checked="true"<?php endif; ?> onclick="radioClicked(0)">
          多行文本框        </td>
      </tr>
      <tr>
        <td class="label">可选值列表：</td>
        <td>
          <textarea name="att_input_val" cols="30" rows="5" <?php if($list['att_input_type']!=1): ?>disabled="disabled"<?php endif; ?> ><?php echo ($list["att_input_val"]); ?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        <div class="button-div">
          <input type="submit" value=" 确定 " class="button">
          <input type="reset" value=" 重置 " class="button">
        </div>
        </td>
      </tr>
      </tbody></table>
    <input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
  </form>
</div>

<div id="footer">
	版权所有 &copy; 2012-2013 传智播客 - PHP培训 - </div>
</div>
<script type="text/javascript">
/**
 * 点击类型按钮时切换选项的禁用状态
 */
function radioClicked(n)
{
  document.forms['theForm'].elements["att_input_val"].disabled = n > 0 ? false : true;
}


</script>
</body>
</html>