@extends('home.layout')
@section('content')
@section('menu')
 <script type="text/javascript" src="/static/home/js/n_nav.js"></script>  
@endsection
@section('none')
<div class="leftNav none">
@endsection
<div class="top_block1" style="background-image:url('/static/home/images/bg.png');">
    <div class="top_title">
        <h2 class="top_title_h2" style="color:#796a5f;text-align:center;font-size:38px;font-family:微软雅黑;padding-top:65px;">白库排行榜TOP 10</h2>
        <h3 class="top_title_h3" style="color:#DC143C;text-align:center;font-size:16px;font-family:微软雅黑;margin-top:40px;">全站商品，一网打尽！更加超值，更多优惠！折上加折，惊喜不断！</h3>
        <h3 class="top_title_h3" style="color:#DC143C;text-align:center;font-size:16px;font-family:微软雅黑;margin-top:40px;">为您推荐今日最佳好物！</h3>
    </div>
    <div class="top_body">
    @foreach($data as $k=>$v)
    @if(($v->tid)!=0)
    <div class="top_goods" style="padding-top:60px;">
        <a href="/home/goods/detail/{{$v->id}}">
            <div class="goods_top" style="background-color:#796a5f;width:98%;height:35px;color:#D3D3D3;font-size:24px;line-height:32px;text-indent:50px;margin-bottom:15px;">
                今日推荐——好物第{{$v->tid}}名
            </div>
            <div class="goods_smpic" style="height:309px;width:309px;float:left;">
                <img src="/static/home/images/{{$v->gpic}}" alt="{{$v->gname}}" style="height:259px;width:259px;margin-left:25px;margin-bottom:25px;margin-left:25px;margin-right:25px;"/>
            </div>
            <div class="goods_detail" style="height:300px;width:1040;margin-bottom:45px;text-align:left;font-size:20px;font-weight:bold;line-height:54px;color:#FF8C00;">
                商品排名：<span style="font-size:18px;color:black;">第{{$v->tid}}名</span><br/>
                商品名称：<span style="font-size:18px;color:black;">{{$v->gname}}</span><br/>
                商品价格：<span style="font-size:18px;color:black;">￥{{$v->gprice}}</span><br/>
                商品库存：<span style="font-size:18px;color:black;">现余{{$v->stock}}件</span><br/>
                商品详情：<span style="font-size:18px;color:black;">{{$v->gdesc}}</span><br/>
            </div>
        </a>
    </div>
    @endif
    @endforeach
    </div>
</div>
@stop
