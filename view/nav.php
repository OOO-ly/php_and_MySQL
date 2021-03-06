<nav>
    <ul class="nav-container">
        <a class="nav-logo" href="<?= __rootpath ?>/index.php">
            <img src="<?= __rootpath ?>/media/profile.png" alt="nav_logo">
        </a>
        <li class="nav_item"><a href="<?= __rootpath ?>/view/produce.php" class="produce_ nav_a">회사소개</a></li>
        <li class="nav_item dropdown" id="dropdown_head"><a
                href="<?= __rootpath ?>/view/board.php?board_name=topic" class="nav_a">커뮤니티</a>
            <div class="dropdown-content">
                <ul>
                    <li>
                        <!-- <a href="<?= __rootpath ?>view/board.php?board_name=topic">공지사항</a> -->
                        <form action="<?= __rootpath ?>/view/board.php?board_name=topic" method="post">
                            <button type="submit" class="dropdown_bt nav_a">공지사항</button>
                            <input type="hidden" name="control_flag" value="list">
                        </form>
                    </li>
                    <li>
                        <!-- <a href="<?= __rootpath ?>view/board.php?board_name=topic2">Q &amp; A</a> -->
                        <form action="<?= __rootpath ?>/view/board.php?board_name=topic2" method="post">
                            <input type="hidden" name="control_flag" value="list">
                            <button type="submit" class="dropdown_bt nav_a">Q &amp; A</button>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav_item"><a href="<?= __rootpath ?>/view/contactus.php" class="contact_ nav_a">고객지원</a></li>
        <div class="login_box">
            <?php if (!isset($_SESSION['user_id'])) { ?>
            <li class="nav_item">
                <button class="member_bt" id="sign_in_bt" class="nav_a">로그인</button>
                <!-- modal 실행 시 초점 이동 방법 필요 -->
                <!-- 모달 종료 시 기존 초점으로 이동 방법 필요 -->
            </li>
            <li class="nav_item"><button class="member_bt nav_a" id="sign_up_bt">회원가입</button></li>

            <?php } else { ?>

            <li class="nav_item member_bt">
                <button class="member_bt nav_a" id="member_info_bt"><?= $_SESSION['user_id'] ?></button>
        </li>
            <li class="nav_item member_bt"><a href="<?= __rootpath ?>/control/sign_out.php" class="sign_ nav_a">로그아웃</a></li>
            <?php } ?>
        </div>
    </ul>
</nav>

<script defer src="<?=__rootpath?>/js/modal.js"></script>

<!-- 회원가입 /로그인 관련 -->
<?php 

include __DIR__."/modal.php";

if(isset($_SESSION['flag'])){
    if($_SESSION['flag'] == 'confirm'){
        // header('location: ../view_/index_.php' ); 
        $_SESSION['flag'] ='';
    }
    if($_SESSION['flag'] == 'wrong_password'){
        echo "<script>alert('비밀번호를 확인 해주세요');</script>";
        $_SESSION['flag'] ='';
    }
    if($_SESSION['flag'] == 'failed_sign'){
        echo "<script>alert('로그인 실패!');</script>";
        $_SESSION['flag'] ='';
    }
    else if($_SESSION['flag'] == 'failed_sign_up_1062'){
        // echo "<script>alert('중복 아이디입니다!');</script>";
        echo "<script>alert('중복아이디 입니다!');</script>";
        $_SESSION['flag'] ='';
    }
    else if($_SESSION['flag'] == 'sign_up_succeed'){
        echo "<script>alert('회원 가입 성공!');</script>";
        $_SESSION['flag'] ='';
    }
}


?> 