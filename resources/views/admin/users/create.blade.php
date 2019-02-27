@extends('admin.layout')

@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">

                    <!-- 显示错误信息 -->
                    @if (count($errors) > 0)
                            <div class="mws-form-message error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="mws-form" action="/admin/users/store" method="post">
                        {{ csrf_field() }}
                            <div class="mws-form-inline">

                                <div class="mws-form-row">
                                    <label class="mws-form-label">权限:</label>
                                    <div class="mws-form-item">
                                        <select name="auth" id="catid" class="required">
                                    <option value="1" >超级管理员</option>
                                    <option value="2">商家</option>
                                    <option value="3">普通用户</option>
                                </select>
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">姓名:</label>
                                    <div class="mws-form-item">
                                        <input type="text"  name="uname" class="small" value="{{ old('uname') }}">
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">密码:</label>
                                    <div class="mws-form-item">
                                        <input type="text"  name="upwd" class="small" >
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">确认密码:</label>
                                    <div class="mws-form-item">
                                        <input type="text"  name="reupwd" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">性别:</label>
                                    <div class="mws-form-item">
                                        <input class="common-text" name="sex" size="50" value="w" checked type="radio">女
                                    <input class="common-text" name="sex" size="50" value="m" type="radio">男
                                    <input class="common-text" name="sex" size="50" value="x" type="radio">保密
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">邮箱:</label>
                                    <div class="mws-form-item">
                                        <input type="text"  name="email" class="small" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">电话:</label>
                                    <div class="mws-form-item">
                                        <input type="text"  name="tel" class="small" value="{{ old('tel') }}">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="提交" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>
@endsection