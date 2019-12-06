<?php /*a:3:{s:66:"/usr/local/nginx/html/shop/application/home/view/goods/detail.html";i:1562342172;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;s:64:"/usr/local/nginx/html/shop/application/home/view/public/nav.html";i:1562569462;}*/ ?>
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
<link href="/static/home/css/index.css-2b71aaa8.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" />
<link href="/static/home/css/index.css-e7d1fc05.css" rel="stylesheet" type="text/css" />
<link href="/static/home/css/icon.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/static/home/js/mwp.all.js"></script>


<link rel="stylesheet" type="text/css" href="/static/home/css/shopheader.css" />
</head>
<body class="media_screen_1200 is-pintuan">
<script type="text/javascript">

    MOGUPROFILE = {};

</script>

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
  

<div class="J-shop-top-nav">

 <div id="body_wrap">

  <div class="shop-detail">

   <div class="detail-primary clearfix">
    <div class="primary-goods">
     <div class="clearfix">
      <div class="fl goods-info goods-info-dacu" id="J_GoodsInfo">
       <div class="info-box">
        <h1 class="goods-title">
         <span itemprop="name"><?php echo htmlentities($goods['goods_name']); ?></span></h1>
        <div class="goods-prowrap goods-main">

         <div class="clearfix main-box">
          <dl class="clearfix property-box J_NowPrice_Wrap">
           <dt class="property-type property-type-now">
            现价：
           </dt>
           <dd class="property-cont property-cont-now fl">
            <span class="price">&yen;<?php echo htmlentities($goods['pro_price']); ?></span>
            <span >&yen;<?php echo htmlentities($goods['original_price']); ?></span>
           </dd>
           <dd class="property-extra fr">
            <span class="mr10">评价： <span class="num"> <?php echo htmlentities($com_count); ?> </span> </span>
            <span>累计销量： <span class="num J_SaleNum"> 170 </span> </span>
           </dd>
          </dl>

          <dl id="J_ModuleModou" style="display:none" class="clearfix property-box"></dl>
          <div id="J_ModulePromotions">

           <div class="promotions-occupying"></div>
          </div>
          <dl id="J_ModuleCustomProperty" style="display:none" class="clearfix property-box"></dl>
         </div>
        </div>

        <form id="form" method="post" action="/order/topay">
        <div class="goods-prowrap goods-sku" id="J_GoodsSku">
         <div class="content">
          <div class="pannel-title">
           <span class="choose-goods-info">选择商品信息</span>
           <b class="J_PannelClose pannel-close"></b>
          </div>
          <div class="box">
           <dl class="clearfix" style="display: block;">
            <dt>
             颜色：
            </dt>
            <dd>
             <ol id="goods_color" class="J_StyleList style-list clearfix">
              <?php if(is_array($goods['goods_color']) || $goods['goods_color'] instanceof \think\Collection || $goods['goods_color'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods['goods_color'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <li class="img" data-color-desc="<?php echo htmlentities($goods['goods_color_desc'][$key]); ?>"><img src="/<?php echo htmlentities($vo); ?>" alt="<?php echo htmlentities($goods['goods_color_desc'][$key]); ?>"/><b></b></li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
             </ol>
             <input name="goods_color_desc" id="goods_color_desc" type="hidden">
            </dd>
           </dl>
           <dl class="clearfix" style="display: block;">
            <dt>
             尺码：
            </dt>
            <dd>
             <ol id="goods_color_type" class="J_SizeList size-list clearfix">
              <?php if(is_array($goods['goods_type']) || $goods['goods_type'] instanceof \think\Collection || $goods['goods_type'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods['goods_type'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <li  data-type="<?php echo htmlentities($vo); ?>" ><?php echo htmlentities($vo); ?></li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
             </ol>
             <input name="goods_type" id="goods_type" type="hidden">
            </dd>
           </dl>
           <dl class="clearfix">
            <dt>
             数量：
            </dt>
            <dd class="num clearfix">
             <div id="J_GoodsNum" class="goods-num fl" data-stock="1921">
              <span class="num-reduce num-disable"></span>
              <input autocomplete="off" id="goods_num" name="goods_num" class="num-input" value="1" type="text" />
              <input id="goods_id"  name="goods_id" value="<?php echo htmlentities($goods['goods_id']); ?>" type="hidden" />
              <input name="type" value="buy" type="hidden" />
              <span class="num-add "></span>
             </div>
             <div class="J_GoodsStock goods-stock fl">
              库存1921件
             </div>
             <div class="J_GoodsStockTip goods-stock-tip fl">
              您所填写的商品数量超过库存！
             </div>
             <div class="J_EventDesc"></div>
            </dd>
           </dl>
          </div>
          <div class="pannel-action">
           <a href="javascript:;" class="J_PannelOK pannel-ok">确认</a>
          </div>
         </div>
         <div class="goods-buy clearfix">
          <a href="javascript:;" id="buy" class="fl mr10 buy-btn buy-now">购买</a>
          <a href="javascript:;" id="cart" class="fl mr10 buy-cart buy-btn"><i class="m-icon m-icon-shopping-cart"></i></a>

         </div>
        </div>
        </form>
        <div class="goods-extra clearfix">
         <div class="extra-services">
          <div class="fl clearfix label">
           服务承诺：
          </div>
          <ul class="fl clearfix list">
           <li class="item">  <img src="/static/home/images/ad13.png" width="24" height="24" /> 全国包邮 </a> </li>
           <li class="item">  <img src="/static/home/images/ad14.png" width="24" height="24" /> 7天无理由退货 </a> </li>
           <li class="item">  <img src="/static/home/images/ad15.png" width="24" height="24" /> 72小时发货 </a> </li>
           <li class="item"> <span class="link"> <img src="/static/home/images/ad16.png" width="24" height="24" /> 延误必赔 </span> </li>
           <li class="item">  <img src="/static/home/images/ad17.png" width="24" height="24" /> 退货补运费 </a> </li>
          </ul>
         </div>
         <div class="extra-pay">
          <div class="fl clearfix label">
           支付方式：
          </div>
          <div class="fl list list-nomaibei"></div>
         </div>
        </div>
       </div>
      </div>
      <div class="fl goods-topimg" id="J_GoodsImg">
       <div class="big-img">
        <img id="J_BigImg" src="/<?php echo htmlentities($goods['goods_img']); ?>" alt="" width="400" />
       </div>
       <div id="J_SmallImgs" class="small-img" style="display: none;">
        <div class="box">
         <div class="list">
          <ul class="clearfix" style="text-align: center;"></ul>
         </div>
        </div>

       </div>
      </div>
     </div>
    </div>
   </div>


   <div id="J_ModulePintuan">

    <div class="modal-mask"></div>

   </div>
   <div class="detail-content ">

    <!-- 主体 -->
    <div class="col-main">
     <!-- 模块标签页 -->
     <div class="module-tabpanel" id="J_ModuleTabpanel">
      <!-- 选项栏 -->
      <div class="tabbar-box">
       <ul class="tabbar-list clearfix">
        <li data-panels="graphic,recommend" data-hasnav="true" class="tab-graphic selected"> <a href="javascript:;">商品详情</a> </li>
        <li data-panels="rates" data-hasnav="false"> <a href="javascript:;">累计评价<em>：<?php echo htmlentities($com_count); ?></em></a> </li>

        <!-- 购物车模块 -->
        <li class="module-cart" id="J_ModuleCart">
         <div class="cart-info">
          <div class="ui-hd cart-hd">
           <div class="cart-name" href="javascript:;">
            <span><i></i>加入购物车</span>
           </div>
          </div>
          <div class="cart-occupying ui-hide"></div>
         </div> </li>
       </ul>
      </div>
      <div class="tabbar-bg ui-hide">
       <div class="bg-right"></div>
       <div class="bg-left"></div>
      </div>
      <div class="tabbar-occupying ui-hide"></div>
      <!-- 选项页 -->
      <div class="panel-box">
       <!-- 图文详情 -->
       <div class="module-panel module-graphic" id="J_ModuleGraphic">
        <!-- 图文详情 -->
        <!--     注：PHP模板走的是本地模板文件：views/modules/module-graphic.php-->
        <!-- 商品描述 -->
        <div id="J_Graphic_desc">
         <div class="panel-title">
          <h1>商品描述</h1>
         </div>
         <!-- 描述 -->
         <div class="graphic-text">
          <img src="/<?php echo htmlentities($goods['goods_desc']); ?>">
         </div>
        </div>
        <!-- 产品参数 -->
        <div id="J_Graphic_产品参数">
         <div class="panel-title">
          <h1>产品参数</h1>
         </div>
         <!-- 产品参数 -->
         <div class="graphic-block">
          <!-- 描述 -->
          <!-- 表格 -->
          <table class="parameter-table" id="J_ParameterTable">
           <tbody>
           <tr class="">
            <td>图案: 纯色</td>
            <td>厚薄: 普通</td>
            <td>颜色: 黑色,白色</td>
           </tr>
           <tr class="">
            <td>袖型: 喇叭袖</td>
            <td>衣门襟: 套头</td>
            <td>尺码: 均码</td>
           </tr>
           <tr class="">
            <td>衣长: 常规款（51-65cm）</td>
            <td>版型: 收腰</td>
            <td>季节: 春秋</td>
           </tr>
           <tr class="">
            <td>材质: 针织</td>
            <td>领型: 一字领</td>
            <td>袖长: 长袖</td>
           </tr>
           <tr class="">
            <td>风格: 简约</td>
           </tr>
           </tbody>
          </table>
         </div>
        </div>

        <!-- 尺码说明 -->
        <div id="J_Graphic_尺码说明">
         <div class="panel-title">
          <h1>尺码说明</h1>
         </div>
         <!-- 尺码说明 -->
         <div class="graphic-block">
          <!-- 描述 -->
          <!-- 表格 -->
          <table class="size-table">
           <thead>
           <tr>
            <td>尺码</td>
            <td>胸围</td>
            <td>袖长</td>
            <td>肩宽</td>
            <td>衣长</td>
           </tr>
           </thead>
           <tbody>
           <tr>
            <td>均码</td>
            <td>80-110</td>
            <td>59</td>
            <td>40</td>
            <td>52</td>
           </tr>
           </tbody>
          </table>
          <!-- 提醒 -->
          <div class="size-text">
           ※ 以上尺寸为实物人工测量，因测量当时不同会有1-2cm误差，相关数据仅作参考，以收到实物为准。
          </div>
         </div>
        </div>
       </div>
       <!-- 累计评价 -->
       <div class="module-panel module-rates ui-none" id="J_ModuleRates">
        <div id="J_RatesBuyer">
         <div class="rates-buyer">
          <div class="comment-content">
           <div class="nav clearfix">
            <a href="javascript:;" data-type="all" class="c">全部评价（<?php echo htmlentities($com_count); ?>）</a>
           </div>

           <div id="J_RatesBuyerList" class="comments">
           <?php if(is_array($comments) || $comments instanceof \think\Collection || $comments instanceof \think\Paginator): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="item clearfix" data-id="1166rdcs">
             <div class="info">
              <div class="info-w">

               <div class="info-t clearfix">
                <span class="name"><?php echo htmlentities(substr_replace($vo['mobile'],'****',3,4)); ?></span>
                <span class="date"><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?></span>
               </div>

               <div class="info-m">
                <?php echo htmlentities($vo['content']); ?>
               </div>

               <div class="info-b clearfix">
                <p> <span class="sku-choose">颜色:<?php echo htmlentities($vo['goods_color_desc']); ?> 尺码:<?php echo htmlentities($vo['goods_type']); ?> </span> </p>
                <p> </p>
               </div>
              </div>
             </div>
             <div class="face">
              <img src="/static/home/images/ad21.jpg" />
             </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
           </div>
          </div>
         </div>
        </div>
        <!-- 成交记录 -->
        <div id="J_RatesOrder">
         <div class="panel-title rates-title">
          <h1>成交记录</h1>
         </div>
         <!-- 成交记录 -->
         <div class="rates-order">
          <!-- 列表 -->
          <div class="sale-list" id="J_RatesOrderList"></div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- 侧边栏 -->
    <div class="col-sidebar">
     <!-- 店铺模块 -->
     <div class="module-shop" id="J_ModuleShop">


      <!-- 看了又看模块 -->
      <div class="module-repeat" id="J_ModuleRepeat">
       <!-- 看了又看 -->
       <!--     注：PHP模板走的是本地模板文件：views/modules/module-repeat.php-->
       <!-- 看了又看信息 -->
       <div class="ui-box repeat-info">
        <h3 class="ui-hd">看了又看</h3>
        <div class="ui-bd">
         <!-- 列表 -->
         <ul class="repeat-list">
          <li data-id="1lj1nhy">
           <a class="pic" href="detail.html" target="_blank">
            <img class="lazy loggered" src="/static/home/images/ad20.jpg"  style="display: block;" /> </a>
           <a class="title" href="detail.html" target="_blank">时尚金丝绒套装女2018秋冬新款韩版刺绣加绒运动休闲卫衣两件套潮</a>
           <div class="info">
            <div class="price">
             <em class="price-u">&yen;</em>
             <span class="price-n">84.9</span>
            </div>
            <div class="fav">
             <em class="fav-i"></em>
             <span class="fav-n">758</span>
            </div>
           </div> </li>
          <li data-id="1lj1nhy">
           <a class="pic" href="detail.html" target="_blank">
            <img class="lazy loggered" src="/static/home/images/ad20.jpg"  style="display: block;" /> </a>
           <a class="title" href="detail.html" target="_blank">时尚金丝绒套装女2018秋冬新款韩版刺绣加绒运动休闲卫衣两件套潮</a>
           <div class="info">
            <div class="price">
             <em class="price-u">&yen;</em>
             <span class="price-n">84.9</span>
            </div>
            <div class="fav">
             <em class="fav-i"></em>
             <span class="fav-n">758</span>
            </div>
           </div> </li>
          <li data-id="1lj1nhy">
           <a class="pic" href="detail.html" target="_blank">
            <img class="lazy loggered" src="/static/home/images/ad20.jpg"  style="display: block;" /> </a>
           <a class="title" href="detail.html" target="_blank">时尚金丝绒套装女2018秋冬新款韩版刺绣加绒运动休闲卫衣两件套潮</a>
           <div class="info">
            <div class="price">
             <em class="price-u">&yen;</em>
             <span class="price-n">84.9</span>
            </div>
            <div class="fav">
             <em class="fav-i"></em>
             <span class="fav-n">758</span>
            </div>
           </div> </li>
         </ul>
        </div>
       </div>
      </div>
     </div>
    </div>
    <script>
     $('#cart').click(function(){
         goods_color_desc = $('#goods_color .c').data('color-desc');
         goods_type = $('#goods_color_type .c').data('type');
         goods_num = $('#goods_num').val();
         goods_id = $('#goods_id').val();

         if(goods_color_desc==undefined || goods_type==undefined){
             alert('请先选择需要买的商品选项');
             return false;
         }
         if(goods_num>200) {
             alert('抱歉！此商品一次限买200件');
             return false;
         }

         $.post('/cart/add',
             {goods_id:goods_id, goods_num:goods_num, goods_type:goods_type, goods_color_desc:goods_color_desc},
             function(){
             location.href = "/order/cart";
             }
         )
     });

     $('#buy').click(function(){
         goods_color_desc = $('#goods_color .c').data('color-desc');
         goods_type = $('#goods_color_type .c').data('type');


         if(goods_color_desc==undefined || goods_type==undefined){
             alert('请先选择需要买的商品选项');
             return false;
         }
         if(goods_num>200) {
             alert('抱歉！此商品一次限买200件');
             return false;
         }

         $('#goods_color_desc').val(goods_color_desc);
         $('#goods_type').val(goods_type);

         $('#form').submit();
/*         location.href = "/order/topay/goods_id/"+goods_id+"/goods_num/"+goods_num+"/goods_color_desc/"
             +goods_color_desc+"/goods_type/"+goods_type+"/type/buy";*/
     });

     var detailInfo = {
         saleStartTime: '',
         state: Number('0') || 0,
         rushState: Number('') || 0,
         detailType: 'item',
         main: {
             originPrice: '',
             nowPrice: '',
             topImages:  []
         },
         attribute:  [] ,
         listBanner:  {} ,
         redPacketsSwitch:  false ,
         loginUserId:  "1bc06ng" ,
         isLogin:  true ,
         isMoguer:  false ,
         isNewPriceItem:  false ,

         skuInfo:  {},

         itemInfo:  {},
         priceRuleImg:  '' ,
         threeDModel:  ''     };
    </script>
    <script type="text/javascript" src="/static/home/js/index-1.js"></script>
</body>
</html>