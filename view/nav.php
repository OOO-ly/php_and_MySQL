<nav>
    <ul class="nav-container">
        <a class="nav-logo" href="../index.php">
            <img src="../media/profile.png" alt="nav_logo">
        </a>
        <li class="nav_item"><a href="../VIEW/produce.php" class="produce_">회사소개</a></li>
        <li class="nav_item dropdown"><a href="../VIEW/board.php?board_name=topic">커뮤니티</a>
            <div class="dropdown-content">
                <ul>
                    <li><a href="../VIEW/board.php?board_name=topic">공지사항</a></li>
                    <li><a href="../view/board.php?board_name=topic2">Q & A</a></li>
                </ul>
            </div>
        </li>
        <li class="nav_item"><a href="./contactus.php" class="contact_">고객지원</a></li>
        <div class="login_box">
            <?php if (!isset($_SESSION['user_id'])) { ?>
                <li class="nav_item">
                    <a role="button" id="open">로그인
                    </a>
                </li>
                <li class="nav_item"><a href="" class="sign_up">회원가입</a></li>
            <?php } else { ?>
                <li class="nav_item"><a href="./view/author.php?id=<?= $row[0] ?>" class="sign_">회원정보</a></li>
                <li class="nav_item"><a href="./view/logout.php" class="sign_">로그아웃</a></li>
            <?php } ?>
        </div>
    </ul>
    
</nav>

  