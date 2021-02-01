<?php

$conn = mysqli_connect("localhost","root","12341234","tnj_tutorial");

//데이터 증가로 인한 로드시 부하를 최소화 하기위해 LIMIT # 사용을 권장  
$sql = "SELECT * FROM topic"; 
$result = mysqli_query($conn,$sql);
//var_dump($result->num_rows); // mysqli_query 반환 값 중 num_row는 출력값의 행의 개수를 의미


?>