@extends('home.layout')
@section('content')
@section('menu')
 <script type="text/javascript" src="/static/home/js/n_nav.js"></script>  
@endsection
@section('none')
<div class="leftNav none">
@endsection
<div class="art_body" style="background-image:url('/static/home/images/art_bg.png');background-repeat:repeat-y;width:100%;">
    <div class="art_doc" style="width:88.361749%">
        <div class="art_top" style="width:100%;height:80px;position:relative;top:65px;">
        </div>
        <div class="art_title" style="width:100%;">
            <h2 style="text-align:center;color:#796a5f;font-size:40px;line-height:40px;">天下白库会买专辑</h2>
            <h3 style="text-align:center;color:#DC143C;font-size:22px;line-height:40px;margin-top:45px;margin-bottom:60px;">和您一起做精品，买精品！</h3>
        </div>
        @foreach($data as $k=>$v)
        <div class="art_content" style="width:100%;height:300px;padding-bottom:80px;">
            <div class="content_top" style="background-color:#796a5f;width:100%;height:35px;color:#D3D3D3;font-size:24px;line-height:32px;text-indent:50px;">
                会买攻略
            </div>
            <div class="content_pic" style="height:300px;width:750px;float:left;">
                <img src="{{$v->pic}}" alt="{{$v->title}}">
            </div>
            <div class="content_body" style="height:300px;width:420px;float:right;">
                <h4 style="display:inline-block;width:100%;padding-bottom:5px;border-bottom: 1px solid #df6807;text-align:left;font-size: 20px;line-height:155px;color: #df6807;font-weight:400;text-overflow:ellipsis;overflow:hidden;white-space: nowrap;">{{$v->title}}</h4>
                <p style="height: 120px;padding-top: 14px;font-size: 14px;line-height: 20px;color: #333;letter-spacing: 1px;display: -webkit-box;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 6;-webkit-box-orient: vertical;">{{$v->body}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
