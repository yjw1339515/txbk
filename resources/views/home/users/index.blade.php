@extends('home.layout')
@section('content')
<div style="width:100%;background-color:#f6f6f6;">
    <div class="users_info" style="width:75%;height:auto!important;margin-left:12.5%;margin-right:12.5%;margin-top:0px;padding-top:40px;background-color:#f6f6f6;">
        <form class="" action="/users/update/{{$users->uid}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="users_photo" style="width:220px;height:220px;margin-left:25px;margin-right:35px;margin-top:62px;margin-bottom:40px;float:right;text-align:center;">
                <img src="/uploads/{{$users->photo}}" title="{{$users->uname}}" style="width:220px;height:220px;">
                <input type="file" name="photo" placeholder="修改头像">
        </div>
        <span style="display:block;padding-bottom:0;padding-top:0px;color: #e4393c;border-bottom: 2px solid #e4393c;font-weight: 700;cursor:pointer;text-decoration:none;text-indent:4em;font-size:24px;font-family:微软雅黑;line-height:60px;">个人信息</span>
            <div class="" style="margin-top:40px;margin-bottom:20px;">
                <label class="users_desc" style="font-size:18px;margin-left:95px;margin-top:30px;width:200px;">用户名：</label>
                <span style="display:block;width:37.5%;float:right;margin-top:0px;text-align:center;font-size:22px;">{{$users->uname}}</span>
            </div>
            <div class="" style="margin-top:20px;margin-bottom:20px;">
                <label class="users_desc" style="font-size:18px;margin-left:95px;margin-top:30px;width:200px;">昵称：</label>
                <input type="text" name="ucall" value="{{ $users->ucall }}" style="display:block;width:37.5%;float:right;margin-top:0px;text-align:center;font-size:18px;">
            </div>
            <div class="" style="margin-top:20px;margin-bottom:20px;">
                <label class="" style="font-size:18px;margin-left:95px;margin-top:30px;width:200px;">性别：</label>
                <select name="sex" id="sexid" class="required" style="margin-left:195px;font-size:18px;">
                    <option value="w" $users[sex]==w ?' selected' : '';>女</option>
                    <option value="m" $users[sex]==m ?' selected' : '';>男</option>
                    <option value="x" $users[sex]==x ?' selected' : '';>保密</option>
                </select>
            </div>
            <div class="" style="margin-top:20px;margin-bottom:20px;">
                <label class="users_desc" style="font-size:18px;margin-left:95px;margin-top:30px;width:200px;">生日：</label>
                <input type="text" name="birth" value="{{ $users->birth }}" style="display:block;width:37.5%;float:right;margin-top:0px;text-align:center;font-size:18px;">
            </div>
            <div class="" style="margin-top:20px;margin-bottom:20px;">
                <label class="users_desc" style="font-size:18px;margin-left:95px;margin-top:30px;width:200px;">邮箱：</label>
                <input type="text" name="email" value="{{ $users->email }}" style="display:block;width:37.5%;float:right;margin-top:0px;text-align:center;font-size:18px;">
            </div>
            <div class="" style="margin-top:20px;margin-bottom:20px;">
                <label class="users_desc" style="font-size:18px;margin-left:95px;margin-top:30px;width:200px;">联系电话：</label>
                <input type="text" name="tel" value="{{ $users->tel }}" style="display:block;width:65%;float:right;margin-top:0px;text-align:center;font-size:17px;">
            </div>
            <div class="" style="margin-top:20px;margin-bottom:20px;">
                <label class="users_desc" style="font-size:18px;margin-left:95px;margin-top:30px;width:200px;">收货信息：</label>
                <input type="text" name="addr" value="{{$users->addr}}" placeholder="请输入需要保存的收货地址、收货人名称（姓名或昵称）、收货人联系方式（电话）。" style="display:block;width:65%;height:85px;float:right;margin-top:0px;text-align:center;font-size:18px;">
            </div>
            <br>
            <br>
            <input type="image" src="/static/home/images/users_1.png" style="float:right;padding-top:30px;padding-right:30px;">
            <br>
            <br>
            <br>
            <br>
            <br>
        </form>
    </div>
</div>
@stop
