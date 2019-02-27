@extends('admin/layout')

@section('content')
<div class="mws-panel grid_8">
            <form action="/admin/users/index" method="get">
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
                                    <th>姓名</th>
                                    <th>性别</th>
                                    <th>权限</th>
                                    <th>电话</th>
                                    <th>注册时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
    @foreach($users as $k=>$v)
                        <tr>
                            <td>{{$v->uid}}</td>   
                            <td>{{$v->uname}}</td>  
                            <td>
                                    @if ($v->sex=='w')
                                    女
                                    @elseif ($v->sex=='m')
                                    男
                                    @else
                                    保密
                                    @endif
                            </td>    
                            <td>
                                    @if($v->auth =='1')
                                        超级管理员
                                    @elseif($v->auth=='2')
                                    商家用户
                                    @else
                                    普通用户
                                    @endif
                            </td>   
                            <td>{{$v->tel}}</td>    
                            <td>{{$v->created_at}}</td> 
                            <td>
                                <a href="" class="btn btn-danger">删除</a>
                                <a href="" class="btn btn-warning">修改</a>
                            </td>
                        </tr>
            @endforeach
                            </tbody>
                        </table>
                  <!--       <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate"><a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_1_first">First</a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_1_previous">Previous</a><span><a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a><a tabindex="0" class="paginate_button">3</a><a tabindex="0" class="paginate_button">4</a><a tabindex="0" class="paginate_button">5</a></span><a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">Next</a><a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">Last</a></div> -->
                        <div id="page_page">
                            
                            {{  $users->appends($request)->links()  }}
                        </div>
                        
                        </div>
                    </div>
                </div>
@stop

