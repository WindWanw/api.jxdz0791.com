function autoLocation(cb) {
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition((r) => {
        //定位结果对象会传递给r变量
        cb(r)
        //   var map = new BMapGL.Map('container'); // 创建Map实例
        //   map.centerAndZoom(r.address.city, 12); // 初始化地图,设置中心点坐标和地图级别
        //   map.enableScrollWheelZoom(true); // 开启鼠标滚轮缩放
        //   map.addEventListener('click', function (e) {
        //      // e.latlng.lng  + e.latlng.lat
        //   });
    });
}