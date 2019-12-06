<?php /*a:2:{s:67:"/usr/local/nginx/html/shop/application/admin/view/order/refund.html";i:1562837068;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1556897292;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/pintuer.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <link rel="stylesheet" href="/static/lib/validform/css/style.css">
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/lib/layer/layer.js"></script>
    <script src="/static/lib/validform/js/Validform_v5.3.2_min.js"></script>
    <script src="/static/admin/js/pintuer.js"></script>
</head>
<body>

<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 订单列表</strong>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>订单号</th>
        <th>商品名称</th>
        <th>商品总价</th>
        <th>付款方式</th>
        <th>用户</th>
        <th>是否收到货</th>
        <th>退货说明</th>
        <th>申请时间</th>
        <th>操作</th>
      </tr>
      <?php if(is_array($refunds) || $refunds instanceof \think\Collection || $refunds instanceof \think\Paginator): $i = 0; $__LIST__ = $refunds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
          <!--<td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           1</td>-->
            <td><?php echo htmlentities($vo['sub_trade_no']); ?></td>
          <td><?php echo htmlentities($vo['goods_name']); ?></td>
          <td><?php echo htmlentities($vo['fee']); ?></td>
          <td><?php echo htmlentities($vo['pay_type']); ?></td>
          <td><?php echo htmlentities($vo['mobile']); ?></td>
          <td><?php echo !empty($vo['get_good']) ? '已收货' : '未收货'; ?></td>
          <td><?php echo htmlentities($vo['content']); ?></td>
            <td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?></td>
            <td><div class="button-group">
                <?php if(($vo['is_refund']==2)): ?>
              <a class="button border-main" href="javascript:;" style="background-color: #8a8a8a;">
                  <span class="icon-edit"></span> 已退款</a>
                <?php else: ?>
                        <a class="button border-main" href="/admin/order/apply_refund/oid/<?php echo htmlentities($vo['order_id']); ?>/pay_type/<?php echo htmlentities($vo['pay_type']); ?>">
                            <span class="icon-edit"></span> 退款</a>
                <?php endif; ?>
              <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1,1)">
                  <span class="icon-trash-o"></span> 删除</a> </div>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      <tr>
        <td colspan="8"><div class="pagelist"><?php echo $refunds; ?></div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}
</script>

</body>
</html>