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
                        <form class="mws-form" action="/admin/art/update/{{ $art->id }}" method="post"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">文章标题:</label>
                                    <div class="mws-form-item">
                                        <input type="text"  name="title" class="small" value="{{ $art->title }}">
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">文章标题图:</label>
                                    <div class="mws-form-item">
                                        <img src="/uploads/{{$art->pic}}" value="{{$art->pic}}">
                                    <input type="file" name="pic" class="layui-input" placeholder="">

                                    </div>
                                </div>
                                <div class="mws-form-row">
                    				<label class="mws-form-label">文章内容:</label>
                    				<div class="mws-form-item">
                    					<textarea name="body" cols="" class="large">{{$art->body}}</textarea>
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
