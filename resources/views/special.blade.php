<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>江西德志企业管理集团有限公司</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/body.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/swiper-bundle.min.css') }}">
    <script src="{{ URL::asset('js/swiper-bundle.js') }}"></script>
    <script src="{{ URL::asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.vticker.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="keywords" content="{{$keywords}}">
    <meta name="description" content="{{$description}}">
    <link rel="stylesheet" href="{{ URL::asset('css/standard2.css') }}">

</head>

<body>
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
        window.location = "m/special"
    }
</script>
<nav class="container special">


    <img src="{{ URL::asset('image/main/newnav_06@2x.png') }}" alt="">
    <!--需要高亮 写入 class active-->
    <ul class="link-list flex">
        <li class="active"><a href="javascript:void(0)">首页</a></li>
        <li><a href="#special-context">优势</a></li>
        <li><a href="#special-text">案例</a></li>
        <li><a href="#liuc">服务流程</a></li>
        <li><a href="#about">关于德志</a></li>
    </ul>

</nav>


<div class="swiper-container-box">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">

                <img src="{{ URL::asset('image/main/banner3.jpg') }}" style="width: 100%" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{ URL::asset('image/main/banner2.jpg') }}" style="width: 100%" alt="">

            </div>
            <div class="swiper-slide">
                <img src="{{ URL::asset('image/main/banner.png') }}" style="width: 100%" alt="">

            </div>
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>

    </div>
</div>


<div class="special-gx">
    <div class="container">
        <div class="special-context">
            <div class="special-text">
                <div class="special-text-left"></div>
                一站式建筑资质服务
                <div class="special-text-right"></div>
            </div>
            <p class="special-context-text">
                高效办理、通过率高、逾期赔付、不成功立即退款。让您省心更放心！
            </p>


        </div>
    </div>


</div>

<div class="container">
    <ul class="special-tab">
        <li class="special-tab-list">
            <div class="special-tab-list-top">
                <div class="special-tab-list-top-img"
                <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
                   target="_blank">
                    <img src="{{ URL::asset('image/special/tab/1-1.png') }}" class="special-img1" alt="">
                </a>
                <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
                   target="_blank">
                    <img src="{{ URL::asset('image/special/tab/1.png') }}" class="special-img2" alt="">
                </a>
            </div>
            <p class="special-tab-list-text">
                施工资质
            </p>
            <p class="zx">立即咨询</p>
            <p class="img-center">
                <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
                   target="_blank">
                <img src="{{ URL::asset('image/special/tab/hs.png') }}" class="special-tab-list-img hs" alt="">
                </a>
                <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
                   target="_blank">
                <img src="{{ URL::asset('image/special/tab/ws.png') }}" class="special-tab-list-img ws" alt="">
                </a>
            </p>

</div>
</li>
<li class="special-tab-list">
    <div class="special-tab-list-top">
        <div class="special-tab-list-top-img">
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/2-1.png') }}" class="special-img2" alt="">
            </a>
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/2.png') }}" class="special-img1" alt="">
            </a>
        </div>
        <p class="special-tab-list-text">
            监理资质
        </p>
        <p class="zx">立即咨询</p>
        <p class="img-center">
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/hs.png') }}" class="special-tab-list-img hs" alt="">
            </a>
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/ws.png') }}" class="special-tab-list-img ws" alt="">
            </a>
        </p>


    </div>

</li>
<li class="special-tab-list">
    <div class="special-tab-list-top">
        <div class="special-tab-list-top-img">
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/3.png') }}" class="special-img1" alt="">
            </a>
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/2-2.png') }}" class="special-img2" alt="">
            </a>
        </div>
        <p class="special-tab-list-text">
            设计资质

        </p>
        <p class="zx">立即咨询</p>
        <p class="img-center">
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/hs.png') }}" class="special-tab-list-img hs" alt="">
            </a>
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/ws.png') }}" class="special-tab-list-img ws" alt="">
            </a>
        </p>


    </div>


</li>
<li class="special-tab-list">
    <div class="special-tab-list-top">
        <div class="special-tab-list-top-img">
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/4.png') }}" class="special-img1" alt="">
            </a>
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/2-3.png') }}" class="special-img2" alt="">
            </a>
        </div>
        <p class="special-tab-list-text">
            造价资质
        </p>
        <p class="zx">立即咨询</p>
        <p class="img-center">
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/hs.png') }}" class="special-tab-list-img hs" alt="">
            </a>
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/ws.png') }}" class="special-tab-list-img ws" alt="">
            </a>
        </p>


    </div>


</li>

<li class="special-tab-list special-tab-list-bg">
    <div class="special-tab-list-top special-tab-list-top2">
        <p class="special-tab-list-top2-p1">
            安全许可证
        </p>
        <p class="special-tab-list-top2-p2">竭诚服务</p>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/special/tab/ws.png') }}" class="special-tab-list-img" alt="">
        </a>
    </div>
    <div class="special-tab-list-bg-bottom"></div>
    <div class="qtzz">
        <p class="special-tab-list-top2-p1">
            其他资质
        </p>
        <p class="special-tab-list-top2-p2">资质全面服务</p>
        <p class="img-center">
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/hs.png') }}" class="special-tab-list-img hs" alt="">
            </a>
            <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
               target="_blank">
            <img src="{{ URL::asset('image/special/tab/ws.png') }}" class="special-tab-list-img ws" alt="">
            </a>
        </p>
    </div>

</li>

</ul>


<div class="zx-rx">
    <div class="zx-rx-text">
        咨询热线：
        <span style="font-weight: bold">400-9955-661</span>
    </div>
    <div class="ljzx">
        立即咨询
        <img src="{{ URL::asset('image/special/click.png') }}" alt="">
    </div>
</div>


</div>


<div class="special-ys">
    <img src="{{ URL::asset('image/special/youshi.jpg') }}" class="youshi" alt="">
    <div class="container special-ys-container">

        <div class="special-context" id="special-context">
            <div class="special-text">
                <div class="special-text-left"></div>
                我们的优势
                <div class="special-text-right"></div>
            </div>
            <p class="special-context-text special-context-text2">
                高效办理、通过率高、逾期赔付、不成功立即退款。让您省心更放心！
            </p>


        </div>
        <div class="special-context-box">
            <div class="special-context-text">
                <span></span>
                <span>德志集团</span>
                <span>其他机构</span>
            </div>

            <div class="special-context-text special-context-text-hs">
                <div>效率</div>
                <div class="div-2">
                    <p>
                        一对一、不易出错
                    </p>
                    <p>
                        全程一对一跟踪式顾问服务，高效办理，无差错，专业更专注
                    </p>
                </div>

                <div class="div-2 div-3">
                    <p>

                        一心多用、易出错

                    </p>
                    <p>


                        一人对接多位客户，办理低效，容易搞混材料，且易怠慢客户


                    </p>


                </div>
            </div>
            <div class="special-context-text special-context-text-hs">
                <div>风险</div>
                <div class="div-2">
                    <p>
                        全程0风险
                    </p>
                    <p>
                        第三方江西博怀律师事务所全程监督协助，流程更安全更合规
                    </p>
                </div>

                <div class="div-2 div-3">
                    <p>


                        风险系数高


                    </p>
                    <p>


                        无第三方机构监督，风险系数极高


                    </p>


                </div>
            </div>
            <div class="special-context-text special-context-text-hs">
                <div>时间成本</div>
                <div class="div-2">
                    <p>

                        缩短办理时间

                    </p>
                    <p>

                        德志集团自有人才库和证书库，节省找证时间，提高办理速度

                    </p>
                </div>

                <div class="div-2 div-3">
                    <p>


                        浪费大量的时间


                    </p>
                    <p>


                        没有自己的人才库和证书库，需要花费大量的时间在市场上寻找证书


                    </p>


                </div>
            </div>

            <div class="special-context-text special-context-text-hs">
                <div>成功率</div>
                <div class="div-2">
                    <p>


                        成功率高


                    </p>
                    <p>


                        多年打磨的团队，擅长把握最新政策的走向。成功率高达
                        <i style="font-style: normal;color: #FBB730">95%</i>

                    </p>
                </div>

                <div class="div-2 div-3">

                    <p>


                        失败率高


                    </p>

                    <p>
                        不注重政策的解读，容易走弯路，浪费大量的时间。失败率极高
                    </p>


                </div>
            </div>


            <div class="special-context-text special-context-text-hs">
                <div>保障</div>
                <div class="div-2">
                    <p>
                        保障机制，放心更省心
                    </p>
                    <p>
                        签署保障协议，费用透明公开。逾期赔付、不成功立即退款
                    </p>
                </div>

                <div class="div-2 div-3">

                    <p>


                        无保障机制，费钱更费神


                    </p>

                    <p>

                        口头保障，费用不透明，含隐形费用。让客户更费神


                    </p>


                </div>
            </div>

            <div class="special-context-text special-context-text-hs">
                <div>口碑</div>
                <div class="div-2">
                    <p>

                        良好的口碑铸就信誉

                    </p>
                    <p>

                        每年助力上万家企业，好评如潮。成就德志集团省内行业领跑者

                    </p>
                </div>

                <div class="div-2 div-3">

                    <p>


                        一锤子买卖，无口碑


                    </p>

                    <p>


                        一锤子买卖。有一单做一单，不注重客户体验


                    </p>


                </div>
            </div>


        </div>


    </div>


</div>


<div class="container">
    <div class="special-context">
        <div class="special-text" id="special-text">
            <div class="special-text-left"></div>
            部分成功案例
            <div class="special-text-right"></div>
        </div>
        <p class="special-context-text">
            专注建筑资质申办，高效优质企业服务平台
        </p>


    </div>
    <div style="height: 30px;"></div>
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
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/1.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/2.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/3.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/4.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/5.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/6.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/7.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/8.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/9.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/10.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/11.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zzxb/12.jpg') }}" alt="">
        </a>
    </li>


</ul>

<ul class="zs-list container">

    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/1.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/2.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/3.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/4.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/5.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/6.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/7.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/8.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/9.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/10.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/11.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/ax/12.jpg') }}" alt="">
        </a>
    </li>
</ul>
<ul class="zs-list container">
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/1.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/2.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/3.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/4.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/5.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/6.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/7.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/8.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/9.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/10.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/11.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/zx/12.jpg') }}" alt="">
        </a>
    </li>

</ul>
<ul class="zs-list container">
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/1.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/2.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/3.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/4.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/5.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/6.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/7.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/8.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/9.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/10.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/11.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/sj/12.jpg') }}" alt="">
        </a>
    </li>
</ul>
<ul class="zs-list container">
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/1.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/2.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/3.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/4.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/5.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/6.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/7.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/8.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/9.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/10.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/11.jpg') }}" alt="">
        </a>
    </li>
    <li>
        <a href="http://p.qiao.baidu.com/cps/chat?siteId=11496385&userId=24749681&siteToken=82655e092b04e02aee7295b103cf4fa6"
           target="_blank">
        <img src="{{ URL::asset('image/qt/12.jpg') }}" alt="">
        </a>
    </li>
</ul>

<div id="liuc" style="position: relative;">
    <div class="special-context" style="position: absolute;top:78px;left:0;right:0">
        <div class="special-text" id="special-text">
            <div class="special-text-left"></div>
            服务流程
            <div class="special-text-right"></div>
        </div>
        <p class="special-context-text">
            通过率高，速度快，服务好
        </p>


    </div>
    <img src="{{ URL::asset('image/special/liuc.png') }}" style="width: 100%" alt="">
</div>


<div style="height: 114px;"></div>
<div class="container">
    <div class="special-context">
        <div class="special-text">
            <div class="special-text-left"></div>
            集团介绍
            <div class="special-text-right"></div>
        </div>
        <p class="special-context-text">
            专注建筑资质申办，高效优质企业服务平台
        </p>


    </div>
</div>
<div style="height: 114px;"></div>

<div class="special-jt">
    <div class="jt">

        <img src="{{ URL::asset('image/special/jt.png') }}" class="special-jt-img" alt="">

    </div>

    <div class="yellow"></div>

    <div class="special-jt-context">
        <div class="about" id="about">
            ABOUT JIANGXI DEZHI
        </div>

        <div class="about-hs"></div>

        <p class="about-text">
            江西德志企业管理集团有限公司是家专业从事建筑企业资质服务的公司，
            公司注册资本1000万元。经过3年的不断创新和发展，
            在2018年已实现建筑领域全业务覆盖的集团化企业，
            现已成为--家可提供资质新办、转让、升级，劳务服务，
            猎头服务，培训服务，
            资质重组、分立、资质托管及建筑施工等全方位建筑业服务的企业。
        </p>

        <div class="about-line"></div>


        <p class="about-text">
            企业在发展历程中不断完善内部机制，
            聚集了众多素质优良的专业人才，
            从而使得客户能够享受到贴心专业服务。
        </p>
        <div class="about-line"></div>

        <p class="about-text">
            现已控股多家具备建筑工程、
            市政公用工程施工总承包二级资质，
            建筑装修装饰工程专业承包二级资质、
            城市道路照明工程专业承包二级资质、
            地基基础工程专业承包三级等资质的建筑类企业，
            目前企业总部的精英团队已突破百人。
        </p>


        <p class="about-text">
            企业及所属单位先后荣获南昌市建筑业会员单位、
            南昌市建筑业先进企业、南昌市建筑业诚信单位、
            江西十佳创新企业。
        </p>
        <div class="about-line"></div>
        <p class="about-text">
            江西德志企业管理集团以“坚持、高效、突破、
            创新、团结、感恩”为企业文化，
            坚持“诚信双赢”的服务宗旨。
            立志成为全国建筑业服务企业领导者!

        </p>
        <div class="about-line"></div>
        <p class="about-text">
            德志集团总部设立在英雄城市--南昌。目前已在
            <i>
                上饶、
            </i>
            <i>
                宜春、
            </i>
            <i>
                赣州、
            </i>

            等地成立分公司。希望可以更好的服务客户！

        </p>
        <div class="about-line"></div>
        <p class="about-more about-text">
            MORE+
        </p>


    </div>

    <div class="special-jt-bottom">
        <ul class="container special-jt-bottom-container">
            <li><a href="http://www.jxdz0791.com" class="flex">
                    <img src="{{ URL::asset('image/special/address.png') }}" alt="" class="address">
                    <img src="{{ URL::asset('image/special/address1.png') }}" alt="" class="address1">
                    <span>南昌总部 </span></a>
            </li>
            <li>
                <a href="http://shangrao.jxdz0791.com" class="flex">
                    <img src="{{ URL::asset('image/special/address.png') }}" alt="" class="address">
                    <img src="{{ URL::asset('image/special/address1.png') }}" alt="" class="address1">
                    <span>上饶分公司 </span></a>
            </li>
            <li><a href="http://yichun.jxdz0791.com" class="flex">
                    <img src="{{ URL::asset('image/special/address.png') }}" alt="" class="address">
                    <img src="{{ URL::asset('image/special/address1.png') }}" alt="" class="address1">
                    <span>宜春分公司 </span></a>
            </li>
            <li><a href="http://ganzhou.jxdz0791.com" class="flex">
                    <img src="{{ URL::asset('image/special/address.png') }}" alt="" class="address">
                    <img src="{{ URL::asset('image/special/address1.png') }}" alt="" class="address1">
                    <span>赣州分公司 </span></a>
            </li>
        </ul>
    </div>


</div>
<div class="container">
    <div class="tel">
        <img src="{{ URL::asset('image/special/tel.png') }}" alt="">
        <span>全国统一服务热线：</span>
        <i>
            400-9955-661
        </i>


    </div>

    <div class="tel-container">
        <div class="tel-container-left">
            <p class="tel-container-left-address">
                <span style="width: 70px;height: 1px"></span>
                <img src="{{ URL::asset('image/special/address1.png') }}" alt="">
                <i>总部及各个分公司地址：</i>
            </p>

            <ul class="tel-address pc-tel-address">
                <li>
                    <span>南昌总部：</span>
                    <span>
                            江西省南昌市红谷滩新区地王大厦A座10楼
                        </span>
                </li>
                <li>
                        <span>
                            上饶分公司：</span>
                    <span>
                            江西省上饶市信州区万达广场五桂座2308. 2309
                        </span>
                </li>
                <li>
                        <span>
                            宜春分公司：
                        </span>
                    <span>
                            江西省宜春市袁州区台商大厦23楼（维也纳酒店楼上）
                        </span>
                </li>
                <li>
                        <span>
                            赣州分公司：
                        </span>
                    <span>
                            江西省赣州市章贡区阳明国际中心3号楼903室
                        </span>
                </li>
            </ul>


            <div class="tel-send">
                <h3 class="mf">立即免费获取报价和方案</h3>
                <input type="text" placeholder="姓名" id='namee'>
                <input type="text" placeholder="电话" id='phonee'>
                <input type="text" placeholder="留言" id='contente'>
                <button class="tel-send-button" onclick="copyText2();">SEND</button>
            </div>


        </div>
        <div class="tel-container-right">

            <div class="tel-container-right-button">
                本月已有
                <span>
                        100+
                    </span>
                家建筑企业获得帮助


            </div>

            <div class="text-flex flex">
                <span class="name">姓名</span>
                <span>手机号</span>
                <span>咨询业务</span>
            </div>
            <div id="tel">
                <ul>
                    @foreach ($data as $v)
                        <li class="text-flex flex">
                            <span>{{$v['name']}}</span>
                            <span>{{$v['tel']}} </span>
                            <span class="yellow">{{$v['type']}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="foot foot2">


    <p class="footer-text">Copyright® 2020 江西德志企业管理集团有限公司 版权所有 &nbsp&nbsp&nbsp&nbsp 赣ICP备17075085号-3 &nbsp&nbsp&nbsp&nbsp
        <script type="text/javascript">
            document.write(unescape("%3Cspan id='cnzz_stat_icon_1279428458'%3E%3C/span%3E%3Cscript src='https://s9.cnzz.com/z_stat.php%3Fid%3D1279428458%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
        </script>
    </p>


</div>
<div class="footer-container">
    <div class="footer-container-left">
        <p class="wzz">
            问资质
        </p>
        <p class="jz">
            就找德志集团
        </p>
    </div>
    <div class="footer-container-right">
        <input type="text" placeholder="您的姓名" id='name'>
        <input type="text" placeholder="您的联系电话" id='phone'>
        <input type="text" placeholder="写下您的要求和建议" id='content'>
        <input type="submit" class="submit" value="提交" onclick="copyText();">

    </div>
</div>

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

    $linkLi.children().click(function () {
        $linkLi.removeClass("active");
        $(this).parent().addClass("active");
    });
    //点击资质新版
    $specialLi.click(function (e) {
        $specialLi.removeClass("special-card-active");
        $(this).addClass("special-card-active");
        hiddenZsList($specialLi.index(this));
    });


    window.onload = function () {
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
        var tel = document.getElementById('phone');
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
                "login_type": 4,
                '_token': '{{csrf_token()}}'
            },
            success: function (data) {
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
    function copyText2(self) {
        var name = document.getElementById('namee');
        var name = name.value;
        if (!name) {
            alert('姓名必填');
            return false;
        }
        var content = document.getElementById('contente');
        var content = content.value;
        if (!content) {
            alert('咨询资质必填');
            return false;
        }
        var tel = document.getElementById('phonee');
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
                "login_type": 2,
                '_token': '{{csrf_token()}}'
            },
            success: function (data) {
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
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?82655e092b04e02aee7295b103cf4fa6";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script>
    (function () {
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