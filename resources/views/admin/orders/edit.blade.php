@extends('admin.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>订单管理</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/orders/update/{{$data->oid}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">订单编号</label>
    				<div class="mws-form-item">
                        <span style="display:block;margin-left:150px;font-family:微软雅黑;font-size:20px;">{{$data->oid}}</span>
    				</div>
    			</div>
                <div class="mws-form-row">
                     <label class="mws-form-label">总价格</label>
                     <div class="mws-form-item">
                         <span style="display:block;margin-left:150px;font-family:微软雅黑;font-size:20px;">{{$data->sumprice}}</span>
                     </div>
    		    </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">购买数量</label>
    				<div class="mws-form-item">
                        <span style="display:block;margin-left:150px;font-family:微软雅黑;font-size:20px;">{{$data->cnt}}</span>
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">用户ID</label>
                    <div class="mws-form-item">
                        <span style="display:block;margin-left:150px;font-family:微软雅黑;font-size:20px;">{{$data->user_id}}</span>
                    </div>
                </div>
                <div class="mws-form-row">
    				<label class="mws-form-label">收货地址</label>
    				<div class="mws-form-item">
                        <input type="text" name="addr" value="{{$data->addr}}" style="background-color:#d2d2d2;display:block;margin-left:150px;width:75%;height:85px;margin-top:0px;text-align:center;font-size:14px;" readonly>
    				</div>
    			</div>
                <div class="mws-form-row">
    				<label class="mws-form-label">订单状态</label>
    				<div class="mws-form-item">
                        <select name="status" id="staid" class="required" style="margin-left:150px;">
                            <option value="1" $data[status]==1 ?' selected' : '';>未支付</option>
                            <option value="2" $data[status]==2 ?' selected' : '';>已支付</option>
                            <option value="3" $data[status]==3 ?' selected' : '';>未发货</option>
                            <option value="4" $data[status]==4 ?' selected' : '';>已发货</option>
                            <option value="5" $data[status]==5 ?' selected' : '';>已完成</option>
                            <option value="6" $data[status]==6 ?' selected' : '';>取消订单</option>
                        </select>
    				</div>
    			</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-info">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>
</div>

@stop
