<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
    //Method one
    //<![CDATA[ 
    //document.oncontextmenu=new Function('event.returnValue=false;');
    document.oncontextmenu = function(e) {
        e = e || window.event;
        e.returnValue = false;
    }
    document.onselectstart = new Function('event.returnValue=false;');
    //]]> 
</script>
<script>
    /*document.oncontextmenu = function(){return false;}*/
    document.onkeydown = function(e) {
        var currKey = 0,
            evt = e || window.event;
        currKey = evt.keyCode || evt.which || evt.charCode;
        if (currKey == 123) {
            window.event.cancelBubble = true;
            window.event.returnValue = false;
        }
    }
    var x = document.createElement('div');
    var isOpening = false;
    Object.defineProperty(x, 'id', {
        get: function() {
            // 在这里放入你的代码
            window.location.href = '/sadasdasdasd';
        }
    });
    console.info(x);
</script>

@include('head')
</div>
<div style="height: 30px;"></div>
<div class=" container">

    <div class="news-content">
        <div class="pol-first-section">
            <h1 class="pol-title">{{$datae['title']}}</h1>
            <p class="pol-publish">德志集团 | 发布时间：{{$datae['send_time']}}</p>
        </div>

        <div class="pol-center-section" style="text-align: center;">
            <!-- <img class="pol-plane" src="{{$datae['pic']}}"> -->
            <video controls autoplay style="width:85%;height:100%;">
                <source src="{{$datae['video_url']}}" type="video/mp4">
                <object datae="movie.mp4">
                    <!-- <embed  src="{{$datae['pic']}}"> -->
                </object>
            </video>
            <!-- <img class="pol-play" src="../image/news/play.png"> -->
        </div>


        <p class="last-section business-detail business-project-text" style="font-size: 12px">【备注】{{$datae['remarks']}}</p>


        <div class="fn-section">
            <?php if ($datae['first_id']) { ?>
                <a href="/nbsp/nbsp_<?php echo ($datae['first_id']); ?>.html">
                    < 上一篇</a><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if ($datae['last_id']) { ?> <a style="margin-left: 8px;" href="/nbsp/nbsp_<?php echo ($datae['last_id']); ?>.html">下一篇 >
                </a><?php } ?>
        </div>
    </div>


</div>
@include('foot')
</body>


</html>