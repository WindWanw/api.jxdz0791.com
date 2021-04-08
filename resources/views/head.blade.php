<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/body.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/swiper-bundle.min.css') }}">
    <script src="{{ URL::asset('js/swiper-bundle.js') }}"></script>
    <script src="{{ URL::asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.vticker.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="{{$keywords}}">
    <meta name="description" content="{{$description}}">
    <link rel="stylesheet" href="{{ URL::asset('css/standard2.css') }}">
    
   
    <style>
        
        .xl2 {
            position: relative;
            cursor: pointer;
        }

        @keyframes ani {
            0% {

                bottom: 0;
                height: 0;

            }

            100% {
                height: auto;
                bottom: auto;

            }
        }

        .select {
            position: absolute;

            left: 0;
            right: 0;
            box-shadow: 0 0 10px #ccc;
            width: 90px;
            z-index: 2;
            border-radius: 5px;

            background: white;
            color: black;


            display: none;


        }

        .select li.active {
            color: blue;
        }

        .select li {
            line-height: 30px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .select li:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>
    <div class="box-sh">
        <nav class="container">

            <img src="../image/main/LOGO@3x.png" alt="">
            <!--需要高亮 写入 class active-->
            <ul class="link-list flex">
                <li <?php if ($data['status'] == 1) { ?> class="active" <?php } ?>><a href="\">首页</a></li>
                <!-- <li <?php if ($data['status'] == 2) { ?> class="active" <?php } ?>><a href="/zzxb.html">资质业务</a></li> -->
                <li <?php if ($data['status'] == 3) { ?> class="active" <?php } ?>><a href="/standard.html">资质标准</a></li>
                <li <?php if ($data['status'] == 4) { ?> class="active" <?php } ?>><a href="/newslist/index">新闻中心</a></li>
                <li <?php if ($data['status'] == 5) { ?> class="active" <?php } ?>><a href="/case.html">经典案例</a></li>
                <li <?php if ($data['status'] == 6) { ?> class="active" <?php } ?>><a href="/practice.html">联系我们</a></li>
            </ul>


            <div class="nav-right flex">
                <div class="xl2" id="xl">

                    <div class="xl">
                        @if($ti['chose']['name'] )
                        <span>{{$ti['chose']['name']}}</span>
                        @else
                        <span>总站</span>
                        @endif

                        <img src="{{ URL::asset('image/main/xl.png')}}" alt="">
                    </div>

                    <ul class="select" id="select">
                        @foreach ($ti['all'] as $v)
                        <li class="active"><a href="{{$v['url']}}"> {{$v['name']}}</a></li>
                        <!-- <li class="active"><a href="http://nanchang.jxdz0791.com">南昌</a></li>
                        <li class="active"><a href="http://yichun.jxdz0791.com">宜春</a></li>
                        <li class="active"><a href="http://shangrao.jxdz0791.com">上饶</a></li>
                        <li class="active"><a href="http://ganzhou.jxdz0791.com">赣州</a></li> -->
                        @endforeach
                    </ul>

                </div>




                <img src="{{ URL::asset('image/main/phone.png')}}" alt="" class="phone">
                @if($ti['chose']['tel'] )
                <p class="phone-text">{{$ti['chose']['tel']}}</p>
                @else
                <p class="phone-text">400-9955-661</p>
                @endif
            </div>



        </nav>
    </div>
    
    
    <script>
        var xl = document.getElementById("xl");
        var select = document.getElementById("select");

        var length = select.children.length;

        xl.onclick = function() {
            select.style.display = "block"

        }
        xl.onmouseleave = function() {
            select.style.display = "none"
        }
    </script>