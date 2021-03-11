<?php
// set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
session_start();
include "../model/mysql_conn.php";

$title = "뛰놀자 튜토리얼";
define ("__rootpath","/test_final",true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/nav.css">
    <title><?=$title?></title> 
</head>
<body>

    <?php 
	include_once '../view/nav.php'; ?>
    <div class="content-container">


    <h1></h1>
    <img src="../media/profile.png" alt="intern_profile_img">
    <!-- text-align centen 
    position righr -->
    <p>안녕하세요
    <?php if(isset($_SESSION['user_id'])){

        echo $_SESSION['user_id'].' 님';

    }
    else{
        echo '방문객 님';
    }
    ?> 
    </p>
    <p>php MySQL로 web tutorial 진행중인 O3 입니다.</p>
    <p>현재 보고 계신 페이지는 되도록 하드코딩으로 제작된 페이지로
        다소 가독성이 떨어짐을 양해 말씀드립니다.</p>

    
    <img src="../media/profile.png" alt="sponcer_img">
    <!-- 뛰놀자 CI + 제주 더큰 내일 센터 CI -->
    <p>이 프로젝트는 에이앤디플랫폼 , 뛰놀자, 제주더큰내일센터에서 도와주고 계십니다</p>


    </div>
   
    <footer>
        Copyright © 2021 by # . All right reserved.
        <p>spacial thanks : 
        General Manager / Deajeon Kang ,
        Development team leader /  Jeachan Ko</p>
    </footer>

</body>
</html>