<?php /*a:2:{s:65:"/usr/local/nginx/html/shop/application/admin/view/goods/list.html";i:1561314966;s:66:"/usr/local/nginx/html/shop/application/admin/view/public/base.html";i:1567417193;}*/ ?>
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
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
        <form  method="post" action="/admin/search">
            <ul class="search" style="padding-left:10px;">
                <li> <a class="button border-main icon-plus-square-o" href="/admin/goods/create"> 添加内容</a> </li>
                <li>
                    <select name="cat_id" class="input" style="width:200px; line-height:17px;">
                        <option value="">请选择分类</option>
                        <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['cat_id']); ?>"><?php echo htmlentities($vo['cat_name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </li>
                <li>
                    <button type="submit" class="button border-main icon-search"> 搜索</button>
                </li>
            </ul>
        </form>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">ID</th>
            <th>图片</th>
            <th>商品名称</th>
            <th>商品价格</th>
            <th>分类名称</th>
            <th>是否上架</th>
            <th>是否热销</th>
            <th width="10%">更新时间</th>
            <th width="310">操作</th>
        </tr>
        <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
                <?php echo htmlentities($i); ?></td>
            <td width="10%"><img src="/<?php echo htmlentities($vo['goods_img']); ?>" alt="" width="70" height="50" /></td>
            <td><?php echo htmlentities($vo['goods_name']); ?></td>
            <td style="color:#00CC99"><?php echo htmlentities($vo['pro_price']); ?></td>
            <td><?php echo htmlentities($vo['cat_name']); ?></td>
            <?php if(($vo['is_on'])): ?>
            <td><img src="/static/admin/images/yes.gif" alt="" /></td>
            <?php else: ?>
            <td><img src="/static/admin/images/no.gif" alt=""  /></td>
            <?php endif; if(($vo['is_hot'])): ?>
            <td><img src="/static/admin/images/yes.gif" alt="" /></td>
            <?php else: ?>
            <td><img src="/static/admin/images/no.gif" alt=""  /></td>
            <?php endif; ?>
            <td><?php echo htmlentities(date("Y-m-d H:s:i",!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?></td>
            <td><div class="button-group">
                <a class="button border-main" href="/admin/goods/<?php echo htmlentities($vo['goods_id']); ?>/edit">
                    <span class="icon-edit"></span> 修改</a>
                <a class="button border-red" href="javascript:void(0)" onclick="del(<?php echo htmlentities($vo['goods_id']); ?>)">
                    <span class="icon-trash-o"></span> 删除</a>
            </div></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
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
        </tr>
        <tr>
            <td colspan="8"><div class="pagelist"> <?php echo $goods; ?> </div></td>
</tr>
</table>
</div>

<script type="text/javascript">

    //搜索
    function changesearch(){

    }

    //单个删除
    function del(id){
        layer.confirm("您确定要删除此商品吗?",function(){
            $.ajax({
                type:"delete",
                url: '/admin/goods/'+id,
                datatype: "json",
                success: function(res){
                    if(res.status == 'success'){
                        layer.msg(res.msg,{icon:1});
                    }else{
                        layer.msg(res.msg,{icon:2});
                    }
                    location.href = '/admin/goods';
                }
            })
        })
    }

    //全选
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

    //批量删除
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
            $("#listform").submit();
        }
        else{
            alert("请选择您要删除的内容!");
            return false;
        }
    }

    //批量排序
    function sorts(){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){

            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");
            return false;
        }
    }


    //批量首页显示
    function changeishome(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){

            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量推荐
    function changeisvouch(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){


            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量置顶
    function changeistop(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){

            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");

            return false;
        }
    }


    //批量移动
    function changecate(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){

            $("#listform").submit();
        }
        else{
            alert("请选择要操作的内容!");

            return false;
        }
    }

    //批量复制
    function changecopy(o){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){
            var i = 0;
            $("input[name='id[]']").each(function(){
                if (this.checked==true) {
                    i++;
                }
            });
            if(i>1){
                alert("只能选择一条信息!");
                $(o).find("option:first").prop("selected","selected");
            }else{

                $("#listform").submit();
            }
        }
        else{
            alert("请选择要复制的内容!");
            $(o).find("option:first").prop("selected","selected");
            return false;
        }
    }
</script>

</body>
</html>