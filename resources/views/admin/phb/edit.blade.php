@extends('admin/layout')

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>排行榜管理</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/phb/update/{{$data->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">商品名称</label>
    				<div class="mws-form-item">
                        <th>{{$data->gname}}</th>
    				</div>
    			</div>
                <div class="mws-form-row">
                     <label class="mws-form-label">商品描述</label>
                     <div class="mws-form-item">
                        <th>{{$data->gdesc}}</th>
                     </div>
    		    </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">排行榜位置</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="tid" value="{{$data['tid']}}"> &nbsp; &nbsp; &nbsp; 移出排行榜请输入“0”。
    				</div>
    			</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-info">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>
</div>

@endsection
