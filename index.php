<?php
// set_include_path(" /php_and_MySQL;");
session_start();

define ("__rootpath","/test_final",true);
include __DIR__."/model/mysql_conn.php";
include __DIR__."/control/new_article_preview.php"; 
include __DIR__."/control/title_con.php";





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= __rootpath ?>/style/nav.css">


</head>

<body>



    <?php include_once __DIR__.'/view/nav.php'; ?>

    <div class="content-container">

        <article>
            <?php 
			new_article_create($conn,"topic",5); ?>
            <?php new_article_create($conn,"topic2",5); ?>
        </article>

    </div>
    
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>
    
</body>
<script src="<?= __rootpath ?>/js/modal.js"></script>
</html>