<?php /*a:3:{s:65:"/usr/local/nginx/html/shop/application/home/view/user/refund.html";i:1562680290;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;s:64:"/usr/local/nginx/html/shop/application/home/view/public/nav.html";i:1562569462;}*/ ?>
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
            <li class="s1 myorder has-line"> <a href="/user/order_list" target="_blank" class="text display_u" rel="nofollow">我的订单</a> </li>
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
     <h1 class="re_tit"> 退款流程 </h1> 
     <div class="re_content" id="reContentView"> 
      <div class="re_process"> 
       <div class="re_process_wrap re_process_step1"> 
        <div class="re_process_sd"></div> 
        <i class="re_process_i re_process_i1"> 1 <span class="re_process_tip">提交申请</span> <span class="mdx_process_tip_bt"> </span> </i> 
        <i class="re_process_i re_process_i2"> 2 <span class="re_process_tip">官方客服处理</span> <span class="mdx_process_tip_bt"> </span> </i> 
        <i class="re_process_i re_process_i3"> 3 <span class="re_process_tip">退款完成</span> <span class="mdx_process_tip_bt"> </span> </i> 
       </div> 
      </div> 
      <div class="re_main clearfix"> 
       <div class="re_sidebox fl"> 
        <h5 class="re_sidebox_tit">退货/退款商品</h5> 
        <div class="re_sidebox_imginfo"> 
         <a href="/goods/detail/id/<?php echo htmlentities($order['goods_id']); ?>" target="_blank" class="shopitem-link">
          <img src="/<?php echo htmlentities($order['goods_img']); ?>" alt="" width="64" height="64" />
         </a>
         <a href="/goods/detail/id/<?php echo htmlentities($order['goods_id']); ?>" target="_blank" class="shopitem-link re_sidebox_imginfo_t singleline re_link" title="<?php echo htmlentities($order['goods_name']); ?>">
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
          <span class="shopitem-number re_sidebox_imginfo_t singleline re_link shopitem-order">
           <?php echo htmlentities($order['sub_trade_no']); ?>
          </span>
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
          <?php echo htmlentities(date("Y-m-d H:s:i",!is_numeric($order['create_time'])? strtotime($order['create_time']) : $order['create_time'])); ?>
         </dd> 
        </dl> 
       </div> 
       <div class="re_cntbox" id="reView">
        <form action="/user/apply_refund" method="post">
        <!-- notice -->
        <p class="re_wnotice ml40 mb20"> <span class="re_wnotice_h">温馨提示：</span> <span>由于银行网点结算需要时间，视银行不同退款完成后现金到账时间大致需要2-10个工作日。</span></p>
        <!-- notice end -->
        <dl class="re_page_step_form" id="refundGoodsFormDom"> 
         <dt>
          <span class="re_red">*</span> 是否收到货：
         </dt> 
         <dd class="get-good-status"> 
          <div class="re_radio"> 
           <input name="get_good" id="getGood1" value="1" checked="checked" type="radio" />
           <label for="getGood1">已收到货</label> 
          </div> 
          <div class="re_radio"> 
           <input name="get_good" id="getGood0" value="0" type="radio" />
           <label for="getGood0">未收到货/仅退款</label> 
          </div> 
         </dd>
         <dt>
          退款说明：
         </dt> 
         <dd> 
          <textarea class="J_refundGoodsDesc re_full_width re_text mt10" placeholder="填写退款说明，退款处理更快捷" name="content" id="refundIntro" cols="30" rows="4"></textarea>
          <p class="follow_tip">最多200字</p>
          <input type="hidden" name="order_id" value="<?php echo htmlentities($order['id']); ?>" />
         </dd>
         <dd>
          <button id="refundGoodsSubmit"  class="J_refundGoodsSubmit re_norbtn">提交申请</button>
         </dd>
        </dl>
        </form>
       </div> 
      </div> 
      
     </div> 
    </div> 

   </div> 
  </div> 



 </body>
</html>