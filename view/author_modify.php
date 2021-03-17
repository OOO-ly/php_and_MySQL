<?php
// set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
session_start();
include "../model/mysql_conn.php";

$title = "뛰놀자 튜토리얼";
define ("__rootpath","",false);

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

    <?php 
	include_once '../view/nav.php'; 
    
    ?>
    <div class="content-container">

        
                <article>
                 <?php
                $sql = "SELECT id, name,profile,member_lv From author where name = '{$_SESSION['user_id']}'";
                $result = mysqli_query($conn, $sql);
                $author = mysqli_fetch_array($result); ?>

                <div class="member_info_form">
                <h3>회원 정보</h3>
                    <form class="member_info_form " action="<?= __rootpath ?>/control/author_modify.php" method="POST">
                                <input type="hidden" name="id" value="<?= $author['id'] ?>">
                            <p>
                                <label  for="member_info_id">회원 아이디</label>
                                <input type="text" id="member_info_id" name="user_id" pattern="^([a-z0-9_]){3,20}$"  value="<?=$_SESSION['user_id']?>" autocomplete="off" required> 
                            </p>
                            <p>
                                <label for="member_info_pw"> 회원 비밀번호</label>
                                <input type="password" id="member_info_pw" name="user_pw" required>
                            </p>
                            <p>
                                <label for="member_info_profile"> 회원 프로필</label>
                                <input type="textarea" id="member_info_profile" name="user_profile"
                                autocomplete="off" value="<?=$author['profile']?>">
                            </p>
                            <p>
                                <label for="member_info_lv"> 회원 레벨</label>
                                <select name="member_info_lv" id="">
                                    <option value="1">member</option>
                                    <option value="2" selected="selected">root</option>
                                </select>
                            <button id="member_info__bt"> 회원 정보 수정 완료 </button>
                    </form>
                </div>
                </article>
    </div>
   
    <footer>
        Copyright © 2021 by # . All right reserved.
        <p>spacial thanks : 
        General Manager / Deajeon Kang ,
        Development team leader /  Jeachan Ko</p>
    </footer>

</body>
</html>