@extends('layout.index')

@section('title')
  商品修改
@endsection

@section('content')
<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加载语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/b/ueditor/lang/zh-cn/zh-cn.js"></script>
   
  <div class="mws-panel grid_8">
     <div class="mws-panel-header">
          <span>商品修改</span>
     </div>

     <div class="mws-panel-body no-padding"> 
          <form action="{{url('admin/goods/update')}}" method="post"  enctype="multipart/form-data" class="mws-form">
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
                         <label class="mws-form-label">商品名称</label>
                             <div class="mws-form-item">
                                <input type="text" class="small" name="title" value="{{$goods->title}}">
                             </div>
                    </div>
                    <div class="mws-form-row">
                         <label class="mws-form-label">商品价格</label>
                             <div class="mws-form-item">
                                <input type="text" class="small" name="price" value="{{$goods->price}}">
                             </div>
                    </div>
                    <div class="mws-form-row">
                         <label class="mws-form-label">商品库存</label>
                             <div class="mws-form-item">
                                <input type="text" class="small" name="kucun" value="{{$goods->kucun}}">
                             </div>
                    </div>
                 
                   <div class="mws-form-row">
                        <label class="mws-form-label">商品分类</label>
                          <div class="mws-form-item">
                              <select class="small" name="cate_id">
                                  <option value="0">请选择</option>
                                     @foreach($cates as $k=>$v)                            
                                        <option @if($v->id == $goods->cate_id) selected @endif value="{{$v->id}}">{{$v->name}}</option>
                                     @endforeach 
                                </select>
                         </div>
                   </div>
                   <div class="mws-form-row">
                        <label class="mws-form-label">商品颜色</label>
                            <div class="mws-form-item clearfix">
                                <ul class="mws-form-list inline">
                                    <li><input type="checkbox" @if(in_array('红色',explode(',',$goods->color))) checked @endif name="color[]" value="红色"> <label>红色</label></li>
                                    <li><input type="checkbox" @if(in_array('绿色',explode(',',$goods->color))) checked @endif name="color[]" value="绿色"> <label>绿色</label></li>
                                    <li><input type="checkbox" @if(in_array('白色',explode(',',$goods->color))) checked @endif name="color[]" value="白色"> <label>白色</label></li>
                                    <li><input type="checkbox" @if(in_array('蓝色',explode(',',$goods->color))) checked @endif name="color[]" value="蓝色"> <label>蓝色</label></li>
                                    <li><input type="checkbox" @if(in_array('粉色',explode(',',$goods->color))) checked @endif name="color[]" value="粉色"> <label>粉色</label></li>
                                </ul>
                            </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">商品尺码</label>
                            <div class="mws-form-item clearfix">
                                <ul class="mws-form-list inline">
                                    <li><input type="checkbox" @if(in_array('37',explode(',',$goods->size))) checked @endif name="size[]" value="37"> <label>37</label></li>
                                    <li><input type="checkbox" @if(in_array('38',explode(',',$goods->size))) checked @endif name="size[]" value="38"> <label>38</label></li>
                                    <l<input type="checkbox" @if(in_array('39',explode(',',$goods->size))) checked @endif name="size[]" value="39"> <label>39</label></li>
                                    <li><input type="checkbox" @if(in_array('40',explode(',',$goods->size))) checked @endif name="size[]" value="40"> <label>40</label></li>
                                    <li><input type="checkbox" @if(in_array('41',explode(',',$goods->size))) checked @endif name="size[]" value="41"> <label>41</label></li>
                                    <li><input type="checkbox" @if(in_array('S',explode(',',$goods->size))) checked @endif name="size[]" value="S"> <label>S</label></li>
                                    <li><input type="checkbox" @if(in_array('M',explode(',',$goods->size))) checked @endif name="size[]" value="M"> <label>M</label></li>
                                    <l<input type="checkbox" @if(in_array('L',explode(',',$goods->size))) checked @endif name="size[]" value="L"> <label>L</label></li>
                                    <li><input type="checkbox" @if(in_array('XL',explode(',',$goods->size))) checked @endif name="size[]" value="XL"> <label>XL</label></li>
                                    <li><input type="checkbox" @if(in_array('XXL',explode(',',$goods->size))) checked @endif name="size[]" value="XXL"> <label>XXL</label></li>
                                    <li><input type="checkbox" @if(in_array('XXXL',explode(',',$goods->size))) checked @endif name="size[]" value="XXXL"> <label>XXXL</label></li>
                                </ul>
                            </div>
                    </div>
                  <div class="mws-form-row">
                      <label class="mws-form-label">商品主图</label>
                          <div class="mws-form-item">
                              <img src="{{$goods->pic}}" width="200" alt="">
                              <input type="file" class="small" name="pic">
                          </div>
                  </div>
                  <div class="mws-form-row">
                      <label class="mws-form-label">商品内容</label>
                          <div class="mws-form-item">
                              <script id="editor" name="content" type="text/plain" style="width:600px;height:300px;">{!!$goods->content!!}
                              </script>                         
                          </div>
                  </div>
               

                  <div class="mws-button-row">
                      {{csrf_field()}}
                      <input type="hidden" name="id" value="{{$goods->id}}">
                      <input type="submit" class="btn btn-danger" value="修改">
                      <input type="reset" class="btn " value="重置">
                 </div>
               </div>   
          </form>
          <script type="text/javascript">
             var ue = UE.getEditor('editor',{
                 toolbars: [
                    ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload', ]
                  ]
             });
          </script>
     </div>         
 </div>
@endsection