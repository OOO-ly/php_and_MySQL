<?php
set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
session_start();
include "../model/mysql_conn.php";
include "../control/new_article_preview.php"; 
include "../control/read_article.php"; 


$title = "뛰놀자 튜토리얼";

// $_SESSION['user_id'] ='hello';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/nav.css">
    <script src="../js/include-html.js"></script>
    <title><?=$title?></title>
</head>

<body>

    <nav include-html="../view/nav.php"></nav>

    <div class="content-container">
        <article>
            <?php 
            //게시판 이름이 있다면
            if(isset($_GET['board_name'])){ 
                //게시판이름이 topic ( 공지사항 ) 이라면
                if($_GET['board_name'] == "topic"){
                    echo '<h1>공지사항</h1>';
                    // 게시글 id가 있다면 게시글 출력 
                    if(isset($_GET['id'])){ read_article($conn, $_GET['board_name'],$_GET['id']); } 
                    //게시글 id가 없다면 게시글 리스트    
                    else{new_article_create($conn,$_GET['board_name'],20);}               
                }
                //게시판이름이 topic2 ( Q&A ) 라면
                elseif($_GET['board_name'] == "topic2"){
                    echo '<h1>Q & A</h1>';
                    // 게시글 출력 코드 분리 필요
                    //게시글 id가 있다면 게시글 출력
                    if(isset($_GET['id'])){read_article($conn, $_GET['board_name'],$_GET['id']);}
                    //게시글 id가 없다면 게시글 리스트  
                    else{new_article_create($conn,$_GET['board_name'],20);}                         
                }
                //게시판 접근 도메인이 잘못됐다면 
                else{ echo '<p>잘못된 접근입니다.</p>'; }
            //게시판 메뉴 도메인이 없다면
            }
            else{ echo '<p>잘못된 접근입니다.</p>'; } 
            ?>  
        </article>
    </div>
   
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>

</body>
<script>
includeHTML()
</script>
</html>