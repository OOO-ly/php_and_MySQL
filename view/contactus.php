<?php
// set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL;");
session_start();
include "../model/mysql_conn.php";
include "../control/new_article_preview.php"; 
include "../control/title_con.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript"
        src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e1797eea2b561ca1b614608595bdf04b&libraries=services,clusterer,drawing">
    </script>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style/nav.css">


</head>

<body>




    <?php include_once '../view/nav.php'; ?>
	
	

    <div class="content-container">

		<div class="map-container">

		<form action="/" method="post">
		<div class="map-control">
		<input type="button" value="에이엔디플랫폼">
		<input type="button" value="더큰내일센터">
		<input type="button" value="좌표 출력">

		</form>

		<p id="pointt">????</p>
		</div>
	
			<div id="map" class="map1" >
				<script>
				var container = document.getElementById('map');
				var options = {
					center: new kakao.maps.LatLng(37.54699, 127.09598),
					level: 2,
					keyboardShortcuts: true,

				};
				var map = new kakao.maps.Map(container, options);
				// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
				var mapTypeControl = new kakao.maps.MapTypeControl();
				// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
				// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
				map.addControl(mapTypeControl, kakao.maps.ControlPosition.BOTTOMRIGHT);
				var zoomControl = new kakao.maps.ZoomControl();
				map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
				</script>
			</div>
		</div>
		
	

        <hr>
       
    </div>




    <script>
	

		// let postion = new kakao.maps.LatLng(123,456);
		let postion = map.getCenter();
		var asdasd= postion.getLat();
		var zxczxc= postion.getLng();
		document.getElementById("pointt").textContent = asdasd +","+zxczxc;
	


    var imageSrc = '../media/profile.png', // 마커이미지의 주소입니다    
        imageSize = new kakao.maps.Size(64, 69), // 마커이미지의 크기입니다
        imageOption = {
            offset: new kakao.maps.Point(27, 90)
        }; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

    // 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
    var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption),
        markerPosition = new kakao.maps.LatLng(37.54699, 127.09598); // 마커가 표시될 위치입니다

    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        position: markerPosition,
        image: markerImage // 마커이미지 설정 
    });

    // 마커가 지도 위에 표시되도록 설정합니다
    marker.setMap(map);
    </script>



    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>

</body>

</html>