<?php
set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
session_start();
include"../model/mysql_conn.php";
include"../control/new_article_preview.php"; 
include"../control/read_article.php"; 
include"../control/title_con.php";



// $_SESSION['user_id'] ='hello';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/nav.css">
    <script src="../js/getcontent.js"></script>
    <title><?=$title?></title>
</head>

<body>

    <?php include_once '../view/nav.php'; ?>
  

    <div class="content-container">
        <p><?php 
        if(isset($_SESSION['flag'])){
            if($_SESSION['flag'] == 'failed_sign'){
                echo "<script>alert('실패 실패! 로그인 실패!');</script>";
                $_SESSION['flag'] ='';
            }
            else if($_SESSION['flag'] == 'failed_sign_up_1062'){
                echo "<script>alert('중복 아이디입니다!');</script>";
                $_SESSION['flag'] ='';
            }
            else if($_SESSION['flag'] == 'sign_up_succeed'){
                echo "<script>alert('회원 가입 성공!');</script>";
                $_SESSION['flag'] ='';
            }
        }

        if(isset($_SESSION['user_id'])){
            echo $_SESSION['user_id'].' 님 안녕하세요';   
        }
        ?></p>
        <article>
            <?php 
            //게시판 이름이 있다면


          


            if(isset($_GET['board_name'])){ 
                //게시판이름이 topic ( 공지사항 ) 이라면
                if($_GET['board_name'] == "topic"){
                    // 게시글 id가 있다면 게시글 출력 
                    if(isset($_GET['id'])){ read_article($conn, $_GET['board_name'],$_GET['id']); } 
                    

                    elseif(isset($_POST['cotrol_read']) == "read"){

                        echo 
                        '<hr>
                        <p class="article_title">'.$_POST['test_title'].'</p>
                      
                        <hr>
                        <p class="article_content"> '.$_POST['test_description'].' </p>';
                        
                        $_POST['control_flag'] = NULL;
                    }

                    // 게시글 생성
                    elseif(isset($_POST['cotrol_flag']) == "create"){
                       include "../view/create.php";
                       $_POST['control_flag'] = NULL;
                    }
                    
                   
                    //게시글 id가 없다면 게시글 리스트    
                    else{new_article_create($conn,$_GET['board_name'],8);}               
                }
                //게시판이름이 topic2 ( Q&A ) 라면
                elseif($_GET['board_name'] == "topic2"){
                    //게시글 id가 있다면 게시글 출력
                    if(isset($_GET['id'])){read_article($conn, $_GET['board_name'],$_GET['id']);}
                    //게시글 id가 없다면 게시글 리스트  
                    else{new_article_create($conn,$_GET['board_name'],20);}                         
                }
                //게시판 접근 도메인이 잘못됐다면 
                else{ echo '<p>잘못된 접근입니다.</p>'; }
            //게시판 메뉴 도메인이 없다면
            }
            else{ echo '<p>잘못된 접근입니다.</p>'; } 
            ?>  
            

         

           
        </article>
        
        <form action="../VIEW/board.php?board_name=topic" method="post">
        <input type="hidden" name="cotrol_flag" value="create">
            <input type="submit" value="글 쓰기?">
        </form>
    
   
            
     </div>
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>

</body>

</html>