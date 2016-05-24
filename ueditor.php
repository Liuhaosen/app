1. 将编辑器所需要的文件放置在网站目录下
2. 引入js文件,并调整路径
3. 创建容器
4. 在js代码中实例化编辑器

5. 调整文件上传的路径  ueditor/php/config.json  -> imagePathFormat -> /u/{yyyy}{mm}{dd}/{time}{rand:6}
6. 调整工具栏中的命令  
	var ue = UE.getEditor('editor',{
        toolbars: [
            ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload']
        ]
    });
