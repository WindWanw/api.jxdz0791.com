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
    <div class="sort">

        内部视频

    </div>
    @foreach ($datae as $v)
    <div class="grid-pic-text">

        <a href="/nbsp/nbsp_<?php echo ($v['id']); ?>.html" style="position: relative;width: 200px;height:125px;    display: inherit;">
            <img class="grid-pic" src="{{$v['pic']}}" style="width: 200px;height:125px">
            <img class="play" src="{{ URL::asset('image/news/play.png') }}" style="top: 50%;left:50%; transform: translate(-50%,-50%)">

        </a>
        <span class="time">{{$v['long_time']}}</span>
        <span class="bofang">{{$v['browse_num']}}次播放</span>
        <p title="扫脸时代来临，你还在等什么?">{{$v['title']}}</p>
    </div>
    @endforeach


    <div class="paging">
        {{ $datae->links() }}

    </div>
</div>

@include('foot')



</html>