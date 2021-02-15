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

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, amet nisi enim nemo iste doloribus fugiat, asperiores laudantium veniam recusandae, illo maiores sequi at? Quis harum autem quo tenetur in.</p>

        <article>
        <p><h2>공지사항</h2></p>    
        <?php new_article_create($conn,"topic"); ?>
        <p><h2>Q & A</h2></p>
      <?php new_article_create($conn,"topic2"); ?></article>

    </div>
    

</body>
<script>includeHTML()</script>
</html>