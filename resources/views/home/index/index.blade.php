@extends('home.layout')
@section('content')

<div class="i_bg bg_color">
    <div class="i_ban_bg">
        <!--Begin Banner Begin-->
        <div class="banner">        
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    <li><img src="/static/home/images/ban1.jpg" width="740" height="401" /></li>
                    <li><img src="/static/home/images/ban1.jpg" width="740" height="401" /></li> 
                    <li><img src="/static/home/images/ban1.jpg" width="740" height="401" /></li> 
                </ul>   
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
            <div class="news_t">
                <span class="fr"><a href="#">更多 ></a></span>新闻资讯
            </div>
            <ul>
                <li><span>[ 特惠 ]</span><a href="#">掬一轮明月 表无尽惦念</a></li>
                <li><span>[ 公告 ]</span><a href="#">好奇金装成长裤新品上市</a></li>
                <li><span>[ 特惠 ]</span><a href="#">大牌闪购 · 抢！</a></li>
                <li><span>[ 公告 ]</span><a href="#">发福利 买车就抢千元油卡</a></li>
                <li><span>[ 公告 ]</span><a href="#">家电低至五折</a></li>
            </ul>
            <div class="charge_t">
                话费充值<div class="ch_t_icon"></div>
            </div>
            <form>
            <table border="0" style="width:205px; margin-top:10px;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td width="33">号码</td>
                <td><input type="text" value="" class="c_ipt" /></td>
              </tr>
              <tr height="35">
                <td>面值</td>
                <td>
                    <select class="jj" name="city">
                      <option value="0" selected="selected">100元</option>
                      <option value="1">50元</option>
                      <option value="2">30元</option>
                      <option value="3">20元</option>
                      <option value="4">10元</option>
                    </select>
                    <span style="color:#ff4e00; font-size:14px;">￥99.5</span>
                </td>
              </tr>
              <tr height="35">
                <td colspan="2"><input type="submit" value="立即充值" class="c_btn" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
    @foreach ( $common_cates_data as $k => $v)
    <div class="i_t mar_10">
        
        <span class="fl">{{$v->cname}}</span>                
        <span class="i_mores fr">
            @foreach ($v['sub'] as $kk => $vv)
            <a href="#">{{$vv->cname}}</a>&nbsp; &nbsp; &nbsp; 
            @endforeach
        </span>
    </div>
    <div class="content">
        <div class="fresh_left">
            <div class="fre_ban">
                <div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                        <li><a href="#"><img src="/static/home/images/fre_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/static/home/images/fre_r.jpg" width="211" height="286" /></a></li>
                        <li><a href="#"><img src="/static/home/images/fre_r.jpg" width="211" height="286" /></a></li>
                    </ul>
                    <div class="prevf">上一张</div>
                    <div class="nextf">下一张</div> 
                </div>   
            </div>
            <div class="fresh_txt">
                <div class="fresh_txt_c">
                     @foreach ($v['sub'] as $kk => $vv)
                    <a href="#">{{$vv->cname}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="fresh_mid">
            <ul>
                @foreach($goods as $kk => $vv)
                <li>
                    <div class="name"><a href="#">{{$v -> cname}}</a></div>
                    <div class="price">
                        <font>￥<span>{{$vv->gprice}}</span></font> &nbsp; 
                    </div>
                    <div class="img"><a href="#"><img src="/static/home/images/{{$vv->gpic}}" width="185" height="155" /></a></div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="fresh_right">
            <ul>
                <li><a href="#"><img src="/static/home/images/fre_b1.jpg" width="260" height="220" /></a></li>
                <li><a href="#"><img src="/static/home/images/fre_b2.jpg" width="260" height="220" /></a></li>
            </ul>
        </div>
    </div>    
    <!--End 进口 生鲜 End-->
    @endforeach
    

@stop