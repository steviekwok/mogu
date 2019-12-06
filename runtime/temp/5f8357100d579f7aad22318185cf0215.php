<?php /*a:2:{s:68:"/usr/local/nginx/html/shop/application/admin/view/category/list.html";i:1560355119;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1556897292;}*/ ?>
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
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='/admin/category/create'"><span class="icon-plus-square-o"></span> 添加分类</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">分类名称</th>
      <th width="10%">首页展示</th>
      <th width="10%">操作</th>
    </tr>
    <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo htmlentities($i); ?></td>
      <td><?php echo htmlentities(str_repeat('——', $vo['lv'])); ?><?php echo htmlentities($vo['cat_name']); ?></td>
      <td>
        <?php if(($vo['is_index'])): ?>
        <img src="/static/admin/images/yes.gif" alt="" />
        <?php else: ?>
        <img src="/static/admin/images/no.gif" alt="" />
        <?php endif; ?>
      </td>
      <td>
        <div class="button-group">
          <a class="button border-main" href="/admin/category/<?php echo htmlentities($vo['cat_id']); ?>/edit">
            <span class="icon-edit"></span> 修改</a>
          <a class="button border-red" href="javascript:void(0)" onclick="del(<?php echo htmlentities($vo['cat_id']); ?>)">
            <span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<script type="text/javascript">
function del(id){
	layer.confirm("您确定要删除此分类吗?",function(){
	    $.ajax({
	        type:"delete",
            url: '/admin/category/'+id,
            datatype: "json",
            success: function(res){
                if(res.status == 'success'){
                    layer.msg(res.msg,{icon:1});
                }else{
                    layer.msg(res.msg,{icon:2});
                }
                location.href = '/admin/category';
            }
        })
	})
}
</script>

</body>
</html>