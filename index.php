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
    

</head>

<body>


    <?php include_once './view/nav.php'; ?>

    <div class="content-container">

    
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
    <div class="modal hidden">
            <div class="modal_overlay">
            </div>
            <div class="modal__content">
                <h3>로그인</h3>
                <form class="login_form" action="#" method="POST">
                        <p class="login_label">
                        <label for="login_id_input">아이디</label>
                        <input type="text" id="login_id_input" name="name" pattern="^([a-z0-9_]){3,20}$" required></p>
                        <p class="login_label"><label for="delete_pw_input">비밀번호</label>
                        <input type="password" id="delete_pw_input" name="password"required></p>
                        <button> 로그인 </button>
                </form>
            </div>
        </div>
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>
    <script src="../js/modal.js"></script>
</body>

</html>