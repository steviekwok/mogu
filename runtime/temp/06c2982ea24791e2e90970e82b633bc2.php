<?php /*a:4:{s:69:"/usr/local/nginx/html/shop/application/home/view/user/order_list.html";i:1562752881;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;s:64:"/usr/local/nginx/html/shop/application/home/view/public/nav.html";i:1562569462;s:65:"/usr/local/nginx/html/shop/application/home/view/public/side.html";i:1562659970;}*/ ?>
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
  <link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" /> 
  <link href="/static/home/css/index.css-a2f37bbc.css" rel="stylesheet" type="text/css" />
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
    <a href="/user/refund"><div class="mu_title">退款</div> </a>
</div>

</div>
</div>
	
	
    <div class="mu_content_wrap">
     <div class="order-title"> 
      <ul class="order-title-column clearfix"> 
       <li class="goods">商品</li> 
       <li class="price">单价(元)</li> 
       <li class="quantity">数量</li> 
       <li class="aftersale">售后</li> 
       <li class="total">实付款(元)</li> 
       <li class="status">交易状态</li> 
       <li class="other">操作</li> 
      </ul> 
     </div> 
     <div id="orderWrap">
      <div class="order-list"> 
       <div class="order-section finished">
        <table class="order-table"> 
         <tbody>
         <?php if(is_array($orders) || $orders instanceof \think\Collection || $orders instanceof \think\Paginator): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <tr class="order-table-header"> 
           <td colspan="7"> 
            <div class="order-info fl"> 
             <span class="no"> 订单编号：
              <span class="order_num"> <?php echo htmlentities($vo['sub_trade_no']); ?> </span>
             </span>
             <span class="deal-time"> 成交时间：<?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?> </span>
            </div></td>
          </tr> 
          <tr class="order-table-item last"> 
           <td class="goods">
            <a class="pic" href="/goods/detail/id/<?php echo htmlentities($vo['goods_id']); ?>" title="查看宝贝详情" hidefocus="true" target="_blank">
             <img src="/<?php echo htmlentities($vo['goods_img']); ?>" alt="查看宝贝详情" width="70" />
            </a>
            <div class="desc"> 
             <p> <a href="/goods/detail/id/<?php echo htmlentities($vo['goods_id']); ?>" target="_blank"><?php echo htmlentities($vo['goods_name']); ?></a></p>
             <p>颜色：<?php echo htmlentities($vo['goods_color_desc']); ?></p>
             <p>尺码：<?php echo htmlentities($vo['goods_type']); ?></p>
            </div>
           </td>
           <td class="price"> <p class="price-old"><?php echo htmlentities($vo['original_price']); ?></p> <p><?php echo htmlentities($vo['goods_price']); ?></p> </td>
           <td class="quantity"><?php echo htmlentities($vo['goods_num']); ?></td>
           <td class="aftersale"> </td> 
           <td class="total" rowspan="1"> <p class="total-price">￥ <?php echo htmlentities($vo['fee']); ?></p> <p> <span>(全国包邮)</span> </p> </td>
           <td class="status" rowspan="1">
            <?php if(($vo['exp_no'])): ?>
            <p>已发货</p>
            <a href="javascript:;" class="order-link go-detail-link" target="_blank">物流查询</a>
            <div class="delivery" data-exp_name="<?php echo htmlentities($vo['exp_name']); ?>" data-exp_no="<?php echo htmlentities($vo['exp_no']); ?>"></div>

            <?php else: ?>
             <p>未发货</p>
            <?php endif; ?>
           </td>
           <td class="other" rowspan="1"> 
            <ul> 
             <li><a class="order-link order-remove" href="javascript:;">删除订单</a></li>
             <?php if(($vo['exp_no'])): if(($vo['is_rec'])): ?>
                  <li><p>已收货</p></li>
               <?php else: ?>
                  <li><a class="order-link order-remove" href="javascript:;" onclick="confirm_goods(<?php echo htmlentities($vo['id']); ?>)">确认收货</a></li>
                <?php endif; if((!$vo['is_refund'])): ?>
                 <li><a class="order-link order-remove" href="/user/refund/oid/<?php echo htmlentities($vo['id']); ?>">申请退款</a></li>
                 <?php elseif(($vo['is_refund']==1)): ?>
                 <li><span class="order-link order-remove" href="javascript:;">正在退款中</span></li>
                 <?php else: ?>
                 <li><span class="order-link order-remove" href="javascript:;">已退款</span></li>
                 <?php endif; ?>
             <?php endif; ?>
            </ul> </td>

          </tr>
         <?php endforeach; endif; else: echo "" ;endif; ?>
         </tbody> 
        </table>
        <div class="pagelist"><?php echo $orders; ?></div>
       </div>
      </div>
     </div> 
    </div> 
   </div> 
  </div>
    <script>
     $(".go-detail-link").hover(function(){
         exp_name = $(".delivery").data('exp_name');
         exp_no = $(".delivery").data('exp_no');

         $.post("/user/query_exp",{'exp_name':exp_name,"exp_no":exp_no},
             function(res){
             if(res.status == 'success'){
                 $('.delivery').html(res.html);
             }
         })
     })

     function confirm_goods(oid) {
         if(confirm('您确认收到货物了吗？')){
             location.href = "/user/comment/oid/"+oid;
         }
     }
    </script>
 </body>
</html>