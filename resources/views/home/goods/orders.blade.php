@extends('home.layout')
@section('content')
@section('menu')
 <script type="text/javascript" src="/static/home/js/n_nav.js"></script>  
@endsection
@section('none')
<div class="leftNav none">
@endsection
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="/static/home/images/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
    	<div class="two_bg">
        	<div class="two_t">
            	<span class="fr"><a href="#"></a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
              </tr>
	@foreach($goods as $k=>$v)
              <tr>
                <td>
                    <div class="c_s_img"><img src="/static/home/images/{{$v['gpic']}}" width="73" height="73" /></div>
                    {{$v['gname']}}
                </td>
                <td align="center">{{$v['cnt']}}</td>
                <td align="center" style="color:#ff4e00;">{{$v['gprice']*$v['cnt']}}</td>
              </tr>
	@endforeach
              <tr>
                <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                    商品总价：{{$sum}}  
                </td>
              </tr>
            </table>
 
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="70">
                <td align="right">
                	<b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">{{$sum}}</span></b>
                </td>
              </tr>
              <tr height="70">
                <td align="right"><a href="/home/cart/qry"><img src="/static/home/images/btn_sure.gif" /></a></td>
              </tr>
            </table>

            
        	
        </div>
    </div>
	<!--End 第二步：确认订单信息 End-->
    
  @stop