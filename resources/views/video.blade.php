<!DOCTYPE html>
<html lang="en">
@include('head')
</div>
<div style="height: 30px;"></div>
<div class=" container">
    当前位置 >

    <a href="/">首页</a> > <a href="/newslist/index">新闻中心</a>>
    <a href="/videolist/index">政策解读</a>> 视频详情
    <div class="news-content">
        <div class="pol-first-section">
            <h1 class="pol-title">{{$data['title']}}</h1>
            <p class="pol-publish">德志集团 | 发布时间：{{$data['send_time']}} &nbsp| 播放次数： {{$data['browse_num']}}</p>


        </div>

        <div class="pol-center-section" style="text-align: center;">

            <video controls autoplay style="width:85%;height:100%;">
                <source src="{{$data['video_url']}}" type="video/mp4">
            </video>

        </div>


        <p class="last-section business-detail business-project-text" style="font-size: 12px">【备注】{{$data['remarks']}}</p>


        <div class="fn-section">
            <?php if ($data['first_id']) { ?>
                <a href="/video/video_<?php echo ($data['first_id']); ?>.html">
                    < 上一篇</a><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php if ($data['last_id']) { ?> <a style="margin-left: 8px;" href="/video/video_<?php echo ($data['last_id']); ?>.html">下一篇 >
                </a><?php } ?>
        </div>
    </div>


</div>
<script>
    (function() {
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        } else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
@include('foot')
</body>


</html>