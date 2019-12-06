<?php /*a:3:{s:66:"/usr/local/nginx/html/shop/application/home/view/user/comment.html";i:1562338691;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;s:64:"/usr/local/nginx/html/shop/application/home/view/public/nav.html";i:1560697565;}*/ ?>
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

<link href="/static/home/css/index_3.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" />
<link href="/static/home/css/index.css-3bbe4d5f.css" rel="stylesheet" type="text/css" />

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
 <div id="body" class="fm960">
  <div class="re_wrap">
   <form action="/user/do_comment" method="post">
    <h1 class="re_tit"> 评价商品 </h1>
    <div class="re_content" id="reContentView">
     <div class="re_main clearfix">
      <div class="re_sidebox fl">
       <h5 class="re_sidebox_tit">商品</h5>
       <div class="re_sidebox_imginfo">
        <a href="/goods/detail/id/<?php echo htmlentities($order['goods_id']); ?>"  target="_blank" class="shopitem-link">
         <img src="/<?php echo htmlentities($order['goods_img']); ?>" alt="" width="64" height="64" />
        </a>
        <a href="/goods/detail/id/<?php echo htmlentities($order['goods_id']); ?>" target="_blank" class="shopitem-link re_sidebox_imginfo_t singleline re_link">
         <?php echo htmlentities($order['goods_name']); ?><p></p></a>
       </div>
       <dl class="re_sidebox_dlist re_sidebox_dlist_min">
        <dt>
         单价：
        </dt>
        <dd>
         <?php echo htmlentities($order['goods_price']); ?>元 x <?php echo htmlentities($order['goods_num']); ?>（数量）
        </dd>
        <dt>
         小计：
        </dt>
        <dd class="re_red">
         <?php echo htmlentities($order['fee']); ?>元
        </dd>
       </dl>
       <h5 class="re_sidebox_tit">属于订单</h5>
       <dl class="re_sidebox_dlist">
        <dt>
         订单编号：
        </dt>
        <dd>
         <a target="_blank" class="shopitem-number re_sidebox_imginfo_t singleline re_link shopitem-order">
          <?php echo htmlentities($order['sub_trade_no']); ?></a>
        </dd>
        <dt>
         总计：
        </dt>
        <dd>
         <?php echo htmlentities($order['fee']); ?>元
        </dd>
        <dt>
         成交时间：
        </dt>
        <dd>
         <?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($order['create_time'])? strtotime($order['create_time']) : $order['create_time'])); ?>
        </dd>
       </dl>
      </div>
      <div class="re_cntbox" id="reView">
       <!-- notice -->
       <dl class="re_page_step_form" id="refunGoodsFormDom">
        <dt>
         商品评价：
        </dt>
        <dd>
         <input type="hidden" name="goods_id" value="<?php echo htmlentities($order['goods_id']); ?>" />
         <input type="hidden" name="order_id" value="<?php echo htmlentities($order['id']); ?>" />
         <textarea class="J_refundGoodsDesc re_full_width re_text mt10" placeholder="填写退款说明，退款处理更快捷" name="content" id="refundIntro" cols="30" rows="4"></textarea>
         <p class="follow_tip">最多200字</p>
        </dd>
        <dd>
         <button id="refundGoodsSubmit" href="javascript:;" class="J_refundGoodsSubmit re_norbtn">提交申请</button>
        </dd>
       </dl>
      </div>
     </div>

    </div>
   </form>
  </div>

 </div>
</div>

</body>
</html>