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
        	<form action="/home/login/edit" method="post">
              {{csrf_field()}}
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">修改密码</span>
                    <span class="fr">已有商城账号，<a href="/home/login/login" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>
             <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机号 &nbsp;</td>
                <td><input type="password" name="phone" value="" class="l_pwd" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" name="upwd" value="" class="l_pwd" /></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" name="reupwd" value="" class="l_pwd" /></td>
              </tr>
          
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="submit" value="修改" class="log_btn" /></td>
              </tr>
            </table>
            </form>
           
        </div>
    </div>
</div>
  <!-- 显示错误消息 开始 -->
            @if (session('success'))
                  <script>
               layer.alert("{{ session('success') }}");
                </script>
            @endif

            @if (session('error'))
                <script>
                  
                   layer.alert("{{ session('error') }}");
               </script>
            @endif
    <!-- 显示错误消息 结束 -->
 @endsection