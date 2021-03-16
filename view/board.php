<?php
// set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL");
define ("__rootpath","",false);
session_start();
include "../model/mysql_conn.php";
include "../control/new_article_preview.php"; 
include "../control/read_article.php"; 
include "../control/borad_control_flag.php";
include "../control/title_con.php";

header("Cache-Control: no-cache");



if(!isset($_POST['control_flag'])){
    $_POST['control_flag'] = 'list';
}

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

    <?php include '../view/nav.php'; ?>

  

    <div class="content-container">
        


        <article>
             
            <?php 
                //게시글 id 가 경로로 확인
                //게시판 이름 유효성 검사는 안에서 함
                isset($_GET['id']) ? 
                //게시글 id가 경로에 있다면 게시글 read로 
                board_control( $conn, $_GET['board_name'], $_POST['control_flag'], $_GET['id']):
                //게시글 id가 없다면 id NULL로
                board_control( $conn, $_GET['board_name'], $_POST['control_flag']);

            ?>    
        </article>
        

        
        <div class="bt_group">

            <?php 
            // 로그인 상태라면
            if(isset($_SESSION['user_id'])){
                //게시판 목록이라면 
                if($_POST['control_flag'] == 'list'){ ?>
                <!-- write button -->
                    <form action="<?= __rootpath ?>/view/board.php?board_name=<?=$_GET['board_name']?>" method="post">
                        <input type="hidden" name="control_flag" value="create"/>
            
                        <input class="submit_bt" type="submit" value="글 쓰기"/>
                    </form>   
            <?php
                //게시글 상세라면 
                }if(isset($_GET['id'])){
                    //  modify button  & delete button -
                    if($_SESSION['user_id'] == $_SESSION['article_author']){ ?>
                        <form action="<?= __rootpath ?>/view/board.php?board_name=<?= $_GET['board_name'] ?>" method="post">
                            <input type="hidden" name="modify_id" value="<?= $_GET['id'] ?>"/>
                            <input type="hidden" name="control_flag" value="modify"/>
                            <input class="submit_bt" type="submit" value="글 수정"/>
                        </form>
                        <!-- 삭제 후 도메인이 모두 살아있어서 그러함 -->
                        <form action="<?= __rootpath ?>/process/process_delete.php" method="post">
                            <input type="hidden" name="delete_id" value="<?= $_GET['id'] ?>"/>
                            <input type="hidden" name="delete_board" value="<?= $_GET['board_name']?>"/>
                            <input type="hidden" name="control_flag" value="delete"/>
                            <input class="submit_bt" type="submit" value="글 삭제"/>
                        <!-- 삭제하고 리스트로 돌아오면 버튼이 다 살아남  -->
                        </form>
                <?php }
                    // 게시글 상세 지만 내가 쓴글이 아니라면
                    else{ ?>
                    <a href="<?= __rootpath ?>/view/board.php?board_name=<?= $_GET['board_name'] ?>" class="submit_bt">글 목록</a> 
                    <?php }
                    }
            } ?>                                                                                
        </div>

            
     </div>
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>
</body>
</html>
    
