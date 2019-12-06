<?php /*a:2:{s:65:"/usr/local/nginx/html/shop/application/admin/view/order/list.html";i:1562155164;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1567417193;}*/ ?>
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
        <!--<a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.html"> 添加内容</a> </li>
        <li>搜索：</li>
        <li>首页
          <select name="s_ishome" class="input" onchange="changesearch()" style="width:60px; line-height:17px; display:inline-block">
            <option value="">选择</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          &nbsp;&nbsp;
          推荐
          <select name="s_isvouch" class="input" onchange="changesearch()"  style="width:60px; line-height:17px;display:inline-block">
            <option value="">选择</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          &nbsp;&nbsp;
          置顶
          <select name="s_istop" class="input" onchange="changesearch()"  style="width:60px; line-height:17px;display:inline-block">
            <option value="">选择</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
        </li>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
              <option value="">请选择分类</option>
              <option value="">产品分类</option>
              <option value="">产品分类</option>
              <option value="">产品分类</option>
              <option value="">产品分类</option>
            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
      </ul>-->
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>订单号</th>
        <th>商品名称</th>
        <th>商品颜色</th>
        <th>商品类型</th>
        <th>商品单价</th>
        <th>商品数量</th>
        <th>商品总价</th>
          <th>付款状态</th>
          <th>下单时间</th>
        <th>操作</th>
      </tr>
      <?php if(is_array($orders) || $orders instanceof \think\Collection || $orders instanceof \think\Paginator): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
          <!--<td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           1</td>-->
            <td><?php echo htmlentities($vo['sub_trade_no']); ?></td>
          <td><?php echo htmlentities($vo['goods_name']); ?></td>
          <td><?php echo htmlentities($vo['goods_color_desc']); ?></td>
          <td><?php echo htmlentities($vo['goods_type']); ?></td>
          <td><?php echo htmlentities($vo['goods_price']); ?></td>
          <td><?php echo htmlentities($vo['goods_num']); ?></td>
          <td><?php echo htmlentities($vo['fee']); ?></td>
            <td><?php echo !empty($vo['pay_status']) ? '已付款' : '未付款'; ?></td>
            <td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?></td>
            <td><div class="button-group">
                <?php if(($vo['exp_no'])): ?>
              <a class="button border-main" href="javascript:;" style="background-color: #8a8a8a;">
                  <span class="icon-edit"></span> 已发货</a>
                <?php else: if(($vo['pay_status'])): ?>
                       <a class="button border-main" href="/admin/order/express/id/<?php echo htmlentities($vo['id']); ?>/aid/<?php echo htmlentities($vo['address_id']); ?>">
                       <span class="icon-edit"></span> 发货</a>
                    <?php else: ?>
                        <a class="button border-main" href="javascript:;" style="background-color: #8a8a8a;">
                            <span class="icon-edit"></span> 发货</a>
                     <?php endif; ?>
                <?php endif; ?>
              <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1,1)">
                  <span class="icon-trash-o"></span> 删除</a> </div>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      <!--<tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a> <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a> 操作：
          <select name="ishome" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeishome(this)">
            <option value="">首页</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          <select name="isvouch" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)">
            <option value="">推荐</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          <select name="istop" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeistop(this)">
            <option value="">置顶</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          &nbsp;&nbsp;&nbsp;
          
          移动到：
          <select name="movecid" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecate(this)">
            <option value="">请选择分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
          </select>
          <select name="copynum" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecopy(this)">
            <option value="">请选择复制</option>
            <option value="5">复制5条</option>
            <option value="10">复制10条</option>
            <option value="15">复制15条</option>
            <option value="20">复制20条</option>
          </select></td>
      </tr>-->
      <tr>
        <td colspan="8"><div class="pagelist"><?php echo $orders; ?></div></td>
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