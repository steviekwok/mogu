<?php /*a:4:{s:67:"/usr/local/nginx/html/shop/application/home/view/address/index.html";i:1559054730;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;s:64:"/usr/local/nginx/html/shop/application/home/view/public/nav.html";i:1560697565;s:65:"/usr/local/nginx/html/shop/application/home/view/public/side.html";i:1562315108;}*/ ?>
﻿<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo htmlentities($sys['title']); ?></title>
    <meta name="description" content="<?php echo htmlentities($sys['description']); ?>" />
    <meta name="keywords" content="<?php echo htmlentities($sys['keywords']); ?>" />
    <script src="/static/admin/js/jquery.js"></script>
    <script src="/static/lib/layer/layer.js"></script>
<link href="/static/home/css/index_1.css" rel="stylesheet" type="text/css" />
<link href="/static/home/css/index.css-93c948fe.css" rel="stylesheet" type="text/css" />
<script src="/static/home/js/jquery.js"></script>
<script src="/static/home/js/distpicker.js" > </script>
<link rel="stylesheet" href="/static/lib/validform/css/style.css">
<script src="/static/lib/validform/js/Validform_v5.3.2_min.js"></script>
<script src="/static/lib/layer/layer.js"></script>
</head>
<body class="media_screen_1200">


<!-- 顶部导航开始-->
<div id="header" class="site-top-nav " data-ptp="_head">
    <div class="wrap">
        <a href="/" rel="nofollow" class="home fl">首页</a>
        <ul class="header-top">
            <?php if((app('session')->get('mobile')==null)): ?>
                <li class="s1 show-nologin"> <a rel="nofollow" class="J_nav_btn_login" href="/user/login">登录</a> </li>
                <li class="s1 show-nologin"> <a rel="nofollow" class="J_nav_btn_login" href="/user/register">注册</a> </li>
            <?php else: ?>
                <li class="s1 show-nologin"> <a rel="nofollow" class="J_nav_btn_login" href="/user/pic">
                    欢迎，<?php echo htmlentities(app('session')->get('mobile')); ?></a>
                </li>
                <li class="s1 show-nologin"> <a rel="nofollow" class="J_nav_btn_login" href="/user/logout">退出</a> </li>
            <?php endif; ?>
            <li class="s1 myorder has-line"> <a href="/admin/user/order_list" target="_blank" class="text display_u" rel="nofollow">我的订单</a> </li>
            <li class="s1 has-line shopping-cart-v2"> <a class="cart-info-wrap" href="/order/cart" target="_blank" rel="nofollow"> <span class="cart-info">购物车</span> </a> <i class="icon-delta"></i> <span class="shopping-cart-loading"></span> </li>
        </ul>
    </div>
</div>
<!-- 顶部导航结束-->


<!-- 中间logo以及搜索区域开始 -->
<div class="header_mid clearfix">
    <div class="wrap clearfix">
        <a href="/" rel="nofollow"  class="logo" title="蘑菇街首页" style="background-image: none;">
            <img src="/<?php echo htmlentities($logo); ?>" alt="蘑菇街，我的买手街" />
        </a>
        <div class="normal-search-content">
            <div class="top_nav_search" id="nav_search_form">
                <!--搜索框 -->
                <div class="search_inner_box clearfix">
                    <div class="selectbox" data-v="1">
                        <span class="selected">搜商品</span>
                    </div>
                    <form action="/search/" method="get" id="top_nav_form">
                        <input data-tel="search_book" name="q" class="ts_txt fl" data-def="牛仔裤" value="" autocomplete="off" def-v="牛仔裤"  type="text" />
                        <input value="搜  索" class="ts_btn" type="submit" />
                        <input name="t" value="bao" id="select_type" type="hidden" />
                    </form>
                    <div class="top_search_hint is-not-ie8-hack"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 中间logo以及搜索区域结束 -->
  


<div id="body_wrap">
    <div class="mu_wrap wrap clearfix">
        <div id="navListWrap">
            <div class="mu_nav_wrap">
                <!---左侧导航开始-->
<div class="mu_nav_info">
    <div class="mu_nav_info_avatar">
        <div class="mu_nav_info_avatar_mk"></div>
        <img src="<?php echo !empty($img_url) ? '/'.$img_url : '/static/home/images/touxiang.jpg'; ?>" width="100" height="100" />
    </div>
    <p class="mu_nav_info_uname"><?php echo htmlentities($mobile); ?></p>
</div>
<div class="mu_nav">
    <a href="/user/pic"><div class="mu_title">头像管理</div> </a>
</div>
<div class="mu_nav">
    <a href="/user/address"><div class="mu_title">地址管理</div> </a>
</div>

<div class="mu_nav">
    <a href="/user/order_list"><div class="mu_title">订单列表</div> </a>
</div>
<div class="mu_nav">
    <a href="/user/wait_pay"><div class="mu_title">待付款</div> </a>
</div>
<div class="mu_nav">
    <a href="/user/back_pay"><div class="mu_title">退款</div> </a>
</div>

</div>
</div>
                <div id="address_wrap">
                    <div class="addr_right topay" isaddress="true">
                        <h2 class="addr_title">地址管理</h2>
                        <div class="addr_edit" id="J_s_addr_edit">
                            <div class="addr_section " aid="570781677">
                                <?php if(is_array($addresses) || $addresses instanceof \think\Collection || $addresses instanceof \think\Paginator): $i = 0; $__LIST__ = $addresses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <ul class="clearfix">
                                    <li class="name"><?php echo htmlentities($vo['name']); ?></li>
                                    <li class="addr"><?php echo htmlentities($vo['pro']); ?><?php echo htmlentities($vo['city']); ?><?php echo htmlentities($vo['dis']); ?><?php echo htmlentities($vo['street']); ?></li>
                                    <li class="mobile"><?php echo htmlentities($vo['mobile']); ?></li>
                                    <li class="oper">
                                        <!--<a href="javascript:;" class="J_default" aid="570781677">设为默认</a>
                                        <a href="javascript:;" class="edit" aid="570781677">编辑</a>-->
                                        <a href="javascript:;" class="del nobd" onclick="delAdd(<?php echo htmlentities($vo['id']); ?>)">删除</a> </li>
                                    <li class="enaddr"></li>
                                </ul>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div><br/>
                            <div class="add_new_addr clearfix">
                                <span id="J_saddAddress">+添加地址</span>
                            </div>
                            <div class="addressbox_warp" style="display:none">
                                <form id="form" method="post" action="/home/Address/add">
                                <div class="addressbox" id="J_sAddrWrap"></div>
                                <div class="address_wrapper">
                                    <div class="__addressPop">
                                        <dl class="address_pop" >
                                            <!--<input class="J_addressid" name="addressId" value="" type="hidden" />
                                            <input class="J_isdefault" name="addressId" value="false" type="hidden" />-->
                                            <dt>
                                                收货人姓名：
                                            </dt>
                                            <dd>
                                                <i class="needicon">*</i>
                                                <input datatype="s2-8" class="text formsize_normal J_name J_form vm" name="name" value="" type="text" />
                                                <span class="prompt name_select"></span>
                                            </dd>
                                            <dt>
                                                手机：
                                            </dt>
                                            <dd>
                                                <i class="needicon">*</i>
                                                <input datatype="mobile" class="text formsize_normal J_mobile J_form vm" name="mobile" value="" type="text" />
                                                <span class="prompt mobile_select"></span>
                                            </dd>
                                            <dt>
                                                省：
                                            </dt>
                                            <dd class="pt_ie6hack">
                                                <i class="needicon">*</i>

                                                <div data-toggle="distpicker">
                                                    <select name="pro" ></select>
                                                    <select name="city"></select>
                                                    <select name="dis"></select>
                                                </div>

                                            </dd>
                                            <dt>
                                                街道地址：
                                            </dt>
                                            <dd>
                                                <i class="needicon">*</i>
                                                <textarea datatype="s5-100" class="textarea formsize_large J_street J_form" name="street" cols="30" rows="3"></textarea>
                                                <span class="prompt breakline">请填写街道地址，最少5个字，最多不能超过100个字</span>
                                            </dd>

                                            <dt></dt>
                                            <dd class="pt10 oper_btn">
                                                <button class="confirm_btn J_okbtn mr10">确认地址</button>
                                                <button class="cancel_btn J_cancelbtn">取消</button>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                </form>
                                <!-- <div class="addressbox addressfirst addresslist" action="/trade/address/addfororder"> </div> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#J_saddAddress').click(function(){
                $('.addressbox_warp').show()
            })

            $('.J_cancelbtn').click(function(){
                $('.addressbox_warp').hide()
            })

            $("#form").Validform({
                tiptype:4,
                datatype:{
                    mobile:/^1[3|5|6|7|8|9]\d{9}$/,
                },
                ajaxPost:true,
                callback:function(res){
                    if(res.status=='success') {
                        layer.msg("添加成功",{icon:1});
                    }else{
                        layer.msg("添加失败",{icon:2});
                    }
                    location.href = "/user/address";
                }
            });

            function delAdd(id) {
                layer.confirm('你确实要删除这条地址吗',function(){
                    $.post('/home/Address/del',{id:id}, function(res){
                        if(res.status=='success') {
                            layer.msg("删除地址成功",{icon:1});
                        }else{
                            layer.msg("删除地址失败",{icon:2});
                        }
                        location.href = "/user/address";
                    })
                })
            }
        </script>
</body>
</html>