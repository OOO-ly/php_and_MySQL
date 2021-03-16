<?php
// set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL;");
session_start();
include "../model/mysql_conn.php";
include "../control/new_article_preview.php"; 
include "../control/title_con.php";

define ("__rootpath","",false);

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


		<article>
				<div class="map-container"></div>
			
					<div id="map" class="map1" >
						<script>
							
						//어떤 노드에 추가할지 id 가져옴
						var container = document.getElementById('map');


						// 기본 맵 정보 가져오기
						var options = {
							center: new kakao.maps.LatLng(33.48155552342617, 126.50896084853338),
							level: 2,
							keyboardShortcuts: true,

						};

						//맵 동적 생성
						var map = new kakao.maps.Map(container, options);

						

						//마커 설정
						var marker = new kakao.maps.Marker({
						map: map,
						position: new kakao.maps.LatLng(33.48155552342617, 126.50896084853338)
						});

						//인포윈도우 출력
						var infowindow = new kakao.maps.InfoWindow({
							content: '<div style="width:150px;text-align:center;padding:6px 0;">제주더큰내일센터</div>'
						});
						infowindow.open(map, marker);
						
					

						// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
						// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
						var mapTypeControl = new kakao.maps.MapTypeControl();
						map.addControl(mapTypeControl, kakao.maps.ControlPosition.BOTTOMRIGHT);

						// 줌 컨트롤 오른쪽 상단에 추가
						var zoomControl = new kakao.maps.ZoomControl();
						map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
						</script>
					</div>
				</div>

				<!-- 좌표 출력부  -->
				<p id="pointt"></p>

				<hr>
				<!-- 버튼  -->
				<form action="/" method="post">
				<div class="map-control">
				<input type="button" value="에이엔디플랫폼" onclick="set_andplatform();">
				<input type="button" value="더큰내일센터" onclick="set_thekunnaeil();">
				<input type="button" value="좌표 출력" onclick="getposition();">

				</form>
		</article>
		

    </div>




    <script>
	
		// 좌표 가져오기

	let postion = map.getCenter();
	var asdasd= postion.getLat();
	var zxczxc= postion.getLng();


	// 에이엔디플랫폼 으로 맵 설정 및 이동
	let set_andplatform = () => {

		//검색 서비스 시작
		var geocoder = new kakao.maps.services.Geocoder();

		//주소 검색 시작 문자열은 입력도 가능할 것으로 보임
		geocoder.addressSearch('제주특별자치도 제주시 도남동 693-1 3층', function(result, status) {

		// 정상적으로 검색이 완료됐으면 
		if (status === kakao.maps.services.Status.OK) {

				//result 에 저장된 y , x 를 위도경도에 저장해 좌표를 동적 생성
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

	let set_thekunnaeil = () => {

		var geocoder = new kakao.maps.services.Geocoder();

		geocoder.addressSearch('제주특별자치도 제주시 오라동 1770', function(result, status) {

		// 정상적으로 검색이 완료됐으면 
		if (status === kakao.maps.services.Status.OK) {

				var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

				// 결과값으로 받은 위치를 마커로 표시합니다
				// var marker = new kakao.maps.Marker({
				// 	map: map,
				// 	position: coords
				// });

				// // 인포윈도우로 장소에 대한 설명을 표시합니다
				// var infowindow = new kakao.maps.InfoWindow({
				// 	content: '<div style="width:150px;text-align:center;padding:6px 0;">제주더큰내일센터 :)</div>'
				// });
				// infowindow.open(map, marker);

				// 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
				map.panTo(coords);
			} 
			});    
		}



	let getposition = () => {

		
		// 좌표 출력하기
		document.getElementById("pointt").textContent = "위도 : "+asdasd +" , 경도 : "+zxczxc;
		
		// 마커 전부 표시
		showMarkers();


	}

    

	// 클릭하면 마커르 추가함
	kakao.maps.event.addListener(map,'click', function(mouseEvent){
		//클릭한 위치에 마커를 표시합니다 
		addMarker(mouseEvent.latLng);
	})

	//마커 배열
	let markers = [];
	

	function addMarker(position){
		// 마커 이미지 설정
		var imageSrc = '../media/profile.png', // 마커이미지의 주소입니다    
		imageSize = new kakao.maps.Size(64, 69), // 마커이미지의 크기입니다
		imageOption = {
			offset: new kakao.maps.Point(27, 60)
		}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

		// 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
		var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);
					
		// 마커 최종 설정
		var marker = new kakao.maps.Marker({
			image : markerImage,
			position: position,
			// title : "마커 ",
			clickable : true,
			draggable: true
			});

		//마커를 클릭하면 마커가 사라집니다.
		kakao.maps.event.addListener(marker, 'click', function() { hideMarkers(); });

		
		// 생성된 마커를 배열에 추가합니다
		markers.push(marker);
		// 마커 map에 반여
		marker.setMap(map);

		

		
				
	}

	// 배열에 추가된 마커들을 지도에 표시하거나 삭제하는 함수입니다
	function setMarkers(map) {
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}            
	}

	// "마커 보이기" 버튼을 클릭하면 호출되어 배열에 추가된 마커를 지도에 표시하는 함수입니다
	function showMarkers() {
		setMarkers(map)    
	}

	// "마커 감추기" 버튼을 클릭하면 호출되어 배열에 추가된 마커를 지도에서 삭제하는 함수입니다
	function hideMarkers() {
		setMarkers(null);    
	}


	
	</script>



    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>

</body>
</html>