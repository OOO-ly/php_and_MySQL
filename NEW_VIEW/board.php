<?php
set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
session_start();
include "../data/mysql_conn.php";
include "../new_article_preview.php"; 
include "../read_article.php"; 


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
    <script src="../include-html.js"></script>
    <title>Document</title>
</head>

<body>

    <nav include-html="../view/nav.php"></nav>

    <div class="content-container">
        <article>
            <?php 
            //게시판 이름이 있다면
            if(isset($_GET['board_name'])){ 
                //게시판이름이 topic 이라면
                if($_GET['board_name'] == "topic"){ ?>
                <h2>공지사항</h2>
                <!-- 게시글 id가 있다면 게시글 출력 -->
                <?php if(isset($_GET['id'])){ 
                        $article = read_article($conn, $_GET['board_name'],$_GET['id']);?>
                        <p><?= $article['title'] ?></p>
                        <p><?= $article['description'] ?></p>
                        <P><?= $article['name'] ?> </P>  
                        <?php } 
                    //게시글 id가 없다면 게시글 리스트    
                    else{?>
                    
                    <?= new_article_create($conn,$_GET['board_name'],20); ?>
                    <?php }               
                    }
                //게시판이름이 topic 이라면
                elseif($_GET['board_name'] == "topic2"){ ?>
                <h2>Q & A</h2>
                        <!-- //게시글 id가 있다면 게시글 출력 -->
                        <?php if(isset($_GET['id'])){ ?>
                        $article = read_article($conn, $_GET['board_name'],$_GET['id']);?>
                        <p><?= $article['title'] ?></p>
                        <p><?= $article['description'] ?></p>
                        <P><?= $article['name'] ?> </P>  
                        <?php } 
                    //게시글 id가 없다면 게시글 리스트  
                    else{?> 
                        <?= new_article_create($conn,$_GET['board_name'],20); ?>
                    <?php }
                    //게시판 이름이 잘못됐다면                  
                }else{ ?>
                    <p>잘못된 접근입니다.</p>
                <?php }
                //게시판 이름이 없다면
            }else{ ?>
                    <p>잘못된 접근입니다.</p>
            <?php } ?>  
        </article>
    </div>

</body>
<script>
includeHTML()
</script>
</html>