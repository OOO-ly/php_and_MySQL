<nav>
    <ul class="nav-container">
        <a class="nav-logo" href="../index.php">
            <img src="../media/profile.png" alt="nav_logo">
        </a>
        <li class="nav_item"><a href="../VIEW/produce.php" class="produce_">회사소개</a></li>
        <li class="nav_item dropdown"><a href="../VIEW/board.php?board_name=topic">커뮤니티</a>
            <div class="dropdown-content">
                <ul>
                    <li>
                        <a href="../VIEW/board.php?board_name=topic">공지사항</a>
                        <!-- <form action="../VIEW/board.php" method="post">
                            <input type="hidden" name="board_name" value="topic"> -->
                            
                            <!-- <button type="submit"class="dropdown_bt" >공지사항</button> 
                        </form>        -->
                    </li>
                    <li>
                        <a href="../view/board.php?board_name=topic2">Q &amp; A</a>
                        <!-- <form action="../VIEW/board.php" method="post">
                            <input type="hidden" name="board_name" value="topic2">
                           
                            <button type="submit"class="dropdown_bt" >Q &amp; A</button>  -->
                        </form> 
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav_item"><a href="./contactus.php" class="contact_">고객지원</a></li>
        <div class="login_box">
            <?php if (!isset($_SESSION['user_id'])) { ?>
            
                <li class="nav_item">
                <a class="sign_in" id="sign_in_bt">로그인</a>
                </li>
            
            <li class="nav_item"><a  class="sign_up" id="sign_up_bt">회원가입</a></li>
            
            <?php } else { ?>

            <li class="nav_item"><a  class="sign_">회원정보</a></li>
            <li class="nav_item"><a href="../control/sign_out.php" class="sign_">로그아웃</a></li>
            <?php } ?>
        </div>
    </ul>
</nav>


<?php include_once __DIR__.'/modal.php'; ?>
<script src="../js/modal.js"></script>