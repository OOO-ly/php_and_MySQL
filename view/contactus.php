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
		<div class="map-control">
		

		
		</div>
	
			<div id="map" class="map1" >
				<script>
					
				var container = document.getElementById('map');
				var geocoder = new kakao.maps.services.Geocoder();
				geocoder.addressSearch('제주특별자치도 제주시 오라동 1770', function(result, status) {
					if (status === kakao.maps.services.Status.OK) {
					//좌표를 주수 기준으로 받아옴 Lat ,Lng  순서
							var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
							
							//받아온 좌표를 center로 확대 수준은 2 키보드단축키 옵션 켬
							var options = {
							center: coords,
							level: 2,
							keyboardShortcuts: true,
							};
						
							var imageSrc = '../media/profile.png', // 마커이미지의 주소입니다    
							imageSize = new kakao.maps.Size(64, 69), // 마커이미지의 크기입니다

							imageOption = {
							offset: new kakao.maps.Point(33, 126)
							}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

							// 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
							var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption),
							markerPosition = new kakao.maps.LatLng(result[0].y, result[0].x); // 마커가 표시될 위치입니다

							var marker = new kakao.maps.Marker({
							position : markerPosition,
							image: markerImage}); // 마커이미지 설정 


							var map = new kakao.maps.Map(container, options);
							// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
							var mapTypeControl = new kakao.maps.MapTypeControl();
							// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
							// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
							map.addControl(mapTypeControl, kakao.maps.ControlPosition.BOTTOMRIGHT);
							var zoomControl = new kakao.maps.ZoomControl();
							map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);		
						}
					}
				);
				
			
				</script>
			</div>
		</div>
		
	

        <hr>
		<form action="/" method="post">
		<input type="button" value="에이엔디플랫폼" onclick=" set_andplatform(); ">
		<input type="button" value="더큰내일센터" onclick=" set_thek(); ">
		<input type="button" value="좌표 출력" onclick=" getposition(); ">
		<p id="pointt">????</p>
		</form>
    </div>




    <script>
	

		let postion = new kakao.maps.LatLng(123,456);
	
		
		
	


		// 	var imageSrc = '../media/profile.png', // 마커이미지의 주소입니다    
		// 		imageSize = new kakao.maps.Size(64, 69), // 마커이미지의 크기입니다
		// 		imageOption = {
		// 			offset: new kakao.maps.Point(27, 90)
		// 		}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

		// 	// 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
		// 	var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption),
		// 		markerPosition = new kakao.maps.LatLng(37.54699, 127.09598); // 마커가 표시될 위치입니다

		// 	// 마커를 생성합니다
		// 	var marker = new kakao.maps.Marker({
		// 		position: markerPosition,
		// 		image: markerImage // 마커이미지 설정 
		// 	});

			




			let set_andplatform = () => {

				var geocoder = new kakao.maps.services.Geocoder();

				geocoder.addressSearch('제주특별자치도 제주시 도남동 693-1 3층', function(result, status) {

				// 정상적으로 검색이 완료됐으면 
				if (status === kakao.maps.services.Status.OK) {

					var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

					// 결과값으로 받은 위치를 마커로 표시합니다
					var marker = new kakao.maps.Marker({
						map: map,
						position: coords
					});

					// 인포윈도우로 장소에 대한 설명을 표시합니다
					var infowindow = new kakao.maps.InfoWindow({
						content: '<div style="width:150px;text-align:center;padding:6px 0;">에이엔디플랫폼</div>'
					});
					infowindow.open(map, marker);

					// 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
					map.panTo(coords);
				} 
				});    
			}

		// 	let set_thek = () => {
				
		// 		var geocoder = new kakao.maps.services.Geocoder();

		// 		geocoder.addressSearch('제주특별자치도 제주시 오라동 1770', function(result, status) {

		// 		// 정상적으로 검색이 완료됐으면 
		// 		if (status === kakao.maps.services.Status.OK) {

		// 			var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

		// 			// 결과값으로 받은 위치를 마커로 표시합니다
		// 			var marker = new kakao.maps.Marker({
		// 				map: map,
		// 				position: coords
		// 			});

		// 			// 인포윈도우로 장소에 대한 설명을 표시합니다
		// 			var infowindow = new kakao.maps.InfoWindow({
		// 				content: '<div style="width:150px;text-align:center;padding:6px 0;">제주더큰내일센터</div>'
		// 			});
		// 			infowindow.open(map, marker);

		// 			// 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
		// 			map.panTo(coords);
		// 		} 
		// 		});    
		// 	}

			let getposition = () => {
			let postion = new kakao.maps.getCenter();
			var asdasd= postion.getLat();
			var zxczxc= postion.getLng();
			marker.setPosition(postion);
			
			}
			// 마커가 지도 위에 표시되도록 설정합니다
			// marker.setMap(map);
    </script>



    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>

</body>

</html>