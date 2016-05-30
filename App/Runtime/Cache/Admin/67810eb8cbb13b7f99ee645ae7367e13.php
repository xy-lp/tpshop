<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>ECSHOP 管理中心 - 货品列表 </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css">
    <link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/Admin/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
    $(function(){
		$(':button').click(function(e) {
            var otr=$(this).parent().parent();
			if($(this).val()=='+'){
				var new_tr=otr.clone(true);
				new_tr.find(':button').val('-');
				otr.before(new_tr);
			}else{
				otr.remove();
			}
        });
	});
    </script>
</head>
<body>

<h1>
    <span class="action-span"><a href="/index.php/Admin/Goods/getlist">商品列表</a></span>
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 货品列表 </span>
    <div style="clear:both"></div>
</h1>
<!-- 添加货品 -->
<div class="list-div" style="margin-bottom: 5px; margin-top: 10px;" id="listDiv">


    <form method="post" action="/index.php/Admin/Goods/product/id/16" name="addForm" id="addForm">
        <input type="hidden" name="goods_id" value="<?php echo ($goods_info["id"]); ?>">
        <table width="100%" cellpadding="3" cellspacing="1" id="table_list">
            <tbody>
            <tr>
                <th colspan="20" scope="col">商品名称：<?php echo ($goods_info["goods_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;货号：<?php echo ($goods_info["goods_sn"]); ?></th>
            </tr>
            <tr>
    <?php if(is_array($goods_list)): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$glvo): $mod = ($i % 2 );++$i;?><td scope="col" style="background-color: rgb(255, 255, 255);"><div align="center"><strong><?php echo ($glvo[0]["att_name"]); ?></strong></div></td><?php endforeach; endif; else: echo "" ;endif; ?>
                <td class="label_2" style="background-color: rgb(255, 255, 255);">库存</td>
                <td class="label_2" style="background-color: rgb(255, 255, 255);">操作</td>
            </tr>
<?php if(is_array($pro_data)): $i = 0; $__LIST__ = $pro_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pdvo): $mod = ($i % 2 );++$i;?><tr>
                <?php foreach($goods_list as $k=>$v){ ?>
                <td align="center" style="background-color: rgb(255, 255, 255);">
                    <select name="attr[<?php echo $k?>][]">
                        <?php foreach($v as $v1){ if(strpos(','.$pdvo['goods_attr_id'].',',','.$v1['id'].',')!==false){ $sel="selected='selected'"; }else{ $sel=''; } ?>

                        <option <?php echo $sel?> value="<?php echo $v1['id']?>"><?php echo $v1['attr_value']?></option>
                        <?php } ?>
                    </select>
                </td>
                <?php }?>
                <td class="label_2" style="background-color: rgb(255, 255, 255);"><input type="text" name="goods_nums[]" value="<?php echo $pdvo['goods_nums']?>" size="10">
                <td style="background-color: rgb(255, 255, 255);"><input type="button" class="button" value="-"></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <?php foreach($goods_list as $k=>$v){ ?>
                        <td align="center" style="background-color: rgb(255, 255, 255);">
                        <select name="attr[<?php echo $k?>][]">
                            <?php foreach($v as $v1){ ?>
                                <option value="<?php echo $v1['id']?>"><?php echo $v1['attr_value']?></option>
                            <?php } ?>
                        </select>
                        </td>
                <?php }?>
                <td class="label_2" style="background-color: rgb(255, 255, 255);">
                <input type="text" name="goods_nums[]" value="1" size="10">
                <td style="background-color: rgb(255, 255, 255);"><input type="button" class="button" value="+"></td>
            </tr>

           <!-- <tr>
                <td scope="col" style="background-color: rgb(255, 255, 255);"><div align="center">黑色</div></td>
                <td class="td_1" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_product_sn', 1)">N/A</span></td>
                <td class="td_1" style="background-color: rgb(255, 255, 255);"><span onclick="listTable.edit(this, 'edit_product_number', 1)">100</span></td>
                <td style="background-color: rgb(255, 255, 255);"><input type="button" class="button" value=" - " onclick="listTable.remove(1, '您确实要把该货品删除吗？', 'product_remove')"></td>
            </tr>-->

            <tr>
                <td align="center" colspan="<?php echo count($goods_list)+2?>" style="background-color: rgb(255, 255, 255);">
                    <input type="submit" class="button" value=" 保存 " onClick="checkgood_sn()">
                </td>
            </tr>
            </tbody></table>
    </form>


</div>
<!-- end 添加货品 -->

<div id="footer">
    共执行 6 个查询，用时 0.021001 秒，Gzip 已禁用，内存占用 3.189 MB<br>
    版权所有 © 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>

</body></html>