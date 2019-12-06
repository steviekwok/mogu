<?php /*a:2:{s:67:"/usr/local/nginx/html/shop/application/admin/view/category/add.html";i:1560359383;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1556897292;}*/ ?>
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


<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/category">
      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select name="pid" id="pid" class="input w50" onchange="setIndex()">
            <option value="0">顶级分类</option>
            <?php if(is_array($top_cat) || $top_cat instanceof \think\Collection || $top_cat instanceof \think\Paginator): $i = 0; $__LIST__ = $top_cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($vo['cat_id']); ?>"><?php echo htmlentities($vo['cat_name']); ?></option>
             <?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>分类名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="cat_name" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" id="index" style="display:none">
        <div class="label">
          <label>是否首页展示：</label>
        </div>
        <div class="field" style="padding-top:8px;">
          是 <input type="radio"  name="is_index" value="1" />
          否 <input type="radio"  name="is_index" value="0" checked />
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
<script>
  function setIndex(){
      pid = $('#pid').val();
      if(pid) {
          $('#index').show();
      }else {
          $('#index').hide();
      }
  }
</script>

</body>
</html>