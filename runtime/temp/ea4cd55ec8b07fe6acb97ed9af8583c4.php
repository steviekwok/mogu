<?php /*a:2:{s:64:"/usr/local/nginx/html/shop/application/home/view/order/cart.html";i:1561288248;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;}*/ ?>
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
<link href="/static/home/css/index.css-709a8a6f.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" />
<link href="/static/home/css/index.css-d20df184.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/static/home/js/pkg-pc-base.js"></script>

</head>
<div class="media_screen_1200">
 <div id="body_wrap">
  <div class="g-header clearfix">
   <div class="g-header-in wrap clearfix">
    <div class="process-bar">
     <div class="md_process md_process_len4">
      <div class="md_process_wrap md_process_step1_5">
       <div class="md_process_sd"></div>
       <i class="md_process_i md_process_i1"> 1 <span class="md_process_tip">购物车</span> </i>
       <i class="md_process_i md_process_i2"> 2 <span class="md_process_tip">确认订单</span> </i>
       <i class="md_process_i md_process_i3"> 3 <span class="md_process_tip">支付</span> </i>
       <i class="md_process_i md_process_i4"> <img src="static/picture/171012_12eba941iia4fajf729ked218cd8k_23x23.png" alt="" width="23" height="23" /> <span class="md_process_tip">完成</span> </i>
      </div>
     </div>
    </div>
    <div class="logo logo-cart"></div>
   </div>
  </div>

  <form id="form" method="post" action="/order/topay">
   <div class="g-wrap wrap">
    <ul class="clearfix cart_slide" id="cartSlide">
     <li> <a href="javascript:;" url="0" class="mr55 cart_slide_item cartSlideItemAll cart_slide_item_cur  "> 全部商品 <span class="num">1</span> </a> </li>
    </ul>
    <!-- 不为空的情况 -->
    <?php if(isset($goods_cart)): ?>
    <div class="cart_wrap cart_nobdbtm">
     <div class="cart_page_wrap" id="cartPage">
      <input name="type" value="cart" type="hidden" />
      <!-- 表格 -->

      <table class="cart_table" id="cartOrderTable">
       <thead>
       <tr>
        <th class="cart_table_check_wrap cart_alleft">
         <input type="checkbox" id="s_all_h" name="toggle-checkboxes" class="cart_thcheck" />
         <label for="s_all_h">全选</label> </th>
        <th class="cart_table_goods_wrap"></th>
        <th class="cart_table_goodsinfo_wrap">商品信息</th>
        <th>单价(元)</th>
        <th class="cart_table_goodsnum_wrap">数量</th>
        <th class="cart_table_goodssum_wrap">小计(元)</th>
        <th class="cart_table_goodsctrl_wrap">操作</th>
       </tr>
       </thead>
       <tbody>

       <?php if(is_array($goods_cart) || $goods_cart instanceof \think\Collection || $goods_cart instanceof \think\Paginator): $i = 0; $__LIST__ = $goods_cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <tr class="cart_mitem " >
        <td class="vm ">
         <input class="cart_thcheck" id="chk" name="checkItem[]" value="<?php echo htmlentities($vo['cart_id']); ?>" type="checkbox" />
        </td>
        <td class="cart_table_goods_wrap">
         <!-- 商品 -->
         <a href="/goods/detail/id/<?php echo htmlentities($vo['goods_id']); ?>" target="_blank" class="cart_goods_img">
          <img class="cartImgTip" src="/<?php echo htmlentities($vo['goods_img']); ?>" alt="<?php echo htmlentities($vo['goods_name']); ?>" width="78" height="78" />
         </a>
         <!-- 商品title -->
         <a href="/goods/detail/id/<?php echo htmlentities($vo['goods_id']); ?>" target="_blank" class="cart_goods_t cart_hoverline" title="<?php echo htmlentities($vo['goods_name']); ?>">
          <?php echo htmlentities($vo['goods_name']); ?>
         </a>
        </td>
        <td>
         <p class="cart_lh20">颜色： <?php echo htmlentities($vo['goods_color_desc']); ?></p>
         <p class="cart_lh20">尺码： <?php echo htmlentities($vo['goods_type']); ?></p>
        </td>
        <td class="cart_alcenter">
         <!-- 单价 -->
         <p class="cart_lh20 cart_throughline cart_lightgray"><?php echo htmlentities($vo['original_price']); ?></p>
         <p class="cart_lh20 cart_bold cart_data_sprice" data-price=""><?php echo htmlentities($vo['pro_price']); ?> </p>
        </td>
        <td class="cart_alcenter">
         <!-- 数量 -->
         <div>
          <div class="cart_num cart_counter">
           <?php echo htmlentities($vo['goods_num']); ?>
          </div>
         </div>
        </td>
        <td class="cart_alcenter">
         <!-- 小计 -->
         <p class="cart_deep_red cart_font16 item_sum" data-unit="59.9" data-price=""><?php echo htmlentities($vo['goods_num']*$vo['pro_price']); ?></p>
        </td>
        <td class="cart_alcenter">
         <!-- 操作 --> <a href="javascript:;" class="cart_hoverline delete" onclick="delCart(<?php echo htmlentities($vo['cart_id']); ?>)">删除</a>
        </td>
       </tr>
       <?php endforeach; endif; else: echo "" ;endif; ?>
       </tbody>
      </table>
      <!-- 表格 end -->
     </div>

     <?php else: ?>
     <div class="cart_page_wrap" id="cartEmptyPage">
      <div class="cart_empty cart_empty_act">
       <img class="cart_empty_bg" src="static/picture/180503_5e06dl842kklj4ifbbcbldjl4cb7a_514x294.png" />
       <h5 class="">购物车还是空的哦</h5>
       <p class="tip">领券购买更划算</p>
      </div>
     </div>

     <?php endif; ?>
     <div class="cart_paybar wrap" id="cartPaybar">
      <a href="javascript:;" class="cart_paybtn fr cart_paybtn_disable" id="payBtn">去付款</a>
      <div class="cart_paybar_info_cost cart_deep_red cart_bold cart_font26 cart_money fr goodsSum">
       &yen; 0.00
      </div>
      <div class="cart_paybar_info cart_pregray fr">
       共有
       <span class="cart_deep_red goodsNum">0</span> 件商品，总计：
      </div>
     </div>
    </div>
   </div>
  </form>
 </div>
</div>
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
    <span class="mgj_footer_copyright_span color_999">营业执照：</span>
    <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="#">913301065526808764</a>
    <b class="mgj_footer_b color_999"> | </b><span class="mgj_footer_copyright_span color_999">网络文化经营许可证：</span>
    <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="#">浙网文（2016）0349-219号</a>
    <b class="mgj_footer_b color_999"> | </b><span class="mgj_footer_copyright_span color_999">增值电信业务经营许可证：</span>
    <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="#">浙B2-20110349</a>

   </p>
  </div>
 </div>
 <!---footer结束-->
 <script>
     $("#s_all_h").click(function(){
         if($(this).is(':checked')){
             $('.cart_thcheck').prop('checked',true);
         }else {
             $('.cart_thcheck').prop('checked',false);
             /*$('input[name="checkItem[]"]').parents('.item-form').removeClass('item-selected');*/
         }
     })
     function autoCheck() {
         var check = $('input[name="checkItem[]"]');
         var toggle = $('#s_all_h');//全选框
         var bool = true;
         for (i = 0; i < check.length; i++) {
             if (!check[i]['checked']) {
                 bool = false;
                 break;
             }
         }
         if (bool) {
             toggle.prop('checked', true);
         } else if (!bool && toggle.prop('checked')) {
             toggle.prop('checked', false);
         }

         if($('#chk').is(':checked')){
             if ($("#payBtn").hasClass('cart_paybtn_disable')) {
                 $("#payBtn").removeClass('cart_paybtn_disable');
             }
         }else{
             if (!$("#payBtn").hasClass('cart_paybtn_disable')) {
                 $("#payBtn").addClass('cart_paybtn_disable');
             }
         }
     }
     $('.cart_thcheck').click(function(){
         autoCheck();
     });

     $("#payBtn").click(function(){
         var check = $('input[name="checkItem[]"]');
         var bool = false;
         for (i = 0; i < check.length; i++) {
             if (check[i]['checked']) {
                 bool = true;
                 break;
             }
         }
         if (!bool) {
             alert("请先选择商品");
             return false;
         }
         $('#form').submit();
     });

     function delCart(id){
         layer.confirm("您确定要从购物车删除此商品吗?",function() {
             $.post("/cart/del_cart", {id:id}, function(res){
                 if(res.status == 'success'){
                     layer.msg("删除成功",{icon:1});
                 }else{
                     layer.msg("删除失败",{icon:2});
                 }
                 location.reload();
             })
         })
     }
 </script>
 </body>
 </html>