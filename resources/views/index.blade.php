<!DOCTYPE html>
<html lang="en">


@include('head')

<script>
    function isPC() {
        var userAgentInfo = navigator.userAgent;
        var Agents = ["Android", "iPhone",
            "SymbianOS", "Windows Phone",
            "iPad", "iPod"
        ];
        var flag = true;
        for (var v = 0; v < Agents.length; v++) {
            if (userAgentInfo.indexOf(Agents[v]) > 0) {
                flag = false;
                break;
            }
        }
        return flag;
    }

    if (!isPC()) {
        window.location = "city"
    }
</script>

<!--轮播图-->
<div class="swiper-container-box">
    <div class="swiper-container" style="height: 600px;">
        <div class="swiper-wrapper">

            @foreach ($banner as $v)
            <div class="swiper-slide">

                <img src="{{$v['content']}}" style="width: 100%" alt="">
            </div>
            @endforeach
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>

    </div>

    <div class="swiper-form">
        <h1>资质报价估算</h1>
        <ul class="swiper-form-container">
            <li class="swiper-form-container-item">
                <img src="../image/main/banner/book.png" alt="">
                <input type="text" placeholder="咨询资质内容" id='content'>
            </li>
            <li class="swiper-form-container-item">
                <img src="../image/main/banner/person.png" alt="">
                <input type="text" placeholder="联系人姓名" id='name'>
            </li>
            <li class="swiper-form-container-item">
                <img src="../image/main/banner/phone.png" alt="">
                <input type="text" placeholder="联系人电话" id='tel'>
            </li>
            <li class="swiper-form-container-item">
                <img src="../image/main/banner/wx.png" alt="">
                <input type="text" placeholder="您的微信" id='wx'>
            </li>
        </ul>
        <button onclick="copyText();" class="submit">提交信息</button>
    </div>
</div>


<!-- 产品 与 服务 -->
<div class="product container">
    <p class="english">products and services</p>
    <p class="service">
        产品与服务
    </p>
    <div class="bg"></div>


    <ul class="list">
        <li>
            <img src="../image/main/product/01.png" alt="">
        </li>
        <li>
            <img src="../image/main/product/02.png" alt="">

        </li>
        <li>
            <img src="../image/main/product/03.png" alt="">

        </li>
        <li>
            <img src="../image/main/product/04.png" alt="">

        </li>
        <li>
            <img src="../image/main/product/05.png" alt="">

        </li>
        <li>
            <img src="../image/main/product/06.png" alt="">

        </li>
    </ul>


</div>


<!--资质 -->
<div class="qualifications">
    <div class="container qualifications-container">
        <div class="sj"></div>

        <p class="english">construction qualification agency advantage</p>
        <p class="service">
            建筑资质代办的优势
        </p>
        <div class="bg"></div>

        <ul class="qualifications-list" id="qualifications-list">
            <li>
                <img class="qualifications-list-width" src="../image/main/product/list-1.png" alt="">

                <div class="text qualifications-list-width">
                    <p>服务更优质</p>
                    <p>全程一对一的跟踪式服务,把握政策脉
                    </p>
                    <p> 搏，
                        为客户全程护航,确保在短时间完</p>
                    <p> 成所需材料
                        。</p>
                </div>
            </li>
            <li class="qualifications-list-auto">
                <img class="qualifications-list-width" src="../image/main/product/list-2.png" alt="">
                <div class="text qualifications-list-width">
                    <p>团队更专业</p>
                    <div class="bg"></div>
                    <p class="ts-c">
                        专业资质团队，3年打磨,证书齐全

                    </p>
                    <p> 申报成功率达95%以上</p>
                </div>
            </li>
            <li>
                <img class="qualifications-list-width" src="../image/main/product/list-3.png" alt="">
                <div class="text qualifications-list-width">
                    <p>证书更齐全</p>
                    <p>公司有大量人才库及猎头人员
                    </p>
                    <p> 可在短时间内为客户配齐所有真实</p>
                </div>
            </li>

            <li style="width: 0;height: 0;overflow: hidden">
                <img class="qualifications-list-width" src="../image/main/1.png" alt="">
                <div class="text qualifications-list-width">
                    <p>办理无风险</p>
                    <p>德志集团隶属于广盈科技集团，旗下拥

                    </p>
                    <p> 有投资公司，律师事务所等...为江西德</p>
                    <p>志保驾护航办理无风险</p>
                </div>
            </li>
            <li style="width: 0;height: 0;overflow: hidden">
                <img class="qualifications-list-width" src="../image/main/2.png" alt="">
                <div class="text qualifications-list-width">
                    <p>材料审核严</p>
                    <p>有多名3年以上办理新申报资质经验...

                    </p>
                    <p> 确保材料一次性通过</p>

                </div>
            </li>
            <li style="width: 0;height: 0;overflow: hidden">
                <img class="qualifications-list-width" src="../image/main/3.png" alt="">
                <div class="text qualifications-list-width">
                    <p>价格更低廉</p>
                    <p>有多名3年以上办理新申报资质经验...

                    </p>
                    <p> 同样的资质我们价格更公道，同样的价格我们服务更优质</p>

                </div>
            </li>


        </ul>


        <div class="more more-toggle" onclick="more(true)">
            MORE+
        </div>

        <div class="more more-toggle" style="display:none;" onclick="more(false)">
            收起
        </div>


        <div class=" sj sj2"></div>

    </div>


</div>


<img src="../image/main/product/liuc@2x.png" alt="" style="width: 100%">


<!--新闻-->

<div class="journalism">

    <p class="english">information centre</p>

    <p class="service">
        新闻中心
    </p>

    <div class="bg" style="background: #2878FF"></div>

    <ul class="tab">
        <li class="active" onclick="toggleUl(0)">行业聚焦</li>
        <li onclick="toggleUl(1)">资质百科</li>
        <li onclick="toggleUl(2)">办事指南</li>
    </ul>


    <ul class="journalism-list container">
        @foreach ($news['newsone'] as $v)
        <li>
            <div class="top">
                <p><a href="/news/<?php echo ($v['id']); ?>.html">{{$v['title']}}</a></p>
                <p><a href="/news/<?php echo ($v['id']); ?>.html"> <?php echo (mb_substr(strip_tags($v['content']), 0, 100)); ?></a></p>
            </div>
            <div class=" bottom">
                <p class="time">
                    <span>{{$v['day']}}</span>
                    <span>{{$v['year']}}</span>
                </p>
                <img src="../image/main/journalism/clock.png" alt="">
            </div>

        </li>

        @endforeach
    </ul>
    <ul style="display: none" class="journalism-list container">
        @foreach ($news['newstwo'] as $v)
        <li>
            <div class="top">
                <p><a href="/news/<?php echo ($v['id']); ?>.html">{{$v['title']}}</a></p>
                <p><a href="/news/<?php echo ($v['id']); ?>.html"> <?php echo (mb_substr(strip_tags($v['content']), 0, 100)); ?></a></p>
            </div>
            <div class="bottom">
                <p class="time">
                    <span>{{$v['day']}}</span>
                    <span>{{$v['year']}}</span>
                </p>
                <img src="../image/main/journalism/clock.png" alt="">
            </div>
        </li>
        @endforeach

    </ul>
    <ul style="display: none" class="journalism-list container">
        @foreach ($news['newsthree'] as $v)
        <li>
            <div class="top">
                <p><a href="/news/<?php echo ($v['id']); ?>.html">{{$v['title']}}</a></p>
                <p><a href="/news/<?php echo ($v['id']); ?>.html"> <?php echo (mb_substr(strip_tags($v['content']), 0, 100)); ?></a></p>
            </div>
            <div class="bottom">
                <p class="time">
                    <span>{{$v['day']}}</span>
                    <span>{{$v['year']}}</span>
                </p>
                <img src="../image/main/journalism/clock.png" alt="">
            </div>
        </li>
        @endforeach

    </ul>



</div>

<div style="height: 66px;"></div>
<!--案例-->
<div class="al" style='margin-bottom:40px;'>
    <img src="../image/main/al.png" alt="" style="width: 100%">

    <div class="container al-container">
        <p class="english">cooperative case</p>
        <p class="service">
            合作案例
        </p>
        <div class="bg"></div>
        <div style='margin-top:100px;'>
            <ul class="special-card" style="justify-content: center;">
                <li class="special-card-active">资质新办</li>
                <li>安许</li>
                <li>增项</li>
                <li>升级</li>
                <li>其他</li>
            </ul>
        </div>
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



<script>
    function toggleUl(index) {
        var elementsByClassName = [...document.getElementsByClassName("journalism-list")];

        var tab = [...document.getElementsByClassName("tab")[0].children];
        for (let i = 0, len = elementsByClassName.length; i < len; i++) {
            let item = elementsByClassName[i];
            item.style.display = "none";
        }
        elementsByClassName[index].style.display = "block";
        for (let i = 0, len = tab.length; i < len; i++) {
            let item = tab[i];
            item.className = "";
        }
        tab[index].setAttribute("class", "active")
    }

    //提交表单信息
    function submit() {
        console.log("submit");
    }

    //点击 more按钮
    function more(flag) {
        var qualifications = document.getElementById("qualifications-list");
        var more = document.getElementsByClassName("more-toggle");
        var children = [...qualifications.children];

        if (flag) {
            children.splice(3).forEach(ele => {
                ele.style.width = "33%";
                ele.style.height = "auto";
            });
            more[0].style.display = "none";
            more[1].style.display = "block";
        } else {
            children.splice(3).forEach(ele => {
                ele.style.width = "0";
                ele.style.height = "0";
                ele.style.overflow = "hidden";
            });
            more[1].style.display = "none";
            more[0].style.display = "block";
        }
        var elementsByClassName = document.getElementsByClassName("qualifications-container");

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
    function copyText(self) {
        var name = document.getElementById('name');
        var name = name.value;
        if (!name) {
            alert('联系人姓名必填');
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
            alert('联系人电话必填');
            return false;
        }
        var wx = document.getElementById('wx');
        var wx = wx.value;
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
                "wx": wx,
                "login_type": 1,
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


    // window.onload = function() {
    //     $('#tel').vTicker({
    //         height: 400,
    //         pause: 1000
    //     });
    // }
    new Swiper('.swiper-container', {

        loop: true, // 循环模式选项 70
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
</body>

</html>