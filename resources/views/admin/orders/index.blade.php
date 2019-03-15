@extends('admin.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>订单列表</span>
    </div>
<div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
           <thead>
               <tr >
                     <th>订单编号</th>
                     <th>订单总金额</th>
                     <th>购买数量</th>
                     <th>用户ID</th>
                     <th>收货地址</th>
                     <th>订单状态</th>
                     <th>操作</th>
               </tr>
           </thead>
               <tbody role="alert" aria-live="polite" aria-relevant="all">
               @foreach($data as $k=>$v)
                   <tr class="odd" align="center">
                       <td>{{$v->oid}}</td>
                       <td>{{$v->sumprice}}</td>
                       <td >{{$v->cnt}}</td>
                       <td >{{$v->user_id}}</td>
                       <td >{{$v->addr}}</td>
                       <td>
                           @if(($v->status)==1)
                           未支付
                           @elseif(($v->status)==2)
                           已支付
                           @elseif(($v->status)==3)
                           未发货
                           @elseif(($v->status)==4)
                           已发货
                           @elseif(($v->status)==5)
                           已完成
                           @elseif(($v->status)==6)
                           已取消订单
                           @endif
                       </td>
                       <td>
             <img src="" width="100px"/>
             <a href="/admin/orders/edit/{{ $v->oid }}" class="btn btn-info">修改</a>
                       </td>
                   </tr>
               @endforeach
               </tbody>
               </table>
                     </div>
            </div>
                    </div>
                </div>

@stop
