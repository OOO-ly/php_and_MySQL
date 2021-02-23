<?php
set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
session_start();
include"../model/mysql_conn.php";
include"../control/new_article_preview.php"; 
include"../control/read_article.php"; 
include"../control/title_con.php";



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
            // var_dump($_SESSION['user-id']);
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
                    

                    // control flag 분기 switch 문으로 변경 
                    // 효율의 대한 문의 필요.
                    if(isset($_POST['control_flag'])){
                    switch(isset($_POST['control_flag'])){
                        case 'read':
                            ?>
                        <hr>
                        <p class="article_title">'.$_POST['test_title'].'</p>
                      
                        <hr>
                        <p class="article_content"> '.$_POST['test_description'].' </p>
                        <?php


                    }       
                        
                        elseif($_POST['control_flag'] == "read"){

                        ?>
                       
                        $_POST['control_flag'] = NULL;
                        }

                        // 게시글 생성
                         elseif($_POST['control_flag'] == "create"){
                        //    include "../view/create.php";
                        ?>
                            <p>
                            <h2 class="board_title create_board">
                            <a href="../VIEW/board.php?board_name=topic">
                            "공지사항"에 작성 중...
                            </a>
                            </h2>
                            </p>
                            <p contenteditable="true" class="article_title" id="editable_title" >
                                제목을 입력해주세요
                            </p>
                            <P class="article_info">
                                by  <a href="#">
                                        <?= $_SESSION['user-id'] ?>
                                    </a> 
                            </P>
                            <hr>
                            <p contenteditable="true"  class="article_content" id="editable_text"> 
                                내용을 입력해주세요
                            </p>
                        <?php
                         }
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
        

           <!-- $_GET['id']라는경로를 살릴 거기 떄문에 예외처리를 해야함
            id가 없는 걸 조회하면 오류 나오도록 쿼리로 검색하는게 나을 거임 -->
        
        <div class="bt_group">
            <?php if($_POST['control_flag'] == 'create'){?>
                <form id="form" action="../view/board.php?board_name=topic" method="POST" onsubmit="return getContent()">
                <input type="hidden" name="control_flag" value="read"/>
                <input id="form_title" style="display: none" name="test_title" />
                <textarea id="form_textarea" style="display:none" name="test_description">
                </textarea> 
                <input type="submit" value="글 작성" />
            </form>
            <?php } if($_SESSION['user_id']){ ?>
                    <form action="../VIEW/board.php?board_name=topic" method="post">
                        <input type="hidden" name="control_flag" value="create"/>
                        <input type="submit" value="글 쓰기"/>
                    </form>
            <?php }if(isset($_GET['id'])){ ?>
                <form action="../VIEW/board.php?board_name=topic" method="post">
                    <input type="hidden" name="control_flag" value="modify"/>
                    <input type="submit" value="글 수정"/>
                </form>
                <form action="../VIEW/board.php?board_name=topic" method="post">
                    <input type="hidden" name="control_flag" value="delete"/>
                    <input type="submit" value="글 삭제"/>
                </form>
            <?php } ?>
        </div>
    
   
            
     </div>
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>
</body>

</html>
    
