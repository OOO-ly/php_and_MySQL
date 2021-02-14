<?php
include "./data/mysql_conn.php";

session_start();


$title = "tnj_tutorial";

// $_SESSION['user_id'] ='hello';

if(isset($_SESSION['user_id'])){
    $sql = "select id
    from author
    where name=\"{$_SESSION['user_id']}\"";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../style/nav.css">
    <link rel="stylesheet" href="../style/dropdown.css">
</head>

<body>

    <p>asd???</p>
    <nav>
        <ul class="nav-container">
            <a class="nav-logo" href="../new_index.php">
                <img src="./media/profile.png" alt="nav_logo">
            </a>
            <li class="nav_item"><a href="./produce.php" class="produce_">회사소개</a></li>
            <!-- <li class="nav_item dropdown"><a href="./comunity.php" class="coumunity_">커뮤니티</a> -->
            <li class="nav_item dropdown">커뮤니티

                <!-- <ul>
                        <li><a href="topic" class="dropdown-content">topic1</a></li>
                        <li><a href="topic2" class="dropdown-content">topic</a></li>
            </ul> -->
                <div class="dropdown-content">
                    <ul>
                        <li><a href="../index.php">topic1</a></li>
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
                    <li class="nav_item"><a href="./view/author.php?id=<?= $row[0] ?>" class="sign_">회원정보</a></li>
                    <li class="nav_item"><a href="./view/logout.php" class="sign_">로그아웃</a></li>
                <?php } ?>
            </div>
        </ul>
    </nav>





    <div class="content-container">

                   
   
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, amet nisi enim nemo iste doloribus fugiat, asperiores laudantium veniam recusandae, illo maiores sequi at? Quis harum autem quo tenetur in.</p>
    <?php include_once "./new_article_preview.php"; ?>
  
    <style>
        .column_title{
            text-align: center;

        }
        .topic_content{
            text-align: center;
        }
        .topic_table{
            padding-top: 50px;
            display: flex;
            /* display: block; */
            justify-content: flex-end;

        }
    </style>

        <?php 
        // include_once 
    // "./new_article_preview.php";
    ?>

  

    </div>

</body>

</html>