<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="post" action="/index.php/Home/Pay/pay">
    <input type="hidden" name="order_sn" value="<?php echo ($order_data["order_sn"]); ?>"/>
    <input type="hidden" name="goods_amount" value="<?php echo ($order_data["goods_amount"]); ?>"/>
    订单编号：<?php echo ($order_data["order_sn"]); ?><br/>
    订单金额：<?php echo ($order_data["goods_amount"]); ?><br/>
    <input type="submit" value="立即支付">
</form>
</body>
</html>