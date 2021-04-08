<!DOCTYPE html>
<html lang="en">
@include('head')
</div>
<style>
    .content2 {
        overflow: hidden;

    }

    /*.content2 p {
        text-align: left !important;

    }*/
</style>
<div style="height: 30px;"></div>
<div class=" container">
    当前位置 >

    <a href="/">首页</a> > <a href="/newslist/index">新闻中心</a> >
    <a href="/newslist<?php echo ($data['link_url']) ?>">{{$data['type_name']}}</a> > 新闻详情
    <div class=" content2">
        <h1 class="h-text">{{$data['title']}}</h1>
        <p class="new-text">
            德志集团 | 发布时间：{{$data['send_time']}}
            <img src="../image/news/sea.png" class="sea" alt="">
            {{$data['browse_num']}}

        </p>

        <div class="img-content">

            <div class="section">
                <br>
                <br>
                {!! htmlspecialchars_decode($data['content']) !!}
            </div>

            <p class="last-section business-detail business-project-text">
                【备注】{{$data['remarks']}}
            </p>

        </div>

        <div class="fn-section">
            <?php if ($data['first_id']) { ?>
                <a href="/news/news_<?php echo ($data['first_id']); ?>.html">
                    < 上一篇</a> <?php } ?> <?php if ($data['last_id']) { ?> <a href="/news/news_<?php echo ($data['last_id']); ?>.html">
                        下一篇 >
                </a> <?php } ?>


        </div>

    </div>


</div>

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?82655e092b04e02aee7295b103cf4fa6";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
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