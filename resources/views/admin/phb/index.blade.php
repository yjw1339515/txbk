@extends('admin/layout')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>商品排行列表</span>
    </div>
<div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">

         <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
            <tr >
                  <th>排行榜排名</th>
                  <th>商品编号</th>
                  <th>商品名称</th>
                  <th>操作</th>
            </tr>
        </thead>

            <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($data as $k=>$v)

                <tr class="odd" align="center">
                    <td>
                        @if(($v->tid)!=0)
                        {{$v->tid}}
                        @else
                        未上榜
                        @endif
                    </td>
                    <td>{{$v->id}}</td>
                    <td >{{$v->gname}}</td>
                    <td>
          <img src="" width="100px"/>
          <a href="/admin/phb/edit/{{ $v->id }}" class="btn btn-info">修改</a>
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
