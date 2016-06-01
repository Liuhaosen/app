
    var index = 0;
    var inte = null;
    autoRun();

    //绑定鼠标的移入事件
    $('.num li').mouseover(function(){
        //清空定时器
        clearT();
        //获取数字下标
        index = $(this).index();
        //显示当前索引的图片
        show(index);
    })

    //绑定鼠标移除事件
    $('.num li').mouseout(function(){
        autoRun();
    })

    //封装函数,显示某个索引的图片
    function show(i)
    {
        //隐藏所有的li元素
        $('.images li').hide();
        //显示当前索引的图片
        $('.images li').eq(i).fadeIn();
        //调整数字li的样式
        $('.num li').removeClass('item');
        $('.num li').eq(i).addClass('item');
    }

    //封装函数,自动执行定时器
    function autoRun()
    {
        if(inte!=null) return;
        inte = setInterval(function(){
            index++;
            if(index>=4){
                index=0;
            }
            //显示当前索引的图片
            show(index);
        },2000);
    }

    //清空定时器操作
    function clearT()
    {
        clearInterval(inte);
        inte=null;
    }

    //点击向左移动
    $('#prev').click(function(){
        //索引自减
        index--;
        if(index<0){
            index=3;
        }
        show(index);
    }).mouseover(function(){
        clearT();
    }).mouseout(function(){
        autoRun();
    })

    //点击向右移动
    $('#next').click(function(){
        //索引自增
        index++;
        if(index>3){
            index=0;
        }
        show(index);
    }).mouseover(function(){
        clearT();
    }).mouseout(function(){
        autoRun();
    })


    //鼠标移入图片时,显示两个按钮
    $('#md12').mouseover(function(){     
        clearT(); 
        $('.but').show();
    })

    //鼠标移除,按钮消失
    $('#md12').mouseout(function(){
        autoRun();
        $('.but').hide();
    })


