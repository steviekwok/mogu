<?php /*a:2:{s:64:"/usr/local/nginx/html/shop/application/admin/view/user/list.html";i:1559115397;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1556897292;}*/ ?>
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

<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th>其他</th>
         <th width="120">注册时间</th>
        <th>操作</th>
      </tr>
      <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
          <td><input type="checkbox" name="id[]" value="1" />
            <?php echo htmlentities($i); ?></td>
          <td>神夜</td>
          <td><?php echo htmlentities($vo['mobile']); ?></td>
          <td>564379992@qq.com</td>  
           <td>深圳市民治街道</td>
          <td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?></td>
          <td>
            <div class="button-group">
              <?php if(($vo['is_froze']==0)): ?>
              <a class="button border-red" href="javascript:void(0)" onclick="froze(<?php echo htmlentities($vo['id']); ?>)">
            <span class="icon-trash-o"></span> 冻结</a>
              <?php else: ?>
              <a class="button border-red" href="javascript:void(0)" onclick="unfroze(<?php echo htmlentities($vo['id']); ?>)">
                <span class="icon-trash-o"></span> 解冻</a>
              <?php endif; ?>
            </div>
          </td>
        </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function froze(id){
	layer.confirm("您确定要冻结这个用户，禁止其登录吗",function(){
	    $.post('/admin/User/froze', {id:id}, function(res){
	        if(res.status == 'success'){
	            layer.msg('冻结用户成功', {icon:1});
            }else {
                layer.msg('冻结用户失败', {icon:2});
            }
            location.href = '/admin/user';
        })
	})
}
function unfroze(id){
    layer.confirm("您确定要冻结这个用户，禁止其登录吗",function(){
        $.post('/admin/User/froze', {id:id}, function(res){
            if(res.status == 'success'){
                layer.msg('冻结用户成功', {icon:1});
            }else {
                layer.msg('冻结用户失败', {icon:2});
            }
            location.href = '/admin/user';
        })
    })
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>

</body>
</html>