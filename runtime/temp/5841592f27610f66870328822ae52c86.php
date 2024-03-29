<?php /*a:1:{s:66:"/usr/local/nginx/html/shop/application/admin/view/index/index.html";i:1562681454;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <link rel="stylesheet" href="/static/admin/css/pintuer.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <script src="/static/admin/js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="/static/admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
    </div>
    <div class="head-l"><a class="button button-little bg-green" href="/" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;
        <a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;
        <a class="button button-little bg-red" href="/admin/logout"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    <h2><span class="icon-user"></span>基本设置</h2>
    <ul style="display:block">
        <li><a href="/admin/system" target="right"><span class="icon-caret-right"></span>网站设置</a></li>

    </ul>
    <h2><span class="icon-user"></span>图片管理</h2>
    <ul style="display:block">
        <li><a href="/admin/image" target="right"><span class="icon-caret-right"></span>图片列表</a></li>
        <li><a href="/admin/image/create" target="right"><span class="icon-caret-right"></span>图片添加</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>用户管理</h2>
    <ul>
        <li><a href="/admin/user" target="right"><span class="icon-caret-right"></span>用户列表</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>商品分类</h2>
    <ul>
        <li><a href="/admin/category" target="right"><span class="icon-caret-right"></span>分类列表</a></li>
        <li><a href="/admin/category/create" target="right"><span class="icon-caret-right"></span>分类添加</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>商品管理</h2>
    <ul>
        <li><a href="/admin/goods" target="right"><span class="icon-caret-right"></span>商品列表</a></li>
        <li><a href="/admin/goods/create" target="right"><span class="icon-caret-right"></span>添加商品</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>订单管理</h2>
    <ul>
        <li><a href="/admin/order/index" target="right"><span class="icon-caret-right"></span>订单列表</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>退款管理</h2>
    <ul>
        <li><a href="/admin/order/refund" target="right"><span class="icon-caret-right"></span>待退款列表</a></li>
    </ul>
</div>
<script type="text/javascript">
    $(function(){
        $(".leftnav h2").click(function(){
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>
<ul class="bread">
    <li><a href="" target="right" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">网站信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</php></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
    <iframe scrolling="auto" rameborder="0" src="/admin/system" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
    <p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>