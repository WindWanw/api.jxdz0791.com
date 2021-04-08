<!DOCTYPE html>
<html lang="en">
@include('head')

</nav>
@if ($a->pic)
<img src="<?php echo ($a->pic); ?>" lt="" style="width: 100%;">
@else
<img src="{{ URL::asset('image/practice/banner.png') }}" lt="" style="width: 100%;">
@endif

<!--公司 简介-->
<div class="container introduction">
    <p class="english">company profile</p>
    <p class="service">
        公司简介
    </p>
    <div class="bg"></div>

    <div class="introduction-container">
        <div class="left">
            <div class="top"><img src="../image/practice/1.png" alt=""></div>
            <p class="top-title">江西德志企业管理集团有限公司</p>

            <p>
                江西德志企业管理集团有限公司是家专业从事建筑企业资质服务的公司，公司坐落于美丽的英雄城南昌市CBD红谷滩新区。经过3年的不断创新和发展，在2018年已实现建筑领域全业务覆盖的集团化企业，现已成为--家可提供资质新办、转让、升级，劳务服务，猎头服务，培训服务，资质重组、分立、资质托管及建筑施工等全方位建筑业服务的企业。企业在发展历程中不断完善内部机制，聚集了众多素质优良的专业人才，从而使得客户能够享受到贴心专业服务。
            </p>
            <p>
                公司资本1000万元。现已控股多家具备建筑工程、市政公用工程施工总承包二级资质，建筑装修装饰工程专业承包二级资质、城市道路照明工程专业承包二级资质、地基基础工程专业承包三级等资质的建筑类企业，目前企业总部的精英团队已突破百人。企业及所属单位先后荣获南昌市建筑业会员单位、南昌市建筑业先进企业、南昌市建筑业诚信单位、江西十佳创新企业。江西德志企业管理集团以“坚持、高效、突破、创新、团结、感恩”为企业文化，坚持“诚信双赢”的服务宗旨。立志成为全国建筑业服务企业领导者!</p>
        </div>
        <div class="right">
            <img src="../image/practice/2.png" alt="">
        </div>
    </div>


</div>
<!--团队-->
<div class="container team">
    <p class="english">team style</p>
    <p class="service">
        团队风采
    </p>
    <div class="bg"></div>


</div>

<div class="container">
    <div class="flex pic">
        <div class="left">
            <?php if ($a->domain == 'shangrao') {  ?>
                <img src="{{ URL::asset('image/shangrao/1.jpg') }}" alt="">
            <?php } elseif ($a->domain == 'yichun') {  ?>
                <img src="{{ URL::asset('image/yichun/1.jpg') }}" alt="">
            <?php } elseif ($a->domain == 'nanchang') {  ?>
                <img src="{{ URL::asset('image/nanchang/1.jpg') }}" alt="">
            <?php } else { ?>
                <img src="{{ URL::asset('image/nanchang/1.jpg') }}" alt="">
            <?php } ?>
        </div>
        <div class="right"></div>

        <div class="pos-container">
            <h3>我们的团队</h3>
            <h1>
                江西德志企业管理集团有限公司是家专业从事建筑企业资质服务的公司，公司坐落于美丽的英雄城南昌市CBD红谷滩新区。经过3年的不断创新和发展，在2018年已实现建筑领域全业务覆盖的集团化企业，现已成为--家可提供资质新办、转让、升级，劳务服务，猎头服务，培训服务，资质重组、分立、资质托管及建筑施工等全方位建筑业服务的企业。企业在发展历程中不断完善内部机制，聚集了众多素质优良的专业人才，从而使得客户能够享受到贴心专业服务。</h1>
            <div class="pos-bg"></div>
        </div>
    </div>
</div>


<!--图片区域 -->
<ul class="img-qy flex container">

    <?php if ($a->domain == 'shangrao') {  ?>
        <li class="pt"> <img src="{{ URL::asset('image/shangrao/3.jpg') }}" alt=""></li>
        <li class="pt"><img src="{{ URL::asset('image/shangrao/4.jpg') }}" alt=""></li>
        <li class="ts"><img src="{{ URL::asset('image/shangrao/5.jpg') }}" alt=""></li>
    <?php } elseif ($a->domain == 'yichun') {  ?>
        <li class="pt"> <img src="{{ URL::asset('image/yichun/3.jpg') }}" alt=""></li>
        <li class="pt"><img src="{{ URL::asset('image/yichun/4.jpg') }}" alt=""></li>
        <li class="ts"><img src="{{ URL::asset('image/yichun/7.jpg') }}" alt=""></li>
    <?php } elseif ($a->domain == 'nanchang') {  ?>
        <li class="pt"> <img src="{{ URL::asset('image/nanchang/3.jpg') }}" alt=""></li>
        <li class="pt"><img src="{{ URL::asset('image/nanchang/4.jpg') }}" alt=""></li>
        <li class="ts"><img src="{{ URL::asset('image/nanchang/7.jpg') }}" alt=""></li>
    <?php } else { ?>
        <li class="pt"> <img src="{{ URL::asset('image/nanchang/3.jpg') }}" alt=""></li>
        <li class="pt"><img src="{{ URL::asset('image/nanchang/4.jpg') }}" alt=""></li>
        <li class="ts"><img src="{{ URL::asset('image/nanchang/7.jpg') }}" alt=""></li>
    <?php } ?>
</ul>
<ul class="img-qy flex container img-qy2">

    <?php if ($a->domain == 'shangrao') {  ?>
        <li class="pt"> <img src="{{ URL::asset('image/shangrao/7.jpg') }}" alt=""></li>
        <li class="pt"><img src="{{ URL::asset('image/shangrao/6.jpg') }}" alt=""></li>
        <li class="ts"><img src="{{ URL::asset('image/shangrao/2.jpg') }}" alt=""></li>
    <?php } elseif ($a->domain == 'yichun') {  ?>
        <li class="pt"> <img src="{{ URL::asset('image/yichun/2.jpg') }}" alt=""></li>
        <li class="pt"><img src="{{ URL::asset('image/yichun/6.jpg') }}" alt=""></li>
        <li class="ts"><img src="{{ URL::asset('image/yichun/5.jpg') }}" alt=""></li>
    <?php } elseif ($a->domain == 'nanchang') {  ?>
        <li class="pt"> <img src="{{ URL::asset('image/nanchang/5.jpg') }}" alt=""></li>
        <li class="pt"><img src="{{ URL::asset('image/nanchang/6.jpg') }}" alt=""></li>
        <li class="ts"><img src="{{ URL::asset('image/nanchang/2.jpg') }}" alt=""></li>
    <?php } else { ?>
        <li class="pt"> <img src="{{ URL::asset('image/nanchang/5.jpg') }}" alt=""></li>
        <li class="pt"><img src="{{ URL::asset('image/nanchang/6.jpg') }}" alt=""></li>
        <li class="ts"><img src="{{ URL::asset('image/nanchang/2.jpg') }}" alt=""></li>
    <?php } ?>
</ul>
<!--企业荣誉-->
<!-- <div class="container team">
    <p class="english">enterprise honor</p>
    <p class="service">
        企业荣誉
    </p>
    <div class="bg"></div>
    <ul class="al-ry">
        <li>
            <img src="../image/practice/ry.png" alt="">
        </li>
        <li>
            <img src="../image/practice/ry.png" alt="">
        </li>
        <li>
            <img src="../image/practice/ry.png" alt="">
        </li>
        <li>
            <img src="../image/practice/ry.png" alt="">
        </li>
        <li>
            <img src="../image/practice/ry.png" alt="">
        </li>
        <li>
            <img src="../image/practice/ry.png" alt="">
        </li>
        <li>
            <img src="../image/practice/ry.png" alt="">
        </li>
        <li>
            <img src="../image/practice/ry.png" alt="">
        </li>
    </ul>
</div> -->


<!--地图区域-->
<div class="container">
    <div class="map flex">
        <div class="map-left">
            <img src="../image/practice/map.png" alt="" class="map-image">
            <div class="map-submit">
                <h3>联系我们</h3>
                <input type="text" placeholder="请输入您的姓名" id='name' autocomplete="off">
                <input type="text" placeholder="请留下您的联系方式" id='tel' style="width:200px;" autocomplete="off">
                <textarea placeholder="你好，有什么需要咨询呢？" id='content' rows="6" autocomplete="off"></textarea>

                <button onclick="copyText()" class="send">SEND</button>
            </div>
        </div>

    </div>
</div>
<div style="height: 84px;"></div>
@include('foot')
<script>
    //表单提交
    function send() {
        console.log("send");
    }
</script>

<script>
    function copyText(self) {
        var name = document.getElementById('name');
        var name = name.value;
        if (!name) {
            alert('姓名必填');
            return false;
        }
        var content = document.getElementById('content');
        var content = content.value;
        if (!content) {
            alert('咨询资质必填');
            return false;
        }
        var tel = document.getElementById('tel');
        var tel = tel.value;
        if (!(/^1[3456789]\d{9}$/.test(tel))) {
            alert("手机号码有误，请重填");
            return false;
        }
        if (!tel) {
            alert('联系人方式必填');
            return false;
        }
        $.ajax({
            type: "POST",
            url: "{{ url('user/userdata') }}",
            dataType: 'json',
            header: {
                'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "name": name,
                "content": content,
                "tel": tel,
                "login_type": 3,
                '_token': '{{csrf_token()}}'
            },
            success: function(data) {
                if (data.status == 1) {
                    alert('提交成功');
                    location.reload();
                } else {
                    alert('提交失败');
                }
            }

        });
    }
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
</body>

</html>