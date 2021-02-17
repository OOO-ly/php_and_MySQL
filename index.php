<?php
set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL;");
session_start();
include "./model/mysql_conn.php";
include "./control/new_article_preview.php"; 





$title = "뛰놀자 튜토리얼";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style/nav.css">


</head>

<body>


    <?php include_once './view/nav.php'; ?>

    <div class="content-container">

       

        <p><?php 
        if(isset($_SESSION['user_id'])){
            echo $_SESSION['user_id'].' 님 안녕하세요'; 
            
        }
        else{
            if(isset($_SESSION['flag']) && ($_SESSION['flag'] == 'failed_sign')){
                echo "<script>alert('실패 실패! 로그인 실패!');</script>";
                $_SESSION['flag'] ='';
            }
    
        }
        ?></p>

        <article>
            <p>
            <h2>공지사항</h2>

            </p>
            <?php new_article_create($conn,"topic"); ?>
            <p>
            <h2>Q & A</h2>
            </p>
            <?php new_article_create($conn,"topic2"); ?>
        </article>

    </div>
    <?php include './view/modal.php'; ?>
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>
    <script src="../js/modal.js"></script>
    <script src="../js/sign_in.js"></script>
</body>

</html>