<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
?>
        <form action="process_login.php">
        <input type="text" name="user_id">
        <input type="submit" value="로그인">
        </form>
<?php
        }
    else{
?>
        <script> alert("성공")</script>
        <?=$_SESSION['user_id']?>님 로그인되었습니다.
       <form action="logout.php">
       <input type="submit" value="로그아웃">
       </form>
<?php
        }
?>   
</body>
</html>