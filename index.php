<?php
session_start();

// //goorm test_final path
define ("__rootpath","",false);
include "model/mysql_conn.php";
include "control/new_article_preview.php"; 
include "control/title_con.php";
// 기존 권한의 경우 guset로 접근할 수 있는 것을 제한하고
// admin은 하나의 계정으로 접근할 수 있도록 하고
// member 라는 계정을 만들어 접근을 제한해야함
// 스마트에디터 api를 활용할 수있는지 확인해야함
// 현재 위치를 가져오는 기능 구현
// 현재 위치를 기준으로 원하는 위치의 거리 재는 기능 추가 
// 현재 구현중인 브랜치에서 main과 머지하는 작업이 필요



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style/nav.css">

    
</head>

<body>



    <?php 
    include_once 'view/nav.php'; 
     ?>
    <div class="content-container">
	
        <article>
            <?php 
            new_article_create($conn,"topic",5); 
            ?>
            <?php 
            new_article_create($conn,"topic2",5); 
            ?>
        </article>

    </div>
    
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>
    
</body>
</html>