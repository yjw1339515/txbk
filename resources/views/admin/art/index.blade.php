@extends('admin/layout')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>文章列表</span>
    </div>
<div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

         <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
            <tr >
                  <th>文章编号</th>
                  <th>文章标题</th>
                  <th>文章标题图</th>
                  <th>文章内容</th>
                  <th>操作</th>
            </tr>
        </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($data as $k=>$v)
                <tr class="odd" align="center">
                    <td>{{$v->id}}</td>
                    <td>{{$v->title}}</td>
                    <td >
                        <img src="{{$v->pic}}" alt="{{$v->title}}">
                    </td>
                    <td >
                        {{$v->body}}
                    </td>
                    <td>
          <img src="" width="100px"/>
          <a href="/admin/art/edit/{{$v->id}}" class="btn btn-info">修改</a>
          <p/>
          <a href="/admin/art/destroy/{{$v->id}}" class="btn btn-info">删除</a>
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
