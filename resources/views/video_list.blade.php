<!DOCTYPE html>
<html lang="en">

@include('head')

<style>
    .paging .pagination {
        display: flex;
        margin-bottom: 50px;
    }

    .paging .pagination li {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 30px;
        width: 30px;
        font-size: 18px;
        height: 30px;


    }
</style>
<img src="{{ URL::asset('image/news/banner.png') }}" class="banner">

<div class="container">
    <div class="rank slice-rank ">
        <a href="/newslist/index" @if($type_name=='index' ) class="rank-active" @endif>最新资讯</a><span class="line">|</span>
        <a href="/videolist/index" @if($type_name=='policy' ) class="rank-active" @endif>政策解读</a><span class="line">|</span>
        @foreach ($list as $v)
        <a href="/newslist<?php echo ($v['link_url']) ?>" @if('/'.$type_name==$v['link_url'] ) class="rank-active" @endif>{{$v['title']}}</a>@if(!$loop->last)<span class="line">|</span> @endif
        @endforeach
    </div>
</div>


<div class="container">

    <div class="sort">
        <p>排序方式：</p>
        <a href="/videolist/many">最多播放</a>
        <a href="/videolist/time">最近更新</a>
    </div>
    <div class="grid" style="justify-content: normal;">

        @foreach ($datae as $v)
        <div class="grid-pic-text">

            <a href="/video/<?php echo ($v['id']); ?>.html" style="position: relative;width: 200px;height:125px;    display: inherit;">
                <img class="grid-pic" src="{{$v['pic']}}" style="width: 200px;height:125px">
                <img class="play" src="{{ URL::asset('image/news/play.png') }}" style="top: 50%;left:50%; transform: translate(-50%,-50%)">

            </a>


            <span class="time">{{$v['long_time']}}</span>
            <span class="bofang">{{$v['browse_num']}}次播放</span>
            <p title="扫脸时代来临，你还在等什么?">{{$v['title']}}</p>
        </div>
        @endforeach
    </div>

    <div class="paging">
        {{ $datae->links() }}
    </div>


</div>



<div class="paging">


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



</html>