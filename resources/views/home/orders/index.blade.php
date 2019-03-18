@extends('home.layout')
@section('content')
@section('menu')
 <script type="text/javascript" src="/static/home/js/n_nav.js"></script>  
@endsection
@section('none')
<div class="leftNav none">
@endsection
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
  <div class="m_content">
      <div class="m_left">
          <div class="left_n">管理中心</div>
            <div class="left_m">
              <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                  <li><a href="Member_Order.html" class="now">我的订单</a></li>
                </ul>
            </div>
        </div>
    <div class="m_right">
            <p></p>
            <div class="mem_tit">我的订单</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>                                                                                                                                                    
                <td>订单号</td>
                <td>下单时间</td>
                <td>订单总金额</td>
                <td>订单状态</td>
                <td>操作</td>
              </tr>
              @foreach($orders as $k=>$v)
              <tr>
                <td><font color="#ff4e00">{{$v->oid}}</font></td>
                <td>{{date('Y-m-d H:i:s',$v->created_at)}}</td>
                <td>{{$v->sumprice}}</td>
                <!-- <td>{{ $orders->addr}}</td> -->
                <td>
                    @if($v->status==1)
                        未支付
                    @elseif($v->status==2)
                        已支付
                    @elseif($v->status==3)
                        未发货
                    @elseif($v->status==4)
                        已发货
                    @elseif($v->status==6)
                        已取消
                    @else
                        完成
                    @endif    
                </td>
                
                <td>
                      @if($v->status==1)
                        <a href="/home/orders/del/{{$v->oid}}">取消订单</a>
                      @endif
                </td>
              </tr>
              @endforeach
            </tbody></table>

            
        </div>
    </div>
  <!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td width="72"><img src="/static/home/images/b1.png" width="62" height="62"></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </tbody></table>
      <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td width="72"><img src="/static/home/images/b2.png" width="62" height="62"></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </tbody></table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td width="72"><img src="/static/home/images/b3.png" width="62" height="62"></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </tbody></table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td width="72"><img src="/static/home/images/b4.png" width="62" height="62"></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </tbody></table>
        </div>
    </div>
    <div class="b_nav">
      <dl>                                                                                            
          <dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
          <dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
          <dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
          <dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
          <dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
          <a href="#" class="b_sh1">新浪微博</a>            
          <a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br>
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/static/home/images/er.gif" width="118" height="118"></div>
            <img src="/static/home/images/ss.png">
        </div>
    </div>    
    <div class="btmbg">
    <div class="btm">
          备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br>
            <img src="/static/home/images/b_1.gif" width="98" height="33"><img src="/static/home/images/b_2.gif" width="98" height="33"><img src="/static/home/images/b_3.gif" width="98" height="33"><img src="/static/home/images/b_4.gif" width="98" height="33"><img src="/static/home/images/b_5.gif" width="98" height="33"><img src="/static/home/images/b_6.gif" width="98" height="33">
        </div>      
    </div>
    <!--End Footer End -->    
</div>

@stop