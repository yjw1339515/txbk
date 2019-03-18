@extends('admin.layout')

@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>链接管理添加</span>
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
                        <form class="mws-form" action="/admin/link/update/{{ $link->id }}" method="post">
                        {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">链接名称:</label>
                                    <div class="mws-form-item">
                                        <input type="text"  name="title" class="small" value="{{ $link->title }}">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">链接地址:</label>
                                    <div class="mws-form-item">
                                    <input type="text" name="url" class="layui-input" value="{{ $link->url }}">
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">图片:</label>
                                    <div class="mws-form-item">
                                        <img src="/static/admin/images/{{$link->images}}" value="{{ $link->images }}">
                                    <input type="file" name="images" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="mws-button-row">
                                <input type="submit" value="修改" class="btn btn-danger">
                                <input type="reset" value="重置" class="btn ">
                    </div>
                        </form>
                    </div>   
                </div>
@endsection