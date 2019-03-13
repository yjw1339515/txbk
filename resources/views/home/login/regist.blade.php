@extends('home.login.login')
@section('content')
    

<!--Begin Login Begin-->

<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="Index.html"><img src="/static/home/images/logo.png" /></a></div>
    </div>
	<div class="regist">
    	<div class="log_img"><img src="/static/home/images/l_img.png" width="611" height="425" /></div>
		<div class="reg_c">
        	<form action="/home/login/regist" method="post">
              {{csrf_field()}}
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">注册</span>
                    <span class="fr">已有商城账号，<a href="/home/login/login" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td><input type="text" name="uname" value="" class="l_user" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" name="upwd" value="" class="l_pwd" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" name="reupwd" value="" class="l_pwd" /></td>
              </tr>
           
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" name="phone" value="" class="l_tel" /></td>
              </tr>

              <tr height="50">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>
                    <input type="text" value="" name="code" class="l_ipt" />
                    <input type="submit" value="免费获取验证码" id="123" style="height:38px;" >
                </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<label class="r_rad"><input type="checkbox" id="111" /></label><label class="r_txt">我已阅读并接受《用户协议》</label>
                    </span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="submit" value="立即注册" class="log_btn" /></td>
              </tr>
            </table>
            </form>
           
        </div>
    </div>
</div>
  <!-- 显示错误消息 开始 -->
            @if (session('success'))
                  <script>
                   location.href ="http://www.txbk.com/home/login/login"; 
                     
                </script>
            @endif

            @if (session('error'))
                <script>
                  
                   layer.alert("{{ session('error') }}");
               </script>
            @endif
    <!-- 显示错误消息 结束 -->
      <script>
        $('input[name=uname]').blur(function(){
            var doc=$(this);
            var val= $(this).val();

            var preg=/^[a-zA-Z0-9_-]{6,16}$/;
            
            if(preg.test(val)&&!val==''){
                $.post('/home/login/uname',{'_token':'{{csrf_token()}}','uname':val},
                  function(data){
                       if(data=='ok'){
                          alert('用户名已存在');
                        doc.css('borderColor','red');
                       }else{
                       doc.css('borderColor','green');
                       }
                  },'html');
               

            }else{
              layer.msg('信息格式不正确');
              $(this).css('borderColor','red');
        
            }
        });
        $('input[name=upwd]').blur(function(){
            var val = $(this).val();
            var preg = /^[0-9a-zA-Z_]{6,15}$/;
            if(preg.test(val)&&!val==''){
              
              $(this).css('borderColor','green');
            }else{
              layer.msg('信息格式不正确');
              $(this).css('borderColor','red');
       
            }
        });
          $('input[name=reupwd]').blur(function(){
            var val = $(this).val();
            var val2 = $('input[name=upwd]').val();
            
            if(val==val2&& !val2==''){
            
              $(this).css('borderColor','green');
            }else{
              layer.msg('两次密码不一样');
              $(this).css('borderColor','red');
           
            }
        });
         $('input[name=phone]').blur(function(){
            var val = $(this).val();
            var phone_grep=/^1{1}[3456789]{1}[0-9]{9}$/;
            if(phone_grep.test(val)&&!val==''){
              
              $(this).css('borderColor','green');
            }else{
              layer.msg('手机号输入格式不正确');
              $(this).css('borderColor','red');
          
            }
        });
         $('input[name=code]').blur(function(){
            var val=$(this).val();
            var code=/^[0-9]{4}$/;
            if(code.test(val)&&!val==''){
               $(this).css('borderColor','green');
            }else{
               layer.msg('验证码信息不正确');
              $(this).css('borderColor','red');
             
            }
         });
         

               $('input:submit').eq(1).click(function(){

            if(($('input[name=phone]').css('borderColor')=='rgb(0, 128, 0)')&&
            ($('input[name=uname]').css('borderColor')=='rgb(0, 128, 0)')&&
            ($('input[name=upwd]').css('borderColor')=='rgb(0, 128, 0)')&&
            ($('input[name=reupwd]').css('borderColor')=='rgb(0, 128, 0)')&&
            ($('input[name=code]').css('borderColor')=='rgb(0, 128, 0)')&&
            ($('#111').prop('checked')==true))
            {                  

             }else{
              layer.msg('信息有误');
              return false;
             }


               });



          
         


      </script>

    <script>
     function editCon()
          {
            var t = 60;
            var time = null;
            if(time == null){
              time = setInterval(function(){
                t--;
                // 修改当前button 和 内容
                $('#123').val('重新发送('+t+'s)');
                if(t < 1){
                  // 清除定时器
                  clearInterval(time);
                  time = null;
                  $('#123').val('免费获取验证码');
                  // 设置button状态
                  $('#123').attr('disabled',false);
                }
              },1000);
            }
              
          }
     $('#123').click(function()
        {
            var test = $(this).val();
            //接收手机号码
            var phone = $('input[name=phone]').val();
              //定义正则检查手机号是否格式正确
            var phone_grep=/^1{1}[3456789]{1}[0-9]{9}$/;
              //使用正则检查手机号

            if (!phone_grep.test(phone)){
              return false;
            }
                //获取当前按钮的状态
            $(this).attr('disabled',true);
             // 获取当前按钮上的文字

            if(test=='免费获取验证码'){
            
           $.get('/home/login/phone/'+phone,function(data){
                    if(data.code == 0){
                      editCon();
                     
                    }else{
                      alert(data.msg);
                    }
                  },'json');
            }else{
                return false; 
            }
        });
    </script>
   
<!--End Login End--> 
@endsection
