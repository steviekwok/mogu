<?php /*a:2:{s:68:"/usr/local/nginx/html/shop/application/admin/view/order/express.html";i:1562229363;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1567417193;}*/ ?>
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

<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 填写快递信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/order/do_express">
      <div class="form-group">
        <div class="label">
          <label>收件人：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo htmlentities($address['name']); ?>"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>电话号码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo htmlentities($address['mobile']); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo htmlentities($address['pro'].$address['city'].$address['dis'].$address['street']); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>快递公司：</label>
        </div>
        <div class="field">
          <select name="exp_name" class="input w50">
            <option value="">请选择</option>
            <option value="yd">韵达</option>
            <option value="zto">韵达</option>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>快递单号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="exp_no"  />
          <input type="hidden" name="order_id" value="<?php echo htmlentities($order_id); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body>
</html>