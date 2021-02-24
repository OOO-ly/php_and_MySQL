<?php

function board_control( $conn, string $board_name, $_post_control_flag, $article_id = NULL ){

  

    $sql ="SELECT EXISTS (
        SELECT 1 FROM Information_schema.tables
        WHERE table_schema = 'tnj_tutorial'
        AND table_name = '{$board_name}' )AS flag";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    // $row['flag'] == 1;

    // die(var_dump($row['flag']));
    switch($board_name)
    {
        case 'topic':
            $board_title = '공지사항';
            break;
        case 'topic2':
            $board_title = 'Q &amp; A';
            break;

    }

    if($row['flag'] == 1)
    {
        // 효율의 대한 문의 필요.
        switch($_post_control_flag){
            case 'list':
                new_article_create($conn,$board_name,20);
                break;
            case 'read':
                read_article($conn,$board_name,$article_id);
                break;
            // 게시글 생성
            case 'create':
                ?>
                <p>
                <h2 class="board_title create_board">
                <a href="../VIEW/board.php?board_name=<?= $board_name ?>">
                <?= $board_title ?>
                </a>
                </h2>
                </p>
                <!-- like brunch 실패 일단 기능 구현 부터 -->
                <!-- <p contenteditable="true" class="article_title" id="editable_title" >
                    제목을 입력해주세요
                </p>
                <P class="article_info">
                    by  
                            <?= $_SESSION['user_id'] ?>
                </P>
                <hr>
                <p contenteditable="true"  class="article_content" id="editable_text"> 
                    내용을 입력해주세요
                </p> -->
                <!--                             -->
                <!-- 기능 구현 -->
                <form  action="./create_acticle.php">
                    <input type="text" class="article_title" id="editable_title" placeholder="제목을 입력하세요" autocomplete="off">
                    <P class="article_info">
                    by  
                            <?= $_SESSION['user_id'] ?>
                    </P>
                    <hr>
                    <textarea class="article_content" id="editable_text"></textarea>
                    <button class="submit_bt" id="create_sub" type="submit">글 작성</button>
                </form>
                <?php
                    break;
            case 'modify':
                    $_POST['control_flag'] = NULL;
                    break;
            case 'delete':
                    $_POST['control_flag'] = NULL;  
                    break;
            default:
                    $_POST['control_flag'] = NULL;
                    break;
            }
    }
    else{ echo '<p>잘못된 접근입니다.</p>'; }
}   
?>

