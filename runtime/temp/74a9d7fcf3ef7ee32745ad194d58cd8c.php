<?php /*a:2:{s:67:"/usr/local/nginx/html/shop/application/admin/view/system/index.html";i:1557421328;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1567417193;}*/ ?>
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

<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
    <form method="get" class="form-x" action="/admin/system/<?php echo htmlentities($sys['id']); ?>/edit">
      <div class="form-group">
        <div class="label">
          <label>网站标题：</label>
        </div>
        <div class="field">
          <input disabled type="text" class="input" name="title" value="<?php echo htmlentities($sys['title']); ?>" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站关键字：</label>
        </div>
        <div class="field">
          <textarea disabled class="input" name="keywords" style="height:80px"><?php echo htmlentities($sys['keywords']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站描述：</label>
        </div>
        <div class="field">
          <textarea disabled class="input" name="description"><?php echo htmlentities($sys['description']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>底部信息：</label>
        </div>
        <div class="field">
          <textarea disabled name="footer" class="input" style="height:120px;"><?php echo htmlentities($sys['footer']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 编辑</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body>
</html>