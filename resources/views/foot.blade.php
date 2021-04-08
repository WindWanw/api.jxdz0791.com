<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/body.css">
</head>

<body>
    <div class="foot">
        <div class="container">
            <div class="left-foot">
                <span><a style="color: white;" target="_blank" href="/practice.html">关于我们</a></span>
                <span><a style="color: white;" target="_blank" href="/newslist/index">新闻中心</a></span>
                <span><a style="color: white;" target="_blank" href="/standard.html">资质标准</a></span>
                <span><a style="color: white;" target="_blank" href="/practice.html">联系我们</a></span>
            </div>

            <div class="right-foot">
                <span class="phone"><img src="{{ URL::asset('image/foot/phone.png') }}"></span>
                @if($ti['chose']['tel'] )
                <span class="hot-line">服务热线：{{$ti['chose']['tel']}}</span>
                @else
                <span class="hot-line">服务热线：400-9955-661</span>
                @endif

                <span class="email"><img src="{{ URL::asset('image/foot/email.png') }}">企业邮箱：service@jianzhubaba.com</span>
                @if($ti['chose']['address'] )
                <span class="address"><img src="{{ URL::asset('image/foot/address.png') }}">公司地址：{{$ti['chose']['address']}}</span>
                @else
                <span class="address"><img src="{{ URL::asset('image/foot/address.png') }}">公司地址：南昌市红谷滩新区世贸路金涛大厦A座10F</span>
                @endif
            </div>

            <!-- <div class="qr">
                <img src="{{ URL::asset('image/foot/erwm.png') }}">
                <span class="ttt">扫描二维码</span>
            </div> -->


        </div>


        <div class="footer-line"></div>

        <p class="footer-text">Copyright® 2020 江西德志企业管理集团有限公司 版权所有 &nbsp&nbsp&nbsp&nbsp 赣ICP备17075085号-3 &nbsp&nbsp&nbsp&nbsp
        <script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1279428458'%3E%3C/span%3E%3Cscript src='https://s9.cnzz.com/z_stat.php%3Fid%3D1279428458%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
            </p>
       

    </div>
</body>

</html>