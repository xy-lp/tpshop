<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 添加分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="/index.php/Admin/Category/getlist">商品分类</a></span>
<span class="action-span1"><a href="index.php?p=admin&c=admin&a=admin">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加分类 </span>
<div style="clear:both"></div>
</h1>
<!-- start add new category form -->
<div class="main-div">
    <form action="index.php?p=admin&c=category&a=update&id=<?php echo $info['category_id']?>" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
	 <table width="100%" id="general-table">
		<tbody>
			<tr>
				<td class="label">分类名称:</td>
                                <td><input type="text" name="cat_name" maxlength="20" value="<?php echo ($info["cat_name"]); ?>" size="27"> <font color="red">*</font></td>
            </tr>
			<tr>
				<td class="label">上级分类:</td>
				<td>
					<select name="parent_id">
						<option value="0">顶级分类</option>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo1["cat_id"]); ?>" <?php if($vo1['cat_id'] == $info['parent_id']): ?>selected='selected'<?php endif; ?>><?php echo str_repeat('&nbsp;',$vo1['deep']*2),$vo1['cat_name']?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
			</tr>

			<tr id="measure_unit">
				<td class="label">数量单位:</td>
                                <td><input type="text" name="measure_unit" value="<?php echo ($info["measure_unit"]); ?>" size="12"></td>
			</tr>
			<tr>
				<td class="label">排序:</td>
				<td><input type="text" name="sort_order" value="<?php echo ($info["sort_order"]); ?>" size="15"></td>
			</tr>

			<tr>
				<td class="label">是否显示:</td>
				<td><input type="radio" name="is_show" value="1" checked="true" <?php echo $info['is_show']==1?'checked':'';?>> 是<input type="radio" name="is_show" value="0" <?php echo $info['is_show']==0?'checked':'';?>> 否  </td>
			</tr>
      <tr>
        <td class="label">分类描述:</td>
        <td>
          <textarea name="cat_desc" rows="6" cols="48"><?php echo ($info["cat_desc"]); ?></textarea>
        </td>
      </tr>
      </tbody></table>
      <div class="button-div">
        <input type="submit" value=" 确定 ">
        <input type="reset" value=" 重置 ">
      </div>
    <input type="hidden" name="cat_id" value="<?php echo ($info["cat_id"]); ?>">
  </form>
</div>



<div id="footer">
	版权所有 &copy; 2012-2013 传智播客 - PHP培训 - 
</div>

</div>

</body>
</html>