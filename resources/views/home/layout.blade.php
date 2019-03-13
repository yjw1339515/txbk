<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/static/home/css/style.css" />
    <!--[if IE 6]>
    <script src="/static/home/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a');
        </script>
    <![endif]-->
     <link rel="stylesheet" type="text/css" href="/static/home/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/MagicZoom.css" />
    <script type="text/javascript" src="/static/home/js/jquery-1.11.1.min_044d0927.js"></script>
    <script type="text/javascript" src="/static/home/js/jquery.bxslider_e88acd1b.js"></script>
    <script type="text/javascript" src="/static/home/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/home/js/menu.js"></script>
    <script type="text/javascript" src="/static/home/js/select.js"></script>
    <script type="text/javascript" src="/static/home/js/lrscroll.js"></script>
    <script type="text/javascript" src="/static/home/js/iban.js"></script>
    <script type="text/javascript" src="/static/home/js/fban.js"></script>
    <script type="text/javascript" src="/static/home/js/f_ban.js"></script>
    <script type="text/javascript" src="/static/home/js/mban.js"></script>
    <script type="text/javascript" src="/static/home/js/bban.js"></script>
    <script type="text/javascript" src="/static/home/js/hban.js"></script>
    <script type="text/javascript" src="/static/home/js/tban.js"></script>
   <script type="text/javascript" src="/static/home/js/lrscroll_1.js"></script>
   <script type="text/javascript" src="/static/home/js/n_nav.js"></script>

<title>尤洪</title>
</head>
<body>
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
                <div class="s_city_bg">
                	<div class="s_city_t"></div>
                    <div class="s_city_c">

                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
                @if (session('homeUsers'))

                <span class="fl">你好，{{ session('homeUsers.uname') }}<a href="/home/login/logout">退出</a>&nbsp;

                @else
                <span class="fl">你好，请<a href="/home/login/login">登录</a>&nbsp;
                @endif
                <a href="Regist.html" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;
                <a href="/home/orders/index">我的订单</a>&nbsp;|</span>
        	<span class="ss">
                &nbsp;

            	<a href="/home/concern/index">我的关注</a>               

            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/static/home/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="/home/index/index"><img src="/static/home/images/logo.png" /></a></div>
    <div class="search">
    	<form>
        	<input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
    	<div class="car_t">购物车 [ <span>3</span> ]</div>
        <div class="car_bg">
       		<!--Begin 购物车未登录 Begin-->
        	<div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
            	<li>
                	<div class="img"><a href="#"><img src="/static/home/images/car1.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="/static/home/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="/static/home/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End-->
<!--Begin Menu Begin-->
<div class="menu_bg">
	<div class="menu">
    	<!--Begin 商品分类详情 Begin-->
    	<div class="nav">
        	<div class="nav_t">全部商品分类</div>
            @if (!empty($show))
            <div class="leftNav">
            @else
            <div class="leftNav none">
            @endif
                <ul>
                    @foreach ( $common_cates_data as $k => $v)

                    <li>
                    	<div class="fj">
                        	<span class="n_img"><span></span></span>
                            <span class="fl">{{$v -> cname}}</span>
                        </div>
                        <div class="zj"  ">

                            <div class="zj_l" >

                                <div>
                                   @foreach ($v['sub'] as $kk => $vv)
                                    <a href="/home/cates/index/{{$vv->id}}">{{$vv -> cname }}</a> |
                                    @endforeach
                                </div>

                            </div>

                            <div class="zj_r">
                                <a href="#"><img src="/static/home/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/static/home/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>
                        @endforeach
                </ul>
            </div>
        </div>
        <!--End 商品分类详情 End-->

    	<ul class="menu_r">
        	<li><a href="Index.html">首页</a></li>
            <li><a href="Food.html">美食</a></li>
            <li><a href="Fresh.html">生鲜</a></li>
            <li><a href="HomeDecoration.html">家居</a></li>
            <li><a href="SuitDress.html">女装</a></li>
            <li><a href="MakeUp.html">美妆</a></li>
            <li><a href="Digital.html">数码</a></li>
            <li><a href="GroupBuying.html">团购</a></li>
        </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
<!--End Menu End-->
@section('content')


@show
    <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/home/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/home/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/home/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/home/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
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
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/static/home/images/er.gif" width="118" height="118" /></div>
            <img src="/static/home/images/ss.png" />
        </div>
    </div>
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/static/home/images/b_1.gif" width="98" height="33" /><img src="/static/home/images/b_2.gif" width="98" height="33" /><img src="/static/home/images/b_3.gif" width="98" height="33" /><img src="/static/home/images/b_4.gif" width="98" height="33" /><img src="/static/home/images/b_5.gif" width="98" height="33" /><img src="/static/home/images/b_6.gif" width="98" height="33" />
        </div>
    </div>
    <!--End Footer End -->
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
