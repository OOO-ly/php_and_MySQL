
 <div class="bt_group">
 <?php 
            // 로그인 상태라면
            if(isset($_SESSION['user_id'])){
                //게시판 목록이라면 
                if($_POST['control_flag'] == 'list'){ 
                    if($_GET['board_name'] == 'topic' && $_SESSION['member_lv'] == 2){
                        ?>
                <!-- write button -->
                    
                    <form action="<?= __rootpath ?>/view/board.php?board_name=<?=$_GET['board_name']?>" method="post">
                        <input type="hidden" name="control_flag" value="create"/>
            
                        <input class="submit_bt" type="submit" value="글 쓰기"/>
                    </form>   
                    <?php
                //게시글 상세라면 
                }elseif($_GET['board_name'] == 'topic2'){?>
                      <form action="<?= __rootpath ?>/view/board.php?board_name=<?=$_GET['board_name']?>" method="post">
                        <input type="hidden" name="control_flag" value="create"/>
            
                        <input class="submit_bt" type="submit" value="글 쓰기"/>
                    </form> 
                <?php }}if(isset($_POST['article_id'])){
                    //  modify button  & delete button -
                    if($_SESSION['user_id'] == $_SESSION['article_author'] || $_SESSION['member_lv'] == 2){ ?>
                        <form action="<?= __rootpath ?>/view/board.php?board_name=<?= $_GET['board_name'] ?>" method="post">
                            <input type="hidden" name="modify_id" value="<?= $_POST['article_id'] ?>"/>
                            <input type="hidden" name="control_flag" value="modify"/>
                            <input class="submit_bt" type="submit" value="글 수정"/>
                        </form>
                        <!-- 삭제 후 도메인이 모두 살아있어서 그러함 -->
                        <form action="<?= __rootpath ?>/control/process_delete.php" method="post">
                            <input type="hidden" name="delete_id" value="<?= $_POST['article_id'] ?>"/>
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