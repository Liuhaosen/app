@extends('layout.index')

@section('title')
  用户列表
@endsection

@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>用户列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
		<form action="/admin/user/index" method="get">
      <div id="DataTables_Table_1_length" class="dataTables_length">
        <label>显示
          <select name="num" size="1" aria-controls="DataTables_Table_1">
            <option value="10" @if(!empty($request['num']) && $resquest['num'] == 10) selected @endif)>10</option>
            <option value="25" @if(!empty($request['num']) && $request['num']==25) selected @endif>25</option>
            <option value="50" @if(!empty($request['num']) && $request['num']==50) selected @endif>50</option>
            <option value="100" @if(!empty($request['num']) && $request['num']==100) selected @endif>100</option></select>条
        </label>
      </div>
      <div class="dataTables_filter" id="DataTables_Table_1_filter">
        <label>关键字:
          <input value="{{$request['keywords'] or ''}}" type="text" name="keywords" ></label><button class="btn btn-primary">搜索</button></div>
         </form>
      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">用户名</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">邮箱</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">用户状态</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
         @foreach($users as $k =>$v)
          <tr class="@if($k%2==0)
				even
				@else
				odd
				@endif 
          ">
            <td class="  sorting_1">{{$v->id}}</td>
            <td class=" ">{{$v->username}}</td>
            <td class=" ">{{$v->email}}</td>
            <td class=" ">{{showState($v->status)}}</td>
            <td class=" ">
				　<a href="/admin/user/edit/{{$v->id}}" >
				<i class="icol-pencil"></i></a>　　　　
				<a href="/admin/user/delete/{{$v->id}}">
				<i class="icol-cross"></i></li></a>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>

     
      <div class="dataTables_paginate paging_full_numbers" id="pages">
       {!!$users->appends($request)->render()!!}
        
    </div>
  </div>
</div>
@endsection