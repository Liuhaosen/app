@extends('layout.index')

@section('title')
  分类列表
@endsection

@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>分类列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
		
      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">分类名称</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">分类路径</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">状态</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
         @foreach($cates as $k =>$v)
          <tr class="@if($k%2==0)
				even
				@else
				odd
				@endif 
          ">
            <td class="  sorting_1">{{$v->id}}</td>
            <td class=" ">{{$v->name}}</td>
            <td class=" ">{{pathName($v->paths)}}</td>
            <td class=" ">{{showState($v->status)}}</td>
            <td class=" ">
				<a href="/admin/cate/edit/{{$v->id}}" >
					<i class="icol-pencil" ></i>
				</a>　&nbsp;&nbsp;
				<a href="/admin/cate/delete/{{$v->id}}">
					<i class="icol-cross"></i>
				</a>　&nbsp;&nbsp;
				 <a href="/admin/cate/add/{{$v->id}}">
					<i class="icol-add"></i>
				</a>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>

     
     
  </div>
</div>
@endsection