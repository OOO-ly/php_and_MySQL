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
    <!-- <script defer src="js/modal.js"></script> -->
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
            if(isset($_SESSION['user_id'])){
                if($_POST['control_flag'] == 'create'){?>
                <!-- <form id="form" action=
                "../control/create_acticle.php" 
                
                                method="POST" onsubmit="return getContent()">
                <input type="hidden" name="board_name" value="<?= $_GET['board_name']?> "/>
                <input id="form_title" style="display: none" name="edit_title" />
                <textarea id="form_textarea" style="display:none" name="edit_description">
                </textarea> 
                <input class="submit_bt" type="submit" value="글 작성" />
            </form> -->
            <?php   //$_POST['control_flag'] = NULL;
                    } if($_POST['control_flag'] == 'list'){ ?>
                    <form action="<?= __rootpath ?>/view/board.php?board_name=<?=$_GET['board_name']?>" method="post">
                        <input type="hidden" name="control_flag" value="create"/>
                        <input class="submit_bt" type="submit" value="글 쓰기"/>
                    </form>
            <?php }if(isset($_GET['id'])){ ?>
                <form action="<?= __rootpath ?>/view/board.php?board_name=topic" method="post">
                    <input type="hidden" name="control_flag" value="modify"/>
                    <input class="submit_bt" type="submit" value="글 수정"/>
                </form>
                <form action="<?= __rootpath ?>/process/process_delete.php" method="post">
                    <input type="hidden" name="delete_id" value="<?= $_GET['id'] ?>"/>
                    <input type="hidden" name="delete_board" value="<?= $_GET['board_name']?>"/>
                    <input type="hidden" name="control_flag" value="delete"/>
                    <input class="submit_bt" type="submit" value="글 삭제"/>
                </form>
            <?php }
            } ?>
        </div>

            
     </div>
    <footer>
        Copyright © 2021 by # . All right reserved.
    </footer>
</body>
</html>
    
