@extends('home.layout')
@section('content')
    
@section('menu')
 <script type="text/javascript" src="/static/home/js/n_nav.js"></script>  
@endsection
@section('none')
<div class="leftNav none">
@endsection
<!--End Menu End--> 

    <!--End 筛选条件 End-->
    
    <div class="content mar_20">
    	<div class="l_history">
        	<div class="his_t">
            	<span class="fl">浏览历史</span>
                <span class="fr"><a href="#">清空</a></span>
            </div>
        	<ul>
            	<li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_1.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_2.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>768.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_3.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="/home/goods/detasil/{goodsid}">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>680.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_4.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
                <li>
                    <div class="img"><a href="#"><img src="/static/home/images/his_5.jpg" width="185" height="162" /></a></div>
                	<div class="name"><a href="#">Dior/迪奥香水2件套装</a></div>
                    <div class="price">
                    	<font>￥<span>368.00</span></font> &nbsp; 18R
                    </div>
                </li>
        	</ul>
        </div>
        <div class="l_list">
        	<div class="list_t">
            	
                	
            </div>
            <div class="list_c">
            	
                <ul class="cate_list">
                    @foreach ($goods as $k => $v)
                        @if(empty($gz))
                            <li>
                                <div class="img"><a href="/home/goods/detail/{{$v->id}}"><img src="/static/home/images/{{$v->gpic}}" width="210" height="185" /></a></div>
                                <div class="price">
                                    <font>￥<span>{{ $v -> gprice}}</span></font> &nbsp; 
                                </div>
                                <div class="name"><a href="#">{{ $v -> gname}}</a></div>
                                <div class="carbg">
                                <a href="/home/concern/create/{{$v->id}}" class="ss">关注</a>
                                <a href="#" class="j_car">加入购物车</a>
                                </div>
                            </li>
                            @else
                            <li>
                                <div class="img"><a href="/home/goods/detail/{{$v->id}}"><img src="/static/home/images/{{$v->gpic}}" width="210" height="185" /></a></div>
                                <div class="price">
                                    <font>￥<span>{{ $v -> gprice}}</span></font> &nbsp; 
                                </div>
                                <div class="name"><a href="#">{{ $v -> gname}}</a></div>
                                <div class="carbg">
                                <a href="/home/concern/create/{{$v->id}}" class="ss">
                                @foreach($gz as $kk => $vv)
                                @if($v->gname == $vv -> gname)
                                取消
                                @else
                                关注 
                                @endif
                                @endforeach
                                </a>
                                <a href="#" class="j_car">加入购物车</a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                
                <div class="pages">
                	<a href="#" class="p_pre">上一页</a><a href="#" class="cur">1</a><a href="#">2</a><a href="#">3</a>...<a href="#">20</a><a href="#" class="p_pre">下一页</a>
                </div>
                
                
                
            </div>
        </div>
    </div>
 
@endsection
