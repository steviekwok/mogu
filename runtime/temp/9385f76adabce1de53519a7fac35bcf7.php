<?php /*a:3:{s:67:"/usr/local/nginx/html/shop/application/home/view/user/back_pay.html";i:1557502205;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;s:64:"/usr/local/nginx/html/shop/application/home/view/public/nav.html";i:1562569462;}*/ ?>
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
         <a href="//shop.mogujie.com/detail/1m4kwsc" data-itemid="1m4kwsc" target="_blank" class="shopitem-link"><img src="/static/home/images/ad25.jpg" alt="" width="64" height="64" /></a>
         <a href="//shop.mogujie.com/detail/1m4kwsc" data-itemid="1m4kwsc" target="_blank" class="shopitem-link re_sidebox_imginfo_t singleline re_link" title="5个装浸塑钢丝家用成人防滑衣架">5个装浸塑钢丝家用成人防滑衣架<p></p></a> 
        </div> 
        <dl class="re_sidebox_dlist re_sidebox_dlist_min"> 
         <dt>
          单价：
         </dt> 
         <dd>
          9.90元 x 1（数量）
         </dd> 
         <dt>
          小计：
         </dt> 
         <dd class="re_red">
          9.90元
         </dd> 
         <dt>
          商家：
         </dt> 
         <dd class="wrap_chat">
          魅蝴家居
          <a href="javascript:;" data-bid="1172tyqi#24" class="mogutalk_widget_btn mogutalk_btn service_chat mogutalk_default">联系客服</a>
         </dd> 
        </dl> 
        <h5 class="re_sidebox_tit">属于订单</h5> 
        <dl class="re_sidebox_dlist"> 
         <dt>
          订单编号：
         </dt> 
         <dd>
          <a target="_blank" class="shopitem-number re_sidebox_imginfo_t singleline re_link shopitem-order" data-orderid="79529847645946" href="//www.mogujie.com/trade/order/detail4buyer?orderId=79529847645946" data-shoporderid="79529847645946">79529847645946</a>
         </dd> 
         <dt>
          店铺优惠：
         </dt> 
         <dd class="">
           未使用 
         </dd> 
         <dt class="">
          全站优惠：
         </dt> 
         <dd class="">
           未使用 
         </dd> 
         <dt>
          总计：
         </dt> 
         <dd>
          0.01元
         </dd> 
         <dt>
          成交时间：
         </dt> 
         <dd>
          2018-09-10 20:45:04
         </dd> 
        </dl> 
       </div> 
       <div class="re_cntbox" id="reView">
        <!-- notice -->
        <p class="re_wnotice ml40 mb20"> <span class="re_wnotice_h">温馨提示：</span> <span>由于银行网点结算需要时间，视银行不同退款完成后现金到账时间大致需要2-10个工作日。</span></p>
        <!-- notice end -->
        <dl class="re_page_step_form" id="refundGoodsFormDom"> 
         <dt>
          <span class="re_red">*</span> 是否收到货：
         </dt> 
         <dd class="get-good-status"> 
          <div class="re_radio"> 
           <input name="getGood" id="getGood1" value="1" checked="checked" type="radio" /> 
           <label for="getGood1">已收到货</label> 
          </div> 
          <div class="re_radio"> 
           <input name="getGood" id="getGood0" value="0" type="radio" /> 
           <label for="getGood0">未收到货/仅退款</label> 
          </div> 
         </dd> 
         <dt>
          <span class="re_red">*</span> 退货原因：
         </dt> 
         <dd id="toAppendDetail"> 
          <select name="" id="refundReason" class="J_refundGoodsReason re_select mr5"> <option data-index="-1">请选择退货原因</option> <option data-index="0" data-noreason="true" value="SEVEN_DAY_NO_REASON" data-reason="物流签收后7天内买家可无理由退货，需满足退货条件">7天无理由退货</option> <option data-index="1" data-noreason="false" value="QUALITY_PROBLEM__MATERIAL" data-reason="面料材质的手感、密度、韧性太差，面料断纱、抽丝、漏针； 配件脱落、残缺断裂，配件无法使用，配件锈蚀、褪色。">料子/配件不好</option> <option data-index="2" data-noreason="false" value="QUALITY_PROBLEM__CRACK" data-reason="商品有破洞、断裂、脱皮； 商品缝线不牢，有裂开、断线、破损。">裂开/破洞</option> <option data-index="3" data-noreason="false" value="DIFFERENT_GOODS__INFO" data-reason="实物原材料成分与图文不符；整体版型与图文不符；整体设计款式与图文不符；部分做工与图文不符；辅料配件不符。">与图文不符</option> <option data-index="4" data-noreason="false" value="DIFFERENT_GOODS__SIZE" data-reason="发错尺码； 套装上下装尺码不匹配；同双鞋有两个码，同双鞋单边脚；实物尺寸与店铺描述的尺寸差异太大；同部位尺寸有互差，例如：两袖、两肩、两裤脚、两鞋跟、鞋头大小长短不同。">尺码不对</option> <option data-index="5" data-noreason="false" value="DIFFERENT_GOODS__COLOR_DIRTY" data-reason="发错颜色； 实物颜色与图文描述相差太大； 有油渍、锈渍、笔痕等脏污。">颜色不对/脏污</option> <option data-index="6" data-noreason="false" value="QUALITY_PROBLEM__FADE" data-reason="商品洗前掉色、掉毛， 商品洗后掉色、掉毛； 因掉色造成染色，或者深浅色互染。">掉色/染色</option> <option data-index="7" data-noreason="false" value="QUALITY_PROBLEM__SMELLING" data-reason="有强烈的刺激性鱼腥味、恶臭味、霉味、汽油煤油味、芳香烃等。">味道太重</option> <option data-index="8" data-noreason="false" value="QUALITY_PROBLEM__THREAD_RESIDUE" data-reason="做工粗糙，商品上多个残余线头未清剪干净。">线头多</option> <option data-index="9" data-noreason="false" value="DIFFERENT_GOODS__BRAND" data-reason="">没有商标/吊牌</option> <option data-index="10" data-noreason="false" value="QUALITY_PROBLEM__WASH_SMALL" data-reason="商品面料密度不均匀，做工不良而造成缩水。 例如：衣服洗涤后尺寸变化较大、外观变形较大。">缩水</option> <option data-index="11" data-noreason="false" value="WRONG_GOODS" data-reason="商家发错货或者存在少发货的情况">破损/少件/错发</option> <option data-index="12" data-noreason="false" value="SLOW" data-reason="商家发货慢">商家发货慢</option> </select> 
          <span id="refundReasonTip" class="J_refundGoodsReasonTip reason_tip re_gray">&nbsp;</span> 
          <div id="refundDetailTip" class="reason_info"></div> 
         </dd> 
         <dt>
          <span class="re_red">*</span> 手机号码：
         </dt> 
         <dd>
          <input class="J_refundGoodsPrice re_text re_min_width" id="refundMobile" value="15588608866" placeholder="请填写您的手机号" type="text" />
         </dd> 
         <dt>
          <span class="re_red">*</span> 退款金额：
         </dt> 
         <dd> 
          <input class="J_refundGoodsPrice re_text re_min_width" id="refundMoney" name="money" value=" 0.01 " data-expense="1" data-max="0.01" data-maxnoship="0.01" type="text" /> 
          <span>元</span> 
          <span class="pl5" id="refundMoneyNotice"> ( 最高金额：<span class="re_red maxRefundExpenseShow" id="maxCash">0.01</span>元 ) </span> 
          <div class="pl5" id="refundMoneyNotice_div"> 
           <div>
             将退回：现金
            <span class="re_red">0.01元</span> 
            <a class="re_gray" style="text-decoration:underline;white-space:nowrap;" href="//cs.mogujie.com/help/faqdetail.html?questionId=115a&amp;catalogId=1fw">退款金额详细说明</a>
           </div> 
          </div> 
         </dd> 
         <dt>
          <span class="re_red">*</span> 退款至：
         </dt> 
         <dd> 
          <div class="re_radio_refbox"> 
           <input class="refboxradio" id="refboxradio_other" name="refund_channel" value="false" checked="checked" type="radio" /> 
           <label for="refboxradio_other">退款至原支付账户</label> 
          </div> 
         </dd> 
         <dt>
          退款说明：
         </dt> 
         <dd> 
          <textarea class="J_refundGoodsDesc re_full_width re_text mt10" placeholder="填写退款说明，退款处理更快捷" name="" id="refundIntro" cols="30" rows="4"></textarea> 
          <p class="follow_tip">最多200字</p> 
         </dd> 
         <dt>
          <span class="re_red refundUpload hidden">*</span>上传凭证：
         </dt> 
         <dd> 
          <a href="javascript:;" class="J_refundGoodsUpload re_witbtn_min mr5">上传图片</a> 最多8张
         </dd> 
         <dt>
          退货运费：
         </dt> 
         <dd> 
          <div id="J_shipServiceSubscribeType" class="J_shipServiceSubscribeType"> 
           <p class="has_money">退货补运费服务补贴价格依据买卖双方的退货地址区间，补贴5-18元不等，实际补贴价格请以系统补贴为准。同一订单多件商品发起多次退货，仅补贴一次</p> 
          </div> 
         </dd> 
         <dd>
          <a id="refundGoodsSubmit" href="javascript:;" data-isrefund="" class="J_refundGoodsSubmit re_norbtn">提交申请</a>
         </dd>
        </dl>
       </div> 
      </div> 
      
     </div> 
    </div> 

   </div> 
  </div> 



 </body>
</html>