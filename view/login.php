<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/login.css"/>
    <link rel="stylesheet" href="../style/nav.css">  
    <link rel="stylesheet" href="../style/dropdown.css">
</head>

<body>


    <nav>
        <ul class="nav-container">
            <a class="nav-logo" href="./new_index.php">
                <img src="../media/profile.png" alt="nav_logo">
            </a>
            <li class="nav_item"><a href="../produce.php" class="produce_">회사소개</a></li>
            <!-- <li class="nav_item dropdown"><a href="./comunity.php" class="coumunity_">커뮤니티</a> -->
            <li class="nav_item dropdown">커뮤니티

                <!-- <ul>
                        <li><a href="topic" class="dropdown-content">topic1</a></li>
                        <li><a href="topic2" class="dropdown-content">topic</a></li>
                </ul> -->
                <div class="dropdown-content">
                    <ul>
                        <li><a href="index.php">topic1</a></li>
                        <li><a href="topic2">topic2</a></li>
                    </ul>
                </div>

            </li>
            <li class="nav_item"><a href="../contactus.php" class="contact_">고객지원</a></li>
            <div class="login_box">
                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <li class="nav_item"><a href="../view/login.php" class="sign_">로그인</a></li>
                    <li class="nav_item"><a href="" class="sign_up">회원가입</a></li>
                <?php } else { ?>
                    <li class="nav_item"><a href="../view/author.php?id=<?= $row[0] ?>" class="sign_">회원정보</a></li>
                <?php } ?>
            </div>
        </ul>
    </nav>
<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
?>
<style>

#login_form{
    padding-top: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

</style>
        <form id="login_form" action="../process/process_login.php" method="post">
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
       <form action="../process/logout.php">
       <input type="submit" value="로그아웃">
       </form>
<?php
        }
?>   
</body>
</html>