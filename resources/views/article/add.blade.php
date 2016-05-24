@extends('layout.index')

@section('title')
  文章添加
@endsection

@section('content')
<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/b/ueditor/lang/zh-cn/zh-cn.js"></script>
   
  <div class="mws-panel grid_8">
     <div class="mws-panel-header">
          <span>文章添加</span>
     </div>

     <div class="mws-panel-body no-padding"> 
          <form action="{{url('admin/article/insert')}}" method="post"  enctype="multipart/form-data" class="mws-form">
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
                         <label class="mws-form-label">文章标题</label>
                             <div class="mws-form-item">
                                <input type="text" class="small" name="title" value="{{old('title')}}">
                             </div>
                    </div>
                    <div class="mws-form-row">
                       <label class="mws-form-label">文章描述</label>
                          <div class="mws-form-item">
                            <textarea rows="" cols="" class="small" name="descr">{{old('descr')}}</textarea>
                         </div>
                   </div>
                   <div class="mws-form-row">
                      <label class="mws-form-label">文章分类</label>
                          <div class="mws-form-item">
                              <select class="small" name="cate_id">
                                 <option value="0">请选择</option>
                                   @foreach($cates as $k=>$v)                            
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                   @endforeach 
                              </select>
                       </div>
                 </div>
                 <div class="mws-form-row">
                      <label class="mws-form-label">文章主图</label>
                      <div class="mws-form-item">
                          <input type="file" class="small" name="pic">
                      </div>
                  </div>
                   <div class="mws-form-row">
                      <label class="mws-form-label">文章内容</label>
                      <div class="mws-form-item">
                          <script id="editor" name="content" type="text/plain" style="width:600px;height:300px;">
                          </script>                         
                      </div>
                  </div>
               

                    <div class="mws-button-row">
                      {{csrf_field()}}
                      <input type="submit" class="btn btn-danger" value="添加">
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