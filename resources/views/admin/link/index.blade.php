@extends('admin/layout')

@section('content')
<div class="mws-panel grid_8">
            <form action="/admin/link/index" method="get">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i>用户列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                     <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <div id="DataTables_Table_1_length" class="dataTables_length">
        <label>
            显示
            <select size="1" name="count" aria-controls="DataTables_Table_1">
                <option value="5" @if(isset($request['count']) && $request['count'] == 5) selected @endif>
                    5
                </option>
                <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>
                    10
                </option>
                <option value="15" @if(isset($request['count']) && $request['count'] == 15) selected @endif>
                    15
                </option>
                <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>
                    50
                </option>
            </select>
            条
        </label>
    </div>
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
        <label>
            关键字:
            <input type="text" name="search"  aria-controls="DataTables_Table_1" value="{{ $request['search'] or ' ' }}">
        </label>
            <input type="submit" value="搜索" class="btn btn-info">
    </div>
    </form>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
    aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>链接名称</th>
                                    <th>链接地址</th>
                                    <th>图片</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>  
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
    @foreach($link as $k=>$v)
                        <tr>

                            <td>{{$v->id}}</td>   
                            <td>{{$v->title}}</td>  
                            <td>{{$v->url}}</td>    
                            <td><img src="/uploads/{{$v->images}}" alt=""></td>    
                            <td>{{$v->created_at}}</td> 

                            <td>
                                <form action="/admin/link/destroy/{{ $v->id }}" method="post" accept-charset="utf-8" style="display: inline-block;">
                                    {{ csrf_field() }}
                                <input type="submit"  value="删除" class="btn btn-danger">
                                </form>
                                <a href="/admin/link/edit/{{ $v->id }}" class="btn btn-warning">修改</a>
                            </td>
                        </tr>
            @endforeach
                            </tbody>
                        </table>
                        
                        </div>
                    </div>
                </div>
@stop

