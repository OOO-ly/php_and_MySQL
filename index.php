<?php
set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL;");
session_start();
include "./model/mysql_conn.php";
include "./control/new_article_preview.php"; 



$title = "뛰놀자 튜토리얼";

// $_SESSION['user_id'] ='hello';https://www.hyundai.com/worldwide/ko/ioniq/ioniq5

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style/nav.css">
    <script src="../js/include-html.js"></script>
    
    
</head>

<body>
  

    <nav include-html="./view/nav.php"></nav>
    
    <div class="content-container">

        <article>
        <p><h2>공지사항</h2></p>    
        <?php new_article_create($conn,"topic"); ?>
        <p><h2>Q & A</h2></p>
        <?php new_article_create($conn,"topic2"); ?></article>

    </div>
    
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>

</body>
<script>includeHTML()</script>
</html>