<?php /*a:2:{s:65:"/usr/local/nginx/html/shop/application/admin/view/image/list.html";i:1557825448;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1556897292;}*/ ?>
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
  <button type="button" class="button border-yellow" onclick="window.location.href='/admin/image/create'"><span class="icon-plus-square-o"></span> 添加内容</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="20%">图片</th>
      <th width="15%">名称</th>
      <th width="20%">描述</th>
      <th width="15%">操作</th>
    </tr>

   <?php if(is_array($images) || $images instanceof \think\Collection || $images instanceof \think\Paginator): $i = 0; $__LIST__ = $images;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo htmlentities($i); ?></td>
      <td><img src="/<?php echo htmlentities($vo['img_url']); ?>" alt="" width="120" height="50" /></td>
      <td><?php echo htmlentities($vo['title']); ?></td>
      <?php if($vo['type'] == 1): ?>
      <td>logo</td>
      <?php else: ?>
      <td>幻灯片</td>
      <?php endif; ?>
      <td><div class="button-group">
      <a class="button border-main" href="/admin/image/<?php echo htmlentities($vo['id']); ?>/edit"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="javascript:void(0)" onclick="del(<?php echo htmlentities($vo['id']); ?>)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    
  </table>
</div>
<script type="text/javascript">
function del(id){
	layer.confirm("您确定要删除吗?", function(){
	    $.ajax({
	        type:'delete',
            url:'/admin/image/'+id,
            datatype:'json',
            success:function(data){
	            if(data.status == 'success'){
	                layer.msg('删除成功',{icon:1});
                }else{
	                layer.msg('删除失败',{icon:2});
                }
                location.href = '/admin/image';
            }

        })
    })
}
</script>

</body>
</html>