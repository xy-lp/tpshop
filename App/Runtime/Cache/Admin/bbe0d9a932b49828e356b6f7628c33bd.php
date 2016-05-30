<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
  <title>ECSHOP 管理中心 - 添加管理员 </title>
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
  var user_name_empty = "管理员用户名不能为空!";
  var password_invaild = "密码必须同时包含字母及数字且长度不能小于6!";
  var email_empty = "Email地址不能为空!";
  var email_error = "Email地址格式不正确!";
  var password_error = "两次输入的密码不一致!";
  var captcha_empty = "您没有输入验证码!";
  //-->
</script>
</head>
<body>

<h1>
  <span class="action-span"><a href="/index.php/Admin/User/getlist">管理员列表</a></span>
  <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加管理员 </span>
  <div style="clear:both"></div>
</h1>
<div class="main-div">
  <form name="theForm" method="post" enctype="multipart/form-data" onsubmit="return validate();">
    <table width="100%">
      <tbody><tr>
        <td class="label">用户名</td>
        <td>
          <input type="text" name="user_name" maxlength="20" value="" size="34"><span class="require-field">*</span></td>
      </tr>
      <tr>
        <td class="label">Email地址</td>
        <td>
          <input type="text" name="email" value="" size="34"><span class="require-field">*</span></td>
      </tr>
      <tr>
        <td class="label">密  码</td>
        <td>
          <input type="password" name="password" maxlength="32" size="34"><span class="require-field">*</span></td>
      </tr>
      <tr>
        <td class="label">确认密码</td>
        <td>
          <input type="password" name="pwd_confirm" maxlength="32" size="34"><span class="require-field">*</span></td>
      </tr>
      <tr>
        <td class="label">用户组</td>
        <td>
            <select name="role_id">
              <?php if(is_array($list)): foreach($list as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["role_name"]); ?></option><?php endforeach; endif; ?>
            </select>
        </td>
      </tr>

      <tr>
        <td colspan="2" align="center">
          <input type="submit" value=" 确定 " class="button">&nbsp;&nbsp;&nbsp;
          <input type="reset" value=" 重置 " class="button">
          <input type="hidden" name="act" value="insert">
          <input type="hidden" name="token" value="">
          <input type="hidden" name="id" value=""></td>
      </tr>
      </tbody></table>
  </form>
</div>
<script type="text/javascript" src="/Public/Admin/js/utils.js"></script><script type="text/javascript" src="js/validator.js"></script><script language="JavaScript">
  var action = "add";
  <!--

          document.forms['theForm'].elements['user_name'].focus();
  onload = function()
  {
    // 开始检查订单
    startCheckOrder();
  }

  /**
   * 切换增加按钮的状态
   */
  function toggleAddButton()
  {
    var sel = document.getElementById("all_menu_list");
    document.getElementById("btnAdd").disabled = (sel.selectedIndex > -1) ? false : true;
  }

  /**
   * 切换移出，上移，下移按钮状态
   */
  function toggleButtonSatus()
  {
    var sel = document.getElementById("menus_navlist");
    document.getElementById("btnRemove").disabled = (sel.selectedIndex > -1) ? false : true;
    document.getElementById("btnMoveUp").disabled = (sel.selectedIndex > -1) ? false : true;
    document.getElementById("btnMoveDown").disabled = (sel.selectedIndex > -1) ? false : true;
  }

  /**
   * 移动选定的列表项
   */
  function moveOptions(direction)
  {
    var sel = document.getElementById('menus_navlist');
    if (sel.selectedIndex == -1)
    {
      return;
    }

    len = sel.length
    for (i = 0; i < len; i++)
    {
      if (sel.options[i].selected)
      {
        if (i == 0 && direction == 'up')
        {
          return;
        }

        newOpt = sel.options[i].cloneNode(true);

        sel.removeChild(sel.options[i]);
        tarOpt = (direction == "up") ? sel.options[i-1] : sel.options[i+1]
        sel.insertBefore(newOpt, tarOpt);
        newOpt.selected = true;
        break;
      }
    }
  }

  /**
   * 检查表单输入的数据
   */
  function validate()
  {
    get_navlist();

    validator = new Validator("theForm");
    validator.password = function (controlId, msg)
    {
      var obj = document.forms[this.formName].elements[controlId];
      obj.value = Utils.trim(obj.value);
      if (!(obj.value.length >= 6 && /\d+/.test(obj.value) && /[a-zA-Z]+/.test(obj.value)))
      {
        this.addErrorMsg(msg);
      }

    }

    validator.required("user_name", user_name_empty);
    validator.required("email", email_empty, 1);
    validator.isEmail("email", email_error);

    if (action == "add")
    {
      if (document.forms['theForm'].elements['password'])
      {
        validator.password("password", password_invaild);
        validator.eqaul("password", "pwd_confirm", password_error);
      }
    }
    if (action == "edit" || action == "modif")
    {
      if (document.forms['theForm'].elements['old_password'].value.length > 0)
      {
        validator.password("new_password", password_invaild);
        validator.eqaul("new_password", "pwd_confirm", password_error);
      }
    }

    return validator.passed();
  }

  function get_navlist()
  {
    if (!document.getElementById('nav_list[]'))
    {
      return;
    }

    document.getElementById('nav_list[]').value = joinItem(document.getElementById('menus_navlist'));
    //alert(document.getElementById('nav_list[]').value);
  }
  //-->

</script>
<div id="footer">
  共执行 2 个查询，用时 0.011001 秒，Gzip 已禁用，内存占用 2.173 MB<br>
  版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
<!-- 新订单提示信息 -->
<div id="popMsg">
  <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#cfdef4" border="0">
    <tbody><tr>
      <td style="color: #0f2c8c" width="30" height="24"></td>
      <td style="font-weight: normal; color: #1f336b; padding-top: 4px;padding-left: 4px" valign="center" width="100%"> 新订单通知</td>
      <td style="padding-top: 2px;padding-right:2px" valign="center" align="right" width="19"><span title="关闭" style="cursor: hand;cursor:pointer;color:red;font-size:12px;font-weight:bold;margin-right:4px;" onclick="Message.close()">×</span><!-- <img title=关闭 style="cursor: hand" onclick=closediv() hspace=3 src="msgclose.jpg"> --></td>
    </tr>
    <tr>
      <td style="padding-right: 1px; padding-bottom: 1px" colspan="3" height="70">
        <div id="popMsgContent">
          <p>您有 <strong style="color:#ff0000" id="spanNewOrder">1</strong> 个新订单以及       <strong style="color:#ff0000" id="spanNewPaid">0</strong> 个新付款的订单</p>
          <p align="center" style="word-break:break-all"><a href="order.php?act=list"><span style="color:#ff0000">点击查看新订单</span></a></p>
        </div>
      </td>
    </tr>
    </tbody></table>
</div>

<!--
<embed src="images/online.wav" width="0" height="0" autostart="false" name="msgBeep" id="msgBeep" enablejavascript="true"/>
-->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0" id="msgBeep" width="1" height="1">
  <param name="movie" value="images/online.swf">
  <param name="quality" value="high">
  <embed src="images/online.swf" name="msgBeep" id="msgBeep" quality="high" width="0" height="0" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash">

</object>

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