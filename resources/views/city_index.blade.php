<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>德志集团</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/body.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/swiper-bundle.min.css') }}">
    <script src="{{ URL::asset('js/swiper-bundle.js') }}"></script>
    <script src="{{ URL::asset('js/swiper-bundle.min.js') }}"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="http://api.map.baidu.com/api?v=2.0&ak=SOD0GtUP8nPyhnFNZ5T5KVKxVb26S1Tc&s=1"></script>
    <script src="//api.map.baidu.com/api?type=webgl&v=1.0&ak=SOD0GtUP8nPyhnFNZ5T5KVKxVb26S1Tc"></script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/address.js') }}"></script>


    <script>
        var url = "http://api.map.baidu.com/routematrix/v2/driving";

        var ak = "Vv8lBii9hGo1gGo9TuD3U7dgH8G0CzwA";



        function showLocation(res) {
            if (!res.result)
                return;
            var location = res.result.location;
            var lat = location.lat;
            var lng = location.lng;
            var origins = lat + "," + lng;

            autoLocation(function(e) {

                var point = e.point;
                var lat = point.lat;
                var lng = point.lng;
                var destinations = lat + "," + lng;
                doTest(origins, destinations, ak);
            });

        }

        function doTest(origins, destinations, ak) {

            $.ajax({
                type: "Get",
                url: "http://api.map.baidu.com/routematrix/v2/driving",
                dataType: "jsonp",
                jsonp: "callback", //传递给请求服务器处理程序或页面的，用以获得JSONP回调函数名
                data: {
                    origins,
                    destinations,
                    ak
                },
                jsonpCallback: "jsonCallBackTest", //自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名，此属性可不配置
                error: function(e) {

                }
            });

        }

        function jsonCallBackTest(data) {
            console.log(data)
            $(".jl").text("距离您" + data.result[0].distance.text)

        }
    </script>
    <script src="http://api.map.baidu.com/geocoding/v3/?address=<?php echo $ti['chose']['address']; ?>&ak=SOD0GtUP8nPyhnFNZ5T5KVKxVb26S1Tc&output=json&callback=showLocation">
    </script>
    <script>
        (function() {
            let html = document.documentElement;
            let width = html.getBoundingClientRect().width;
            html.style.fontSize = width / 20 + 'px';
        })()
    </script>
</head>

<body>
    <nav class="m-nav flex">
        <div class="m-container flex">
            <div class="m-nav-left flex">
                <img src="{{ URL::asset('image/special-app/dz.png') }}" class="dz">
                <div class="m-nav-left-area" id="area">
                    <span id="area-text">定位中</span>
                    <img src="{{ URL::asset('image/m/down.png') }}" class="down">
                </div>
            </div>
        </div>

    </nav>

    <div style="height: 2.6875rem;"></div>
    <img src="{{$banner['1']['content']}}" class="m-banner">




    <ul class="m-grid m-container">
        <a href="<?php echo ($url . '/case.html'); ?>">
            <li>

                <img src="{{ URL::asset('image/m/grid/al.png') }}">
                <span>成功案例</span>
            </li>
        </a>
        <a href="<?php echo ($url . '/standard.html'); ?>">
            <li>
                <img src="{{ URL::asset('image/m/grid/bz.png') }}" alt="">
                <span>资质标准</span>
            </li>
        </a>
        <a href="<?php echo ($url . '/practice.html'); ?>">
            <li>
                <img src="{{ URL::asset('image/m/grid/gy.png') }}" alt="">
                <span>关于德志</span>
            </li>
        </a>
        <li>
            <img src="{{ URL::asset('image/m/grid/bj.png') }}" alt="">
            <span>免费报价</span>
        </li>
    </ul>


    <div class=" m-container">
        <div class="m-address">
            <h1 class="m-address-gs">江西德志企业管理集团有限公司</h1>
            <div class="jl"></div>
            <div class="m-address-dw" style="margin-bottom: 0.5rem">
                <div class="m-address-dw-left">
                    <img src="{{ URL::asset('image/m/address.png') }}" alt="">
                    <h1> {{$ti['chose']['address']}}</h1>
                </div>
                <a class="send1" href="http://api.map.baidu.com/geocoder?address=<?php echo $ti['chose']['address']; ?>&output=html&src=webapp.baidu.openAPIdemo">
                    <div class="m-address-dw-right">
                        导航
                    </div>
                </a>

            </div>
            <div class="m-address-dw">
                <div class="m-address-dw-left">
                    <img src="{{ URL::asset('image/m/tel1.png') }}" alt="">
                    <h1> {{$ti['chose']['tel']}}</h1>
                </div>
                <a href="tel:<?php echo $ti['chose']['tel']; ?>">
                    <div class="m-address-dw-right">
                        拨打
                    </div>
                </a>
            </div>
        </div>


    </div>


    <div style="height: 0.1875rem;background: rgb(245,245,245)"></div>


    <div class="m-classification">
        <div class="m-classification-left"></div>

        <div class="m-classification-right">
            <div class="m-text">
                <h1>资质分类</h1>
                <i>CLASSIFICATION</i>
            </div>
            <a href="<?php echo ($url . '/standard-66.html'); ?>">
                <ul class="m-classification-right-list">
                    <li class="m-classification-right-list-item">
                        <div class="m-classification-right-list-item-left">
                            <div class="m-classification-right-list-item-left-container">
                                <span>#</span>
                                <h3> 施工资质</h3>
                            </div>
                        </div>
                        <div class="m-classification-right-list-item-right">
                            <span>总包</span>
                            <span>分包</span>
                            <span class="blue"><i>更多</i>
                                <img src="{{ URL::asset('image/m/gd.png') }}" alt="">
                            </span>

                        </div>
                    </li>
            </a>
            <a href="<?php echo ($url . '/standard-65.html'); ?>">
                <li class="m-classification-right-list-item">
                    <div class="m-classification-right-list-item-left m-classification-right-list-item-left2">
                        <div class="m-classification-right-list-item-left-container m-classification-right-list-item-left-container2">
                            <span>#</span>
                            <h3> 监理</h3>
                        </div>
                    </div>
                    <div class="m-classification-right-list-item-right">
                        <span>综合</span>
                        <span>专业</span>
                        <span class="blue"><i>更多</i>
                            <img src="{{ URL::asset('image/m/gd.png') }}" alt="">
                        </span>

                    </div>
                </li>
            </a>
            <a href="<?php echo ($url . '/standard-134.html'); ?>">
                <li class="m-classification-right-list-item">
                    <div class="m-classification-right-list-item-left m-classification-right-list-item-left3">
                        <div class="m-classification-right-list-item-left-container m-classification-right-list-item-left-container2">
                            <span>#</span>
                            <h3> 勘察</h3>
                        </div>
                    </div>
                    <div class="m-classification-right-list-item-right">
                        <span>综合</span>
                        <span>专业</span>

                        <span class="blue"><i>更多</i>
                            <img src="{{ URL::asset('image/m/gd.png') }}" alt="">
                        </span>

                    </div>
                </li>
            </a>
            <a href="<?php echo ($url . '/standard-141.html'); ?>">
                <li class="m-classification-right-list-item">
                    <div class="m-classification-right-list-item-left m-classification-right-list-item-left4">
                        <div class="m-classification-right-list-item-left-container m-classification-right-list-item-left-container2">
                            <span>#</span>
                            <h3> 设计</h3>
                        </div>
                    </div>
                    <div class="m-classification-right-list-item-right">
                        <span>综合</span>
                        <span>专项</span>

                        <span class="blue"><i>更多</i> <img src="{{ URL::asset('image/m/gd.png') }}" alt=""></span>

                    </div>
                </li>
            </a>
            <a href="<?php echo ($url . '/standard-171.html'); ?>">
                <li class="m-classification-right-list-item">
                    <div class="m-classification-right-list-item-left m-classification-right-list-item-left5">
                        <div class="m-classification-right-list-item-left-container m-classification-right-list-item-left-container2">
                            <span>#</span>
                            <h3> 其他</h3>
                        </div>
                    </div>
                    <div class="m-classification-right-list-item-right">
                        <span>造价</span>
                        <span>房开</span>

                        <span class="blue" style="color:black">
                            <i>劳务</i>

                        </span>

                    </div>
                </li>
            </a>

            </ul>


        </div>
    </div>


    <div style="background: rgb(245,245,245);height: 0.5rem"></div>


    <div class="m-container" style="padding-top: 0.6875rem">
        <div class="m-text">
            <h1>公司环境</h1>
            <i>ENVIRONMENTAL SCIENCE</i>
        </div>


        <ul class="m-science">
            <li class="m-science-width1">
                <img src="{{ URL::asset('image/m/hj/1.png') }}" alt="">
            </li>
            <li class="m-science-width1 m-science-width1-ts">
                <img src="{{ URL::asset('image/m/hj/2.png') }}" alt="">
            </li>
            <li class="m-science-width1"><img src="{{ URL::asset('image/m/hj/3.png') }}" alt=""></li>
            <li class="m-science-width2"><img src="{{ URL::asset('image/m/hj/4.png') }}" alt=""></li>
            <li class="m-science-width2"><img src="{{ URL::asset('image/m/hj/4.png') }}" alt=""></li>
        </ul>


    </div>
    <div style="background: rgb(245,245,245);height: 0.5rem"></div>


    <div class="m-container m-qualifications-container">
        <div class="m-qualifications-top">
            <div class="m-text">
                <h1>资质头条</h1>
                <i>QUALIFICATION HEADLINES</i>
            </div>
            <div class="m-qualifications-top-more">
                <a href="/newslist/index">
                    <i>MORE</i>
                    <img src="{{ URL::asset('image/m/more.png') }}" alt="">
                </a>
            </div>
        </div>


    </div>

    <div class="m-container m-tabs-container">
        <ul class="m-tabs" id="tabs">
            <li class="active">行业聚焦</li>
            <li>资质百科</li>
            <li>办事指南</li>
        </ul>
    </div>

    <div class="m-container">
        <ul class="move">
            @foreach ($news['newsone'] as $v)
            <a href="<?php echo ($url . '/news/news_' . $v['id'] . '.html'); ?>">
                <li class="move-item">
                    <div class="move-item-left">
                        <div class="move-item-left-container">
                            <p>{{$v['day']}}</p>
                            <p>{{$v['year']}}</p>
                        </div>
                    </div>
                    <div class="move-item-right">
                        <h3 class="font">{{$v['title']}}</h3>
                        <p> {{$v['content']}}</p>
                    </div>
                </li>
            </a>
            @endforeach

        </ul>

        <ul class="move" style="display:none;">

            @foreach ($news['newstwo'] as $v)
            <a href="<?php echo ($url . '/news/news_' . $v['id'] . '.html'); ?>">
                <li class="move-item">
                    <div class="move-item-left">
                        <div class="move-item-left-container">
                            <p>{{$v['day']}}</p>
                            <p>{{$v['year']}}</p>
                        </div>
                    </div>
                    <div class="move-item-right">
                        <h3 class="font">{{$v['title']}}</h3>

                        <p> {{$v['content']}}</p>

                    </div>
                </li>
            </a>
            @endforeach

        </ul>
        <ul class="move" style="display:none;">

            @foreach ($news['newsthree'] as $v)
            <a href="<?php echo ($url . '/news/news_' . $v['id'] . '.html'); ?>">
                <li class="move-item">
                    <div class="move-item-left">
                        <div class="move-item-left-container">
                            <p>{{$v['day']}}</p>
                            <p>{{$v['year']}}</p>
                        </div>
                    </div>
                    <div class="move-item-right">
                        <h3 class="font">{{$v['title']}}</h3>
                        <p>
                            <p> {{$v['content']}}</p>
                        </p>
                    </div>
                </li>
            </a>
            @endforeach

        </ul>

    </div>


    <div style="background: rgb(245,245,245);height: 0.5rem"></div>

    <div class="m-container">

        <div class="m-al">
            <div class="m-text">
                <h1>合作案例</h1>
                <i>COOPERATION CASES</i>
            </div>
        </div>
        <ul id="special-app-card" class="special-app-card special-app-card-padding">
            <li class="active">
                资质新办
            </li>
            <li>
                安许
            </li>
            <li>
                增项
            </li>
            <li>
                升级
            </li>
            <li>
                其他
            </li>

        </ul>
        <ul class="m-zs" id="zs">
            <!-- <li>
                <img src="{{ URL::asset('image/special-app/zs.png') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/special-app/zs.png') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/special-app/zs.png') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/special-app/zs.png') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/special-app/zs.png') }}" alt="">
            </li>
            <li>
                <img src="{{ URL::asset('image/special-app/zs.png') }}" alt="">
            </li> -->
        </ul>

    </div>
    <div style="height: 2.625rem;"></div>
    <div class="m-footer-flex">
        <a href="tel:<?php echo $ti['chose']['tel']; ?>">
            <img src="{{ URL::asset('image/m/tel2.png') }}">
            咨询热线{{$ti['chose']['tel']}}
        </a>
    </div>

    <input type="hidden" value=<?php echo $city;  ?> name='ssss' />

    <input type="hidden" value="{{$route_city}}" name='route_city' />
    <input type="hidden" value=<?php echo $b['name'];  ?> name='xixixi' />

</body>

<script>
    var $tabs = $("#tabs li");

    var $move = $(".move");
    var $area = $("#area");

    var route_city = $('input[name="route_city"]').val();

    var xixixi = $('input[name="xixixi"]').val();
    //定位
    if (route_city == '') {
        autoLocation(function(e) {
            var city = e.address.city;
            $("#area-text").text(city);
        });
    } else {
        $("#area-text").text(xixixi);
    }

    $tabs.click(function() {
        $tabs.removeClass("active");
        $(this).addClass("active");
        var index = $tabs.index(this);
        $move.hide();
        $($move[index]).show();
    });
    //跳转地区页面
    var children = $('input[name="ssss"]').val();
    var url = "{{ url('chosecity') }}?city=" + children;
    $area.click(function() {
        window.location = url;
    })
</script>
<script>
    var $swiperWrapper2 = $("#swiper-wrapper2");
    var $specialAppCard = $("#special-app-card li");
    var $indicator = $("#indicator");
    var $card = $("#special-app-card li");
    var $zs = $("#zs");
    console.log($zs)

    new Swiper('.swiper-container', {
        loop: true, // 循环模式选项
        autoplay: true,
        // 如果需要分页器
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });
    var testSlide = [{
            url: "{{ URL::asset('image/zzxb/1.jpg') }}"
        },
        {
            url: "{{ URL::asset('image/zzxb/2.jpg') }}"
        },
        {
            url: "{{ URL::asset('image/zzxb/3.jpg') }}"
        },
        {
            url: "{{ URL::asset('image/zzxb/4.jpg') }}"
        },
        {
            url: "{{ URL::asset('image/zzxb/5.jpg') }}"
        },
        {
            url: "{{ URL::asset('image/zzxb/6.jpg') }}"
        },
        {
            url: "{{ URL::asset('image/zzxb/7.jpg') }}"
        },
        {
            url: "{{ URL::asset('image/zzxb/8.jpg') }}"
        },
        {
            url: "{{ URL::asset('image/zzxb/9.jpg') }}"
        },
    ];

    var swiper = null;
    //点击send按钮
    function send() {}

    //初始话合作按钮
    createZs(
        testSlide
    );
    //点击资质新办
    $card.click(function() {
        $card.removeClass("active");
        $(this).addClass("active");
        // 传递进去  testSlide 样本数组
        var aa = $(this).text().trim();
        var testSlide = []
        if (aa == '资质新办') {
            testSlide = [{
                    url: "{{ URL::asset('image/zzxb/1.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zzxb/2.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zzxb/3.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zzxb/4.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zzxb/5.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zzxb/6.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zzxb/7.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zzxb/8.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zzxb/9.jpg') }}"
                },
            ];
        }
        if (aa == '安许') {
            testSlide = [{
                    url: "{{ URL::asset('image/ax/1.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/ax/2.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/ax/3.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/ax/4.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/ax/5.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/ax/6.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/ax/7.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/ax/8.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/ax/9.jpg') }}"
                },
            ];
        }
        if (aa == '增项') {
            testSlide = [{
                    url: "{{ URL::asset('image/zx/1.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zx/2.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zx/3.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zx/4.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zx/5.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zx/6.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zx/7.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zx/8.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/zx/9.jpg') }}"
                },

            ];
        }
        if (aa == '升级') {
            testSlide = [{
                    url: "{{ URL::asset('image/sj/1.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/sj/2.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/sj/3.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/sj/4.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/sj/5.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/sj/6.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/sj/7.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/sj/8.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/sj/9.jpg') }}"
                },

            ];
        }
        if (aa == '其他') {
            testSlide = [{
                    url: "{{ URL::asset('image/qt/1.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/qt/2.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/qt/3.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/qt/4.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/qt/5.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/qt/6.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/qt/7.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/qt/8.jpg') }}"
                },
                {
                    url: "{{ URL::asset('image/qt/9.jpg') }}"
                },

            ];
        }

        createZs(testSlide)
    });

    function createZs(testSlide) {
        var htmlStr = ""
        for (var i = 0, len = testSlide.length; i < len; i++) {
            var li = "<li>"
            var url = testSlide[i].url;
            li += "<img src=" + url + "></li>";
            htmlStr += li;
        }
        $zs.html(htmlStr)
    }



    //创建 轮播图
    function createSlide(slideData) {
        if (Object.prototype.toString.call(slideData).indexOf("Array") === -1) return;
        var len = slideData.length;
        if (len % 9 !== 0) {
            //补齐元素
            var ys = Math.ceil(len / 9);
            ys = ys * 9 - len;
            for (var i = 0; i < ys; i++) {
                slideData.push(null);
            }
            len = slideData.length;
        }
        $swiperWrapper2.empty();

        var htmlStr = "";
        for (var i = 0; i < len; i++) {
            var slide = slideData[i];
            if (slide) {
                htmlStr += "<div class='swiper-slide'> <img src=" + slide.url + " alt=''></div>"
            } else {
                htmlStr += "<div class='swiper-slide'></div>"
            }
        }

        $swiperWrapper2.html(htmlStr);
        initSwiper(len / 9);
    }


    function initSwiper(len) {
        swiper = new Swiper('.swiper-container2', {
            loop: false, // 循环模式选项
            autoplay: false,
            slidesPerGroup: 3,
            slidesPerView: 3, //一行显示3个
            slidesPerColumn: 3, //显示3行,
            slidesPerColumnFill: 'row',
            on: {
                slideChangeTransitionEnd(e) {
                    var activeIndex = e.activeIndex / 3;
                    changeIndicatorLi(true, activeIndex);
                }
            }
        });
        //创建下面的点
        $indicator.empty();
        var htmlStr = "<li class='active'></li>";
        for (var i = 0; i < len - 1; i++) {
            htmlStr += "<li></li>"
        }
        $indicator.html(htmlStr);
        changeIndicatorLi();
    }

    function changeIndicatorLi(flag, activeIndex) {
        var $indicator = $("#indicator li");
        if (flag) {
            $indicator.removeClass("active");
            if (activeIndex !== -1) {
                $($indicator[activeIndex]).addClass("active");
            }
            return;
        }

        $indicator.mouseover(function() {
            var index = $("#indicator li").index($(this));
            swiper.slideTo(index);
        });
    }

    var $appMenu = $("#app-menu .app-menu-list li");
    $appMenu.click(function() {
        $appMenu.removeClass("active");
        $(this).addClass("active");
    });
    $("#app-menu-parent").click(function(e) {

        $(this).toggle(100);
    });
    $("#lb").click(function() {
        $("#app-menu-parent").toggle(200);
    });
</script>

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?9269a30dd239397202981f3a7425620a";
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