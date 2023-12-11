<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- services와 clusterer, drawing 라이브러리 불러오기 -->
        <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6bb7c3f885ecef14bec3711a39c2c9fa&libraries=services,clusterer,drawing"></script>
    </head>
    <body>
        <div id="map" style="width:100%;height:400px;"></div>
        <button onclick="Map.myLocation()">현위치</button>
    </body>
    <script>
        const Map = {
            init: () => {
                let container = document.querySelector("#map");
                let options = {
                    center: new kakao.maps.LatLng(33.450701, 126.570667),
                    level: 3
                };
                let map = new kakao.maps.Map(container, options);

                let zoomControl = new kakao.maps.ZoomControl();
                map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
                
                return map;
            },
            myLocation: () => {
                if (navigator.geolocation) {
                    // GeoLocation을 이용해서 접속 위치를 얻어옵니다
                    navigator.geolocation.getCurrentPosition((position) => {
                        let lat = position.coords.latitude; // 위도
                        let lon = position.coords.longitude; // 경도
                        let locPosition = new kakao.maps.LatLng(lat, lon); // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
                        
                        Map.displayMarker(locPosition);
                    });
                }
            },
            displayMarker: (locPosition) => {
                // 마커를 생성합니다
                let marker = new kakao.maps.Marker({
                    map: map,
                    position: locPosition
                });

                // 지도 중심좌표를 접속위치로 변경합니다
                map.setCenter(locPosition);
            },
        };
        const map = Map.init();
        Map.myLocation();
    </script>
</html>
<!-- 35.09433743513286, 125.72601571291361 -->

<!-- http://data.seoul.go.kr/dataList/OA-16037/S/1/datasetView.do -->
<!-- 서울시 공공데이터 API 인증키: 4e4c715850616b693235634d506a52 -->
<!-- http://openapi.seoul.go.kr:8088/4e4c715850616b693235634d506a52/json/LOCALDATA_030901/1/5/ -->
