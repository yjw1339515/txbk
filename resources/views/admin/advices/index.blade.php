@extends('admin.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>意见箱列表</span>
    </div>
<div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

         <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
            <tr >
                  <th>建议编号</th>
                  <th>建议内容</th>
                  <th>主题</th>
                  <th>留言类型</th>
                  <th>主题</th>
                  <th>内容</th>
                  <th>提交时间</th>
                  <th>相关图片</th>
                  <th>操作</th>
            </tr>
        </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($data as $k=>$v)
                    <tr class="odd" align="center">
                        <td >{{$v->id}}</td>
                        @if($v->type==0)
                        <td>商品投诉</td>
                         @elseif($v->type==1)
                        <td>意见反馈</td>
                         @elseif($v->type==2)
                        <td>售后</td>
                         @endif
                        <td>{{$v->content}}</td>

                        <td>{{$v->reason}}</td>
                        <td>{{$v->created_at}}</td>
                        <td>
              <img src="/uploads/{{$v->gpic}}" width="100px"/>
                        </td>
                        <td>
                     <form action="/admin/advices/{{$v->id}}" method="post" style="display: inline-block">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <button class="btn btn-danger">已审核</button>

            </form>
               <a href="/admin/advices/{{$v->id}}" class="btn btn-danger">永久删除</a>
                        </td>

                    </tr>
                  @endforeach

            </tbody>
            </table>


                     </div>
            </div>
                    </div>
                </div>


@endsection
