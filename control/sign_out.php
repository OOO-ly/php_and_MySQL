
<?php

session_start();
session_destroy();


// die(var_dump($_SERVER['HTTP_REFERER']));

// 변수에 이전페이지 정보를 저장
$prevPage =$_SERVER['HTTP_REFERER'];
// header('location:'.$prevPage);
header('location: ../index.php' );
// 페이지 이동


?>