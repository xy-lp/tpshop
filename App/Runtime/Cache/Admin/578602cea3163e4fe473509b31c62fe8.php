<?php if (!defined('THINK_PATH')) exit();?>
<?php
 foreach($attrdata as $v){ if($v['att_type']==0){ if($v['att_input_type']==0){ echo "<tr><td class='label'>".$v['att_name']."：</td><td>"; echo "<input type='text' name='attr[".$v['id']."]'/>"; echo "</td></tr>"; }elseif($v['att_input_type']==1){ echo "<tr><td class='label'>".$v['att_name']."：</td><td>"; $attr=$v['att_input_val']; $attr_array=explode("\n",$attr); echo "<select name='attr[".$v['id']."]'>"; foreach($attr_array as $k=>$val){ echo "<option value='".$val."'>".$val."</option>"; } echo "</select></td></tr>"; }else{ echo "<tr><td class='label'>".$v['att_name']."：</td><td>"; echo "<textarea name='attr[".$v['id']."]'></textarea></td></tr>"; } }elseif($v['att_type']==1){ if($v['att_input_type']==0){ echo "<tr><td class='label'><a href='javascript:' onclick='copyAttr(this)'>[+]</a>&nbsp;".$v['att_name']."：</td><td>"; echo "<input type='text' name='attr[".$v['id']."][]'/>"; echo "</td></tr>"; }elseif($v['att_input_type']==1){ echo "<tr><td class='label'><a href='javascript:' onclick='copyAttr(this)'>[+]</a>&nbsp;".$v['att_name']."：</td><td>"; $attr=$v['att_input_val']; $attr_array=explode("\n",$attr); echo "<select name='attr[".$v['id']."][]'>"; foreach($attr_array as $k=>$val){ echo "<option value='".$val."'>".$val."</option>"; } echo "</select></td></tr>"; }else{ echo "<tr><td class='label'>".$v['att_name']."：</td><td>"; echo "<textarea name='attr[".$v['id']."][]'></textarea></td></tr>"; } }else{ if($v['att_input_type']==0){ echo "<tr><td class='label'>".$v['att_name']."：</td><td>"; echo "<input type='text' name='attr[".$v['id']."][]'/>"; echo "</td></tr>"; }elseif($v['att_input_type']==1){ echo "<tr><td class='label'><a href='javascript:' onclick='copyAttr(this)'>[+]</a>&nbsp;".$v['att_name']."：</td><td>"; $attr=$v['att_input_val']; $attr_array=explode("\n",$attr); echo "<select name='attr[".$v['id']."][]'>"; foreach($attr_array as $k=>$val){ echo "<option value='".$val."'>".$val."</option>"; } echo "</select></td></tr>"; }else{ echo "<tr><td class='label'>".$v['att_name']."：</td><td>"; echo "<textarea name='attr[".$v['id']."][]'></textarea></td></tr>"; } } } ?>

<script type="text/javascript">
    function copyAttr(i){
        var trs=$(i).parent().parent();
        if($(i).html()=='[+]'){
            var new_tr=trs.clone();
            new_tr.find('a').html('[-]');
            trs.after(new_tr);
        }else{
            trs.remove();
        }
    }
</script>