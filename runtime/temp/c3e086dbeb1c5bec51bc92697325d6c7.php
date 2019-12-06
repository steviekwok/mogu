<?php /*a:3:{s:63:"/usr/local/nginx/html/shop/application/home/view/order/pay.html";i:1562571440;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;s:67:"/usr/local/nginx/html/shop/application/home/view/public/footer.html";i:1557501209;}*/ ?>
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
  <link href="/static/home/css/index.css-709a8a6f_1.css" rel="stylesheet" type="text/css" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" /> 
  <link href="/static/home/css/vpop.css-9d5fabc4.css" rel="stylesheet" type="text/css" /> 

 </head> 
 <body class="media_screen_1200"> 
 
  
  <div id="body_wrap"> 
   <div class="g-header clearfix "> 
    <div class="g-header-in wrap clearfix trade"> 
     <div class="process-bar"> 
      <div class="md_process md_process_len4 md_process_"> 
       <div class="md_process_wrap md_process_step3_5"> 
        <div class="md_process_sd md_process_sd_"></div> 
        <i class="md_process_i md_process_i1"> 1 <span class="md_process_tip">购物车</span> </i> 
        <i class="md_process_i md_process_i2"> 2 <span class="md_process_tip">确认订单</span> </i> 
        <i class="md_process_i md_process_i3"> 3 <span class="md_process_tip">支付</span> </i> 
        <i class="md_process_i md_process_i4"> <img src="static/picture/right.png" alt="" width="23" height="23" /> <span class="md_process_tip">完成</span> </i> 
       </div> 
      </div> 
     </div> 
     <a title="蘑菇街|我的买手街" href="javascript:;" target="_blank"> 
      <div class="logo logo-cashier"></div> </a> 
    </div> 
   </div> 
   <div class="wrap g-wrap " id="J_proxy"> 
    <div class="md-order-head clearfix"> 
     <h2 class="tit fl"> 
      <div class="tit-product">
        <?php echo htmlentities($goods_name); ?> 等<?php echo htmlentities($total_num); ?>件
      </div> <span class="J_cashierTimer" data-timer="899" data-tpl="&lt;span&gt;请您于&lt;/span&gt;
                &lt;span class='color-red'&gt;%h时%i分%s秒&lt;/span&gt;&lt;span&gt;内完成支付&lt;/span&gt;"><span>请您于</span> <span class="color-red">0时14分28秒</span><span>内完成支付</span></span> <span class="tit-fw">(逾期将被取消)</span> </h2> 
     <span class="mon fr" style="visibility:hidden">
      <span>应付金额：</span>
      <span class="mon-num"> <span>&yen;</span> <span id="J_OrderData" ><?php echo htmlentities($total_price); ?></span> </span> </span>
    </div> 
    <div class="md-discount" id="J_productPay"> 
     <ul class="banklist-line banklist-btm"> 
      <!-- 平台支付 --> 
      <li class="banklist-item J_banklistItem J_2step2 s-banklist-item-select" data-method="wechatPay"
          data-extrainfo="eyJtYXJrZXRIb25nYmFvQW1vdW50IjoiRnVycHhMRGJCaytsUUxZTlhmL2thQT09IiwibWFya2V0UmVkdWNlQW1vdW50IjoiRnVycHhMRGJCaytsUUxZTlhmL2thQT09In0="
          data-init="true"> <i class="product-icon icon-wechatPay"></i> <span class="earnname"> 微信支付 </span>
       <span class="paynum payhover"> 实付金额：<span class="num">￥ <?php echo htmlentities($total_price); ?></span> </span>
       <ul class="md-paytab md-paymethod" id="J_paymethod" style="display: block;"> 
        <li> 
         <div class="paytab-main J_paytabMain J_paytabMain_normal clearfix fn-wechatPay" style="display: block;"> 
          <!-- 银联 万里通 网上银行 --> 
          <div class="md-order-foot clearfix fn-nextbtn"> 
           <a href="javascript:;" class="btn-pay fr J_payOrder">确认并付款</a> 
          </div> 
          <!-- 微信扫码 --> 
          <div class="code2-wechat clearfix fn-wechat-detail"> 
           <div class="code-wrap"> 
            <img class="code J_wechatCode" src="static/picture/qr_code.img" alt="" width="230" height="230" /> 
           </div> 
           <div class="tip"> 
            <h5>请使用微信扫描二维码<br />以完成支付</h5> 
            <p> <a href="http://cs.mogujie.com/help/faqdetail.html?questionId=16he" target="_blank" class="link">详细使用帮助</a> </p> 
            <p>（如果支付遇到问题，可<a href="http://cs.mogujie.com/help/contactus.html" target="_blank" class="link">联系客服</a>）</p> 
           </div> 
          </div> 
          <!-- 支付宝扫码 --> 
          <div class="code2-alipay clearfix fn-alipay-detail"> 
           <div class="code-wrap"> 
            <iframe class="code J_alipayCode" scrolling="no" src="" width="320" height="250" frameborder="0"></iframe> 
           </div> 
           <div class="tip"> 
            <h5>请使用支付宝扫描二维码<br />以完成支付</h5> 
            <p> <a href="http://cs.mogujie.com/help/faqdetail.html?questionId=16hc&amp;catalogId=&amp;ptp=1.Cj9W8.0.0.gKklJqw" target="_blank" class="link">详细使用帮助</a> </p> 
            <p>（如果支付遇到问题，可 <a href="http://cs.mogujie.com/help/contactus.html" target="_blank" class="link">联系客服</a>）</p> 
           </div> 
          </div> 
         </div> </li> 
       </ul></li> 
      <!-- 平台支付 --> 
      <!-- 网上银行 -->
     
     </ul> 
    </div> 
    <p class="bottom-tip">&nbsp;</p> 
   </div> 
  </div> 
  <div class="g-footer"> 
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