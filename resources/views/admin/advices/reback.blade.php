@extends('admin.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>回收站</span>
    </div>
<div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

         <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
            <tr >
                  <th>建议编号</th>
                  <th>建议内容</th>
                  <th>原因</th>
                  <th>提交时间</th>
                  <th>相关图片</th>
                  <th>操作</th>
            </tr>
        </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($data as $k=>$v)
                    <tr class="odd" align="center">
                        <td >{{$v->id}}</td>
                        <td>{{$v->content}}</td>
                        <td>{{$v->reason}}</td>
                        <td>{{$v->created_at}}</td>
                        <td>
              <img src="/uploads/{{$v->gpic}}" width="100px"/>
                        </td>
                        <td>
                      <form action="/admin/advices/{{$v->id}}" method="post" style="display: inline-block">
                      {{csrf_field()}}
                      {{method_field('put')}}
                      <button class="btn btn-danger">点击恢复</button>
                      </form>



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
