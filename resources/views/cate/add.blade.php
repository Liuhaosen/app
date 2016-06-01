@extends('layout.index')

@section('title')
	分类添加
@endsection
@section('content')
	  
<div class="mws-panel grid_8">
 <div class="mws-panel-header">
      <span>分类添加</span>
 </div>

 <div class="mws-panel-body no-padding">

      <form action="{{url('/admin/cate/insert')}}" method="post" class="mws-form">

       @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
           </div>        
       @endif

           <div class="mws-form-inline">
                <div class="mws-form-row">
                     <label class="mws-form-label">分类名称</label>
                     <div class="mws-form-item">
                          <input type="text" class="small" name="name" >
                     </div>
                </div>
        		<div class="mws-form-row">
      				<label class="mws-form-label">父级分类</label>
  	    				 <div class="mws-form-item">
  	    					  <select class="small" name="pid" @if(!empty($id)) disabled @endif>
  	    						 <option value="0">请选择</option>
  	    					      @foreach($cates as $k =>$v)
  	    						       <option value="{{$v->id}}" @if($v->id ==$id)
  									         selected
  							           	@endif
  	    						       >
                           {{$v->name}}</option>
  	    					      @endforeach
  	    				   </select>
  	    				</div>
            </div>      
           </div>
           <div class="mws-button-row">
                {{csrf_field()}}
                 @if(!empty($id))
                <input type="hidden" name="pid" value="{{$id}}">
                @endif
                <input type="submit" class="btn btn-danger" value="添加">
                <input type="reset" class="btn " value="重置">
           </div>
      </form>
 </div>         
</div>
@endsection