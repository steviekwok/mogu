<?php /*a:4:{s:65:"/usr/local/nginx/html/shop/application/home/view/index/index.html";i:1560357889;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;s:64:"/usr/local/nginx/html/shop/application/home/view/public/nav.html";i:1562569462;s:67:"/usr/local/nginx/html/shop/application/home/view/public/footer.html";i:1557501209;}*/ ?>
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

<link rel="stylesheet" type="text/css" href="/static/home/css/cubeactcomponent.css" media="all" />
<link rel="stylesheet" href="/static/home/css/osvol.css" />
<script src="/static/home/js/index.js"></script>

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
 <div class="page_activity  ">


  <div class="module_row module_row_1047915 MOD_ID_248606 has-log-mod" data-mid="1047915" data-versionid="2817022" id="m1047915" data-editable="0" data-acm="3.mf.1_0_0.0.0.0.mf_15261_1047915">
   <div class="mod_row MCUBE_MOD_ID_248606 J_mod_row_show" style="width: 100%; margin-bottom: 15px; background-color: rgb(66, 185, 93);">



    <div>
     <div class="pc_banner_wrapper clearfix">
      <!-- 商品导航开始 -->
      <div class="pc_indexPage_nav_menu fl cube-acm-node has-log-mod" data-source-type="mce" data-source-key="110119">

       <ul class="nav_list dropdown-menu" role="mebu">
        <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="nav_list_row" data-topic="A_1">
         <dl class="nav_wrap">
          <dt class="nav_list_title">
           <a rel="nofollow" class="catagory color_false" target="_blank" ><?php echo htmlentities($vo['cat_name']); ?></a>
          </dt>
          <dd class="nav_list_content">
              <span class="nav_list_content_span">
               <?php if(is_array($vo['sub_cats']) || $vo['sub_cats'] instanceof \think\Collection || $vo['sub_cats'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sub_cats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
               <a href="/goods/list/id/<?php echo htmlentities($v['cat_id']); ?>" rel="nofollow" style="cursor: pointer;" class="first color_true" target="_blank" >
                <?php echo htmlentities($v['cat_name']); ?> </a>
              <?php endforeach; endif; else: echo "" ;endif; ?>
              </span>
          </dd>
         </dl>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
       </ul>

      </div>
      <!-- 商品导航结束 -->


      <!-- 导航右边轮播开始 -->
      <div class="item_slider fl lazyData">
       <div class="mslide_content_box" id="pc_banner_top">
        <div class="mslide_banners" style="background-color: rgb(66, 185, 93);">
         <a target="_blank" need-remove="no" style="z-index: 1; display: block;">
          <img class="J_dynamic_img fill_img" src="/<?php echo htmlentities($img_url); ?>" alt="" />
         </a>
        </div>

       </div>
      </div>
      <!-- 导航右边轮播结束 -->
     </div>
    </div>
   </div>
  </div>
 </div>

 <!-- 导航下面的广告图片开始-->
 <div class="module_row module_row_1047916 MOD_ID_914628 has-log-mod" >
  <div class="mod_row MCUBE_MOD_ID_914628 J_mod_row_show" style="margin-bottom:48px">
   <div class="bottom sel1 lazyData" >
    <a rel="nofollow" class="bot-img img2 J_dynamic_imagebox cube-acm-node J_loading_success has-log-mod"  target="_blank" >
     <img class="J_dynamic_img fill_img" src="/static/home/images/ad1.jpg" alt="" />
    </a>
    <a rel="nofollow" class="bot-img img2 J_dynamic_imagebox cube-acm-node J_loading_success has-log-mod"  target="_blank"  >
     <img class="J_dynamic_img fill_img" src="/static/home/images/ad2.jpg" alt="" />
    </a>
    <a rel="nofollow" class="bot-img img2 J_dynamic_imagebox cube-acm-node J_loading_success has-log-mod"  target="_blank" >
     <img class="J_dynamic_img fill_img" src="/static/home/images/ad3.jpg" alt="" />
    </a>
    <a rel="nofollow" class="bot-img img2 J_dynamic_imagebox cube-acm-node J_loading_success has-log-mod"  target="_blank" >
     <img class="J_dynamic_img fill_img" src="/static/home/images/ad4.jpg" alt="" />
    </a>
   </div>
  </div>
 </div>
 <!-- 导航下面的广告图片结束-->

 <!-- 中间的商品展示开始--->
 <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
 <div class="module_row module_row_1047918 MOD_ID_927998 has-log-mod" >
  <div class="mod_row MCUBE_MOD_ID_927998">
   <!--右边区域要绑定的资源位-->
   <div class="mainContent" style="margin-bottom:48px;">
    <div class="topLink">
     <!--顶部标题链接-->
     <div class="lazyData clearfix cateTitleBar yahei" >
      <div class="sideIcon" style="background-color: #8FABFF"></div>
      <div class="cateTitleName col333">
       <?php echo htmlentities($vo['name']); ?>
      </div>
     </div>
    </div>
    <div class="clearfix" >
     <!--左边大图-->
     <div class="leftBanner fl lazyData cube-acm-node has-log-mod" >
      <a href="#" target="_blank" class="cube-acm-node">
       <img class="leftBannerImg fl " src="/static/home/images/ad5.jpg" />
      </a>
     </div>
     <!--中间左边商品轮播-->
     <div class="topSwiper fl lazyData" >
      <div class="mslide_content_box">
       <div class="mslide_banners">
        <div class="mslide_banner clearfix mslide_banner_show" style="left: 0px;">
         <?php if(is_array($vo['index_goods']) || $vo['index_goods'] instanceof \think\Collection || $vo['index_goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['index_goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
         <div class="swiper-item fl">
          <a href="/goods/detail/id/<?php echo htmlentities($v['goods_id']); ?>" class="cube-acm-node has-log-mod" target="_blank" >
           <div class="swiper-img-wrap J_dynamic_imagebox J_loading_success"  >
            <img class="J_dynamic_img fill_img" src="/<?php echo htmlentities($v['goods_img']); ?>" alt="" />
           </div> <p class="swiper-item-title"><?php echo htmlentities($v['goods_name']); ?></p>
           <p class="swiper-item-price"> <span>&yen;</span><?php echo htmlentities($v['pro_price']); ?> </p>
          </a>
         </div>
         <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

       </div>
      </div>

     </div>
     <div class="otherSlider lazyData" ></div>
     <!--右边区域-->
     <div class="rightWrapper fl lazyData">
      <div class="bg-white">
       <div class="header-wrapper">
        <span class="goods-shopName">热销商品推荐</span>
        <span class="turn-next">换一批</span>
       </div>

       <?php if(is_array($vo['hot_goods']) || $vo['hot_goods'] instanceof \think\Collection || $vo['hot_goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['hot_goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
       <a class="right-goods-item clearfix cube-acm-node has-log-mod" href="/goods/detail/id/<?php echo htmlentities($v['goods_id']); ?>" target="_blank" >
        <div class="J_dynamic_imagebox right-goods-img fl J_loading_success" >
         <img class="J_dynamic_img fill_img" src="/<?php echo htmlentities($v['goods_img']); ?>" alt="" />
        </div>
        <div class="goods-info fl">
         <p class=" goods-info-title"><?php echo htmlentities($v['goods_name']); ?></p>
         <p class=" goods-info-price"><span>&yen;</span><?php echo htmlentities($v['pro_price']); ?></p>
        </div></a>
       <?php endforeach; endif; else: echo "" ;endif; ?>

      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <?php endforeach; endif; else: echo "" ;endif; ?>
 <!-- 中间的商品展示开始--->
</div>
<!---footer开始-->
<div class="foot J_siteFooter" data-ptp="_foot" style="background: rgb(245, 245, 245) none repeat scroll 0% 0%;">
    <div class="mgj_copyright">
        <div class="mgj_footer_helper"></div>
        <div class="mgj_footer_otherlink">
            <p class="mgj_footer_otherlink_container"></p>
        </div>

        <div class="mgj_footer_copyright">
            <p class="mgj_footer_copyright_container">

                <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="#"><?php echo htmlentities($sys['footer']); ?></a>

            </p>
        </div>
    </div>
</div>
    <!---footer结束-->

</body>
</html>