@extends('home.layout')
@section('content')

<div class="i_bg">  
    <div class="content mar_20">
    	<img src="/static/home/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div  class="content mar_20">
    	<table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>
    @if (!$goods)
        <h1>购物车空空如也</h1>
    @else
        @foreach($goods as $k=>$v)
            <tr>
                <td>
                        <div class="c_s_img"><img src="/static/home/images/{{$v['gpic']}}" width="73" height="73" /></div>
                    {{$v['gname']}}
                </td>

                <td align="center">
                    <div class="c_num">
                        <input type="button" id="plus" value="" onclick="goodsJian(this,{{$v['gid']}},{{$v['gprice']}});" class="car_btn_1" />
                        <input type="text" id="cnt{{$v['gid']}}"  value="{{$v['cnt']}}" name="" class="car_ipt" />  
                        <input type="button"  onclick="goodsJia(this,{{$v['gid']}},{{$v['gprice']}});" class="car_btn_2" />
                    </div>
                </td>

                <td align="center" id ="xiaoji{{$v["gid"]}}"style="color:#ff4e00;">{{$v['gprice']*$v['cnt']}}</td>

                <td align="center"><a onclick="shanchu(this,{{$v['gid']}});">删除</a>&nbsp; &nbsp;<a href="#">关注</a></td>
           </tr>
        @endforeach
    @endif

          <tr height="70">
          	<td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
            	<label class="r_rad"><input type="checkbox" name="clear" checked="checked" /></label><label class="r_txt">清空购物车</label>
                <span class="fr">商品总价：<b id="zongji" style="font-size:22px; color:#ff4e00;">{{$sumprice}}</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
          	<td colspan="6" align="right">
            	<a href="#"><img src="/static/home/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="/home/cart/orders"><img src="/static/home/images/buy2.gif" /></a>
            </td>
          </tr>
        </table>
        
    </div>
	<!--End 第一步：查看购物车 End--> 
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/static/home/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href=""  class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-删除商品 End-->
<script>
$(document).ready(function(){
//加的效果
$("#goodsJia").click(function(){
var n=$(this).prev().val();
var num=parseInt(n)+1;
if(num==0){ return;}
$(this).prev().val(cnt);
});

//减的效果
$(".#goodsJian").click(function(){
var n=$(this).next().val();
var num=parseInt(n)-1;
if(num==0){ return}
$(this).next().val(cnt);
});

}

</script>
@stop