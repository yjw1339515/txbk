@extends('Admin.layout')
@section('content')
<div class="mws-panel grid_8">
			@if (count($errors) > 0)
			    <div class="mws-form-message error">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

	<div class="mws-panel-header">
    	<span>推荐位添加</span>
    </div>
    <div class="mws-panel-body no-padding">

			
    	<form class="mws-form" action="/tjws" method="post" enctype="multipart/form-data">


    		                   {{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">推荐位标题</label>
    				<div class="mws-form-item">
    					<input type="text" name="title" class="small">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">推荐位链接</label>
    				<div class="mws-form-item">
    					<input type="text" name="tlink" class="small">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">推荐位描述</label>
    				<div class="mws-form-item">
    					<textarea rows="" cols="" name = "tdesc" class="small"></textarea>
    				</div>
    			</div>
    			
    				<div class="mws-form-row">
    				<label class="mws-form-label">推荐位图片上传</label>
    				<div class="mws-form-item">
    					<input  type="file" class="small" multiple accept="image/*" name="tpic" />
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn btn-info">
    		</div>
    	</form>
    </div>    	
</div>

@endsection