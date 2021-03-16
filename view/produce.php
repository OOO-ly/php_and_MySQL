<?php
// set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
session_start();
include "../model/mysql_conn.php";

$title = "뛰놀자 튜토리얼";
define ("__rootpath","",false);

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

 
    <!-- text-align centen 
    position righr -->
        <div class="produce_content">
            
        
            <div class="produce_text">
                    <p>안녕하세요
                        <?php if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id'].' 님';}else{ echo '방문객 님'; }?> 
                    </p>
                    <p>php 로 web tutorial 진행중인 O3 입니다.</p>     
            </div>      
                <img src="../media/profile.png" alt="intern_profile_img">   
        </div>
  
        <div class="produce_content">


        <div class="produce_text">
                <p>이 프로젝트는</p>
                <p> 에이앤디플랫폼 , 뛰놀자, 제주더큰내일센터에서 도와주고 계십니다</p>
            </div>
            <div class="produce_img_group">
                <img src="../media\ANDplatform_logo.png" alt="sponcer_img" class="produce_img" >
                <img src="../media\ttinolja_logo.png" class="produce_img" >
                <img src="../media\logo.png" class="produce_img" >
            </div>
    
            
        </div>
    </div>
   
    <footer>
        Copyright © 2021 by # . All right reserved.
        <p>spacial thanks : 
        General Manager / Deajeon Kang ,
        Development team leader /  Jeachan Ko</p>
    </footer>

</body>
</html>