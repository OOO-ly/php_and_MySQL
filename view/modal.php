<div class="modal hidden">
    <div class="modal_overlay"></div>
    <div class="modal__content">
            <div class="modal_form">
                <div class="sign_in_form">
                <h3>로그인</h3>
                    <form class="sign_in_form" action="<?= __rootpath ?>/control/Sign_in.php" method="POST">
                            <p>
                            <label for="sign_in_id_input">아이디</label>
                            <input type="text" id="sign_in_id_input" name="user_id" pattern="^([a-z0-9_]){3,20}$" autocomplete="off" required>
                            </p>
                            <p>
                            <label for="sign_in_pw_input">비밀번호</label>
                            <input type="password" id="sign_in_pw_input" name="user_pw"required>
                            </p>
                            <button id="sign_in_bt"> 로그인 </button>
                    </form>
                </div>
                <div class="sign_up_form">
                <h3>회원가입</h3>
                    <form class="sign_up_form " action="<?= __rootpath ?>/control/sign_up.php" method="POST">
                            <p>
                            <label  for="sign_up_id_input">회원가입 아이디</label>
                            <input type="text" id="sign_up_id_input" name="user_id" pattern="^([a-z0-9_]){3,20}$" autocomplete="off" required> 
                            </p>
                            <p><label for="sign_up_pw_input"> 회원 가입 비밀번호</label>
                            <input type="password" id="sign_up_pw_input" name="user_pw" required>
                            </p>
                            <p>
                            <label for="sign_up_profile_input"> 회원 가입 프로필</label>
                            <input type="textarea" id="sign_up_profile_input" name="user_profile"
                            autocomplete="off">
                            </p>
                            <button id="sign_up_bt"> 회원 가입 </button>
                    </form>
                </div>

                <?php
                if(isset($_SESSION['user_id'])){
                $sql = "SELECT password From author where name = '{$_SESSION['user_id']}'";
                $result = mysqli_query($conn, $sql);
                $author_ = mysqli_fetch_array($result); ?>
                <div class="member_info_confirm_form">
                <h3>비밀번호 확인</h3>
                    <form class="password_confirm" action="../control/password_confirm.php"method="POST">
                            <p>
                                <h4><?= $_SESSION['user_id']?> 님의 비밀번호를 입력해주세요</h4>
                            </p>
                            <p>
                                <label for="member_info_pw">회원 비밀번호</label>
                                <input type="password" id="member_info_pw" name="user_pw" required>
                            </p>
                            <button id="member_info_confirm_bt" onclick="password_confirm();"> 회원 정보 수정 완료 </button>
                    </form>
                </div>
    
                
                <?php } ?>
            </div>
        </div>
    </div>

 