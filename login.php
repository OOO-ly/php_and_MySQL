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
        <form action="process_login.php" method="post">
        <label for="input_id">아이디</label>
        <p><input type="text" name="user_id" id="input_id"></p>
        <label for="input_pw">비밀번호</label>
        <p><input type="password" name="user_pw" id="input_pw"></p>
        <input type="submit" value="로그인">
        </form>
<?php
        }
    else{
?>
        <script> alert("로그인 성공")</script>
        <?=$_SESSION['user_id']?>님 로그인되었습니다.
       <form action="logout.php">
       <input type="submit" value="로그아웃">
       </form>
<?php
        }
?>   
</body>
</html>