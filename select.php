<?php

include 'mysql_conn.php';
//데이터 증가로 인한 로드시 부하를 최소화 하기위해 LIMIT # 사용을 권장  

// 1 row
echo "<h1>Single row</h1>";
$sql = "SELECT * FROM topic WHERE id=6"; 
$result = mysqli_query($conn,$sql);
var_dump($result); // mysqli_query 반환 값 중 num_row는 출력값의 행의 개수를 의미
$row = mysqli_fetch_array($result);
//print_r($row);
//echo $row['title'];
echo '<h2>'.$row['title'].'</h1>';
echo '<p>'.$row['description'].'</p><hr>';

// all row
echo "<h1>Multi row</h1>";
$sql = "SELECT * FROM topic"; 
$result = mysqli_query($conn,$sql);

// $row = mysqli_fetch_array($result);
// echo '<h1>'.$row['title'].'</h1>';
// echo '<p>'.$row['description'].'</p>';

while($row = mysqli_fetch_array($result)){
    echo '<h1>'.$row['title'].'</h1>';
    echo '<p>'.$row['description'].'</p>';
}







?>

