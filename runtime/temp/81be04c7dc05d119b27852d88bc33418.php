<?php /*a:2:{s:64:"/usr/local/nginx/html/shop/application/home/view/user/login.html";i:1561629519;s:67:"/usr/local/nginx/html/shop/application/home/view/public/header.html";i:1560500399;}*/ ?>
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
  <link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" /> 
  <link href="/static/home/css/index.css-944b1a6d.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/static/lib/validform/css/style.css">
<script src="/static/lib/layer/layer.js"></script>
<script src="/static/lib/validform/js/Validform_v5.3.2_min.js"></script>
<style type="text/css">
 .disable {background-color: #dddddd!important;}
</style>
 </head> 
 <body class="media_screen_1200"> 
  
  <div id="body_wrap"> 
   <div class="login_wrap"> 
    <div class="logo_wrap"> 
     <div class="logo"> 
      <a title="蘑菇街" href="//www.mogujie.com" class="mainlogo logo_mgj_img"></a> 
      <!-- 新增登陆页绑定手机提示 --> 
      <span class="login-logo-tip">依《网络安全法》相关要求，即日起蘑菇街会员登陆需绑定手机。为保障您的账户安全及正常使用，如您尚未绑定，请尽快完成绑定，感谢您的理解和支持!</span> 
     </div> 
    </div> 
    <div class="content clearfix" style="background:url(/static/home/images/login.jpg) no-repeat center center;"> 
     <div class="lg_banner"> 
     </div> 
     <div class="lg_left ui-option-main-box" id="lg_content"> 
      <!-- 登陆方式tab --> 
      <div class="toggle-qrcode"></div> 

      <div class="login_mod_tab"> 
       <div class="fl mod"> 
        <a class="lo_mod tab_on" lo-mod="normal" href="javascript:;" title="普通登入">登陆</a> 
       </div> 

      </div> 
      <div id="signform" class="formbox"> 
       <p class="error_tip" style="display: block;">请输入用户名/邮箱/手机号</p> 
       <div class="lg_form"> 
        <form id="form" method="post" action="/user/login">
         <!-- 正常登陆 start --> 
         <div class="mod_box lo_mod_box" data-isshow="0"> 
          <div class="ui-sign-item ui-name-item lg_item lg_name">
           <input maxlength="32" class="ui-input pwd_text"  datatype="mobile" name="mobile" id="mobile" placeholder="手机号" style="border-color:#CFCFCF;" type="text" />
          </div> 
          <div class="ui-sign-item ui-sign-common-item lg_item lg_pass">
           <input maxlength="32" class="ui-input pwd_text" datatype="password" name="password" value="" placeholder="密码" style="border-color:#CFCFCF;" type="password" />
          </div>

            <div class="lg_item lg_getcode"> 
            <a href="javascript:;" class="get_tel_code" id="get_tel_code">获取动态密码</a> 
            <input maxlength="32" class="ui-input pwd_text width_180" name="code" datatype="s4-4" placeholder="动态密码" style="border-color:#CFCFCF;" type="text" />
           </div> 		  
         </div> 


         <div class="lg_login clearfix"> 
          <input value="登陆" class="sub" type="submit" /> 
         </div> 
 
         <div class="lg_reg"> 
          <a class="findpwd" href="/user/findpwd">忘记密码</a> 
         </div> 

        </form> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div>
  <script>
      function delayURL(url,time){
          setTimeout("top.location.href = '" + url + "'",time);
      }

      $('#get_tel_code').click(function(){
          mobile = $('#mobile').val();
          if($('.lg_name span').hasClass('Validform_wrong')) {
              return false;
          }
          //正在发送短信60秒内，防重复发送
          if($('#get_tel_code').hasClass('disable')) {
              return false;
          }
          $.post('/user/send',{mobile:mobile},function(res) {
              var seconds = 60;
              $('#get_tel_code').addClass('disable');
              if (res.status == 'success') {
                  window.setInterval(redirection, 1000, "发送成功");
              } else {
                  window.setInterval(redirection, 1000, "发送失败");
              }
              function redirection(status) {
                  if (seconds <= 0) {
                      window.clearInterval();
                      return;
                  }
                  seconds--;
                  $('#get_tel_code').text(status+seconds);
                  if (seconds == 0) {
                      window.clearInterval();
                      $('#get_tel_code').text("获取动态密码");
                      $('#get_tel_code').removeClass('disable');
                  }
              }
          })
      });

      $("#form").Validform({
          tiptype:4,
          datatype:{
              mobile:/^1[3|5|6|7|8|9]\d{9}$/,
              password:/^[a-zA-Z0-9!@#$%^&*,.]{6,30}$/
          },
          ajaxPost:true,
          callback:function(res){
              if(res.status=='success') {
                  layer.msg(res.msg,{icon:1});
                  delayURL('/user/pic',3000);
              }else{
                  layer.msg(res.msg,{icon:2});
              }
          }
      });
  </script>

 </body>
</html>