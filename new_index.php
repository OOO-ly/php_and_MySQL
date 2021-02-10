<?php

$title = "tnj_tutorial"

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./style/nav.css">
    <link rel="stylesheet" href="./style/dropdown.css">
</head>

<body>

   
    <nav>
        <ul class="nav-container">
            <a class="nav-logo" href="./new_index.php">
                <img src="./media/profile.png" alt="nav_logo" >
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
                        <li><a href="index.php">topic1</a></li>
                        <li><a href="topic2">topic2</a></li>
                    </ul>
                </div>  

            </li>
            <li class="nav_item"><a href="./contactus.php" class="contact_">고객지원</a></li>
            <div class="login_box">
                <li class="nav_item"><a href="" class="sign_">로그인</a></li>
                <li class="nav_item"><a href="" class="sign_up">회원가입</a></li>
                <li class="nav_item"><a href="#" class="sign_">회원정보</a></li>
            </div>
        </ul>
    </nav>


 




    <div class="content-container">
 
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, amet nisi enim nemo iste doloribus fugiat, asperiores laudantium veniam recusandae, illo maiores sequi at? Quis harum autem quo tenetur in.</p>

    </div>
</body>

</html>