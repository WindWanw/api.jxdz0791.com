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

@if ($a->pic)
<img src="<?php echo ($a->pic); ?>" class="banner">
@else
<img src="{{ URL::asset('image/news/banner.png') }}" class="banner">
@endif


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
    @foreach ($datae as $v)

    <div class="text-gra">
        <img class="left-img" src="{{$v['pic']}}" height="180" width="250">

        <div class="left-gra">
            <a href="/news/<?php echo ($v['id']); ?>.html">{{$v['title']}}</a>
            <p>
                <?php echo (mb_substr(strip_tags($v['content']), 0, 200)); ?> <img src="{{ URL::asset('image/news/eye.png')}}">&nbsp;&nbsp;&nbsp;{{$v['browse_num']}}
        </div>

        <div class="right-gra">
            <p><?php echo (date('Y-m-d', strtotime($v['send_time']))) ?></p>
            <a href="/newss/<?php echo ($v['id']); ?>.html"><span class="n-line"></span><img src="{{ URL::asset('image/news/n_xiayiye.png')}}"></a>
        </div>
    </div>
    @endforeach


    <div class="paging">
        {{ $datae->links() }}

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



</html>