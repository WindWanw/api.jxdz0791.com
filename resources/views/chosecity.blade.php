<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>地区</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/body.css">
    <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://api.map.baidu.com/api?v=2.0&ak=SOD0GtUP8nPyhnFNZ5T5KVKxVb26S1Tc&s=1"></script>
    <script src="../js/address.js"></script>
    <script src="//api.map.baidu.com/api?type=webgl&v=1.0&ak=SOD0GtUP8nPyhnFNZ5T5KVKxVb26S1Tc"></script>
    <script>
        (function() {
            let html = document.documentElement;
            let width = html.getBoundingClientRect().width;
            html.style.fontSize = width / 20 + 'px';
        })();
    </script>


</head>

<body>
    <nav class="area-nav">
        <div class="m-container">
            <span class="back" id="back">
                <</span> <span class="select">选择城市
            </span>
        </div>
    </nav>

    <div class="m-container">
        <div class="m-select">
            <h3>当前选择城市</h3>
            <ul class="m-select-list">
                <li class="active area-add">{{$b}}</li>
            </ul>
        </div>
        <div class="m-select">
            <h3>定位城市</h3>
            <div class="m-sx">
                <ul class="m-select-list">
                    <li class="area-add">南昌</li>
                </ul>
                <div class="m-se" id="ms">
                    <img src="../image/m/sx.png">
                    <span class="cx">重新定位</span>
                </div>
            </div>


        </div>
        <div class="m-select">
            <h3>全部城市</h3>
            <ul class="m-select-list">
                @foreach ($data as $v)

                <li> <a href="/city/<?php echo ($v['domain']); ?>">{{$v['name']}}</a></li>

                @endforeach
            </ul>
        </div>



    </div>


    <script>
        //定位
        // autoLocation(function(e) {
        //     $(" .area-add").text(e.address.city)
        // });
        $("#ms").click(function() {
            autoLocation(function(e) {
                $(".area-add").text(e.address.city)
            })
        });
        $("#back").click(function() {
            window.history.back();
        })
    </script>
</body>

</html>