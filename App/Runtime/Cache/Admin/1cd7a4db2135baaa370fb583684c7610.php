<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
  <title>ECSHOP 管理中心 - 添加栏目 </title>
  <meta name="robots" content="noindex, nofollow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
  <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1>
  <span class="action-span"><a href="/index.php/Admin/Privilege/getlist">栏目列表</a></span>
  <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加管理员 </span>
  <div style="clear:both"></div>
</h1>
<div class="main-div">
  <form name="theForm" method="post" enctype="multipart/form-data" onsubmit="return validate();">
    <table width="100%">
      <tbody><tr>
        <td class="label">权限名称</td>
        <td>
          <input type="text" name="priv_name" maxlength="20" value="" size="34"><span class="require-field">*</span></td>
      </tr>
      <tr>
        <td class="label">父级权限</td>
        <td>
          <select name="parent_pid">
            <option value="0">--顶级权限--</option>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo str_repeat('-',$vo['deep']*2),$vo['priv_name']?></option><?php endforeach; endif; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label">模型名</td>
        <td>
          <input type="text" name="module_name" value="" size="34"><span class="require-field">*</span></td>
      </tr>
      <tr>
        <td class="label">控制器名</td>
        <td>
          <input type="text" name="controller_name" maxlength="32" size="34"><span class="require-field">*</span></td>
      </tr>
      <tr>
        <td class="label">操作方法</td>
        <td>
          <input type="text" name="action_name" maxlength="32" size="34"><span class="require-field">*</span></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" value=" 确定 " class="button">&nbsp;&nbsp;&nbsp;
          <input type="reset" value=" 重置 " class="button">
          <input type="hidden" name="id" value=""></td>
      </tr>
      </tbody></table>
  </form>
</div>

</body></html>