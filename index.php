<?php
session_start();
include "./data/mysql_conn.php";
include "./new_article_preview.php"; 



$title = "뛰놀자 튜토리얼";

// $_SESSION['user_id'] ='hello';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style/nav.css">
    <script src="../include-html.js"></script>
    
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