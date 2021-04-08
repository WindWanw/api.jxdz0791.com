<!DOCTYPE html>
<html lang="en">
@include('head')

@if ($a->pic)
<img src="<?php echo ($a->pic); ?>" class="banner">
@else
<img src="{{ URL::asset('image/case/banner.png') }}" class="banner">
@endif

<div class="container">
    <div class="rank slice-rank">
        <ul class="special-card" style="justify-content: center;">
            <li class="special-card-active">资质新办</li>
            <li>安许</li>
            <li>增项</li>
            <li>升级</li>
            <li>其他</li>
        </ul>
        <!-- <a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=928307838&site=qq&menu=yes "> 资质代办案例</a><span class="line">|</span>
        <a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=928307838&site=qq&menu=yes "> 安许证代办案例</a><span class="line">|</span>
        <a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=928307838&site=qq&menu=yes "> 职称评审案例</a><span class="line">|</span>
        <a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=928307838&site=qq&menu=yes "> 标书制作案例</a> -->
    </div>

    <div class="slice-grid">

        <ul class="zs-list container">
            <li>
                <img src="{{ URL::asset('image/zzxb/1.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/2.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/3.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/4.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/5.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/6.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/7.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/8.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/9.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/10.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/11.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zzxb/12.jpg') }}" alt="">
            </li>


        </ul>
        <ul class="zs-list container">

            <li>
                <img src="{{ URL::asset('image/ax/1.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/2.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/3.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/4.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/5.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/6.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/7.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/8.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/9.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/10.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/11.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/ax/12.jpg') }}" alt="">
            </li>
        </ul>
        <ul class="zs-list container">
            <li>
                <img src="{{ URL::asset('image/zx/1.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/2.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/3.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/4.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/5.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/6.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/7.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/8.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/9.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/10.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/11.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/zx/12.jpg') }}" alt="">
            </li>

        </ul>
        <ul class="zs-list container">
            <li>
                <img src="{{ URL::asset('image/sj/1.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/2.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/3.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/4.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/5.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/6.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/7.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/8.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/9.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/10.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/11.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/sj/12.jpg') }}" alt="">
            </li>
        </ul>
        <ul class="zs-list container">
            <li>
                <img src="{{ URL::asset('image/qt/1.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/2.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/3.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/4.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/5.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/6.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/7.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/8.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/9.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/10.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/11.jpg') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/qt/12.jpg') }}" alt="">
            </li>
        </ul>



    </div>


</div>



@include('foot')


</body>
<script>
    function dianji() {
        console.log("点击分页")
    }
</script>
<script>
    var $specialLi = $(".special-card li");
    var $linkLi = $(".link-list li");


    var $zsList = $(".zs-list");

    function hiddenZsList(index) {
        $zsList.hide();
        $($zsList[index]).show();
    }

    //显示资质新办下面的选项
    hiddenZsList(0);

    //点击  send按钮
    function send() {

    }

    //点击 提交按钮
    function submit() {

    }

    $linkLi.children().click(function() {
        $linkLi.removeClass("active");
        $(this).parent().addClass("active");
    });
    //点击资质新版
    $specialLi.click(function(e) {
        $specialLi.removeClass("special-card-active");
        $(this).addClass("special-card-active");
        hiddenZsList($specialLi.index(this));
    });


    window.onload = function() {
        $('#tel').vTicker({
            height: 400,
            pause: 1000
        });
    }
    new Swiper('.swiper-container', {

        loop: true, // 循环模式选项
        autoplay: true,

        // 如果需要分页器
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },


    })
</script>
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


</html>