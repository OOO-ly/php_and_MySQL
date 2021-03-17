<?php
// set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
define ("__rootpath","",false);
session_start();
include "../model/mysql_conn.php";
include "../control/new_article_preview.php"; 
include "../control/read_article.php"; 
include "../control/borad_control_flag.php";
include "../control/title_con.php";

header("Cache-Control: no-cache");



if(!isset($_POST['control_flag'])){
    $_POST['control_flag'] = 'list';
}

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

    <?php include '../view/nav.php'; ?>

  

    <div class="content-container">
        


        <article>
             
            <?php 
                //게시글 id 가 경로로 확인
                //게시판 이름 유효성 검사는 안에서 함
                isset($_POST['article_id']) ? 
                //게시글 id가 경로에 있다면 게시글 read로 
                board_control( $conn, $_GET['board_name'], $_POST['control_flag'], $_POST['article_id']):
                //게시글 id가 없다면 id NULL로
                board_control( $conn, $_GET['board_name'], $_POST['control_flag']);

            ?>    
        </article>
        

        <?php include "bt_group.php" ?>

        

            
     </div>
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>
</body>
</html>
    
