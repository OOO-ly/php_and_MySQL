<div class="modal hidden">
    <div class="modal_overlay">
    </div>
    <div class="modal__content">
        <h3>로그인</h3>
            <form class="login_form" action="../control/Sign_in.php" method="POST">
                    <p class="login_label">
                    <label for="login_id_input">아이디</label>
                    <input type="text" id="login_id_input" name="user_id" pattern="^([a-z0-9_]){3,20}$" autocomplete="off" required>
                    
                    
                    <div class="check_font hidden" id="login_id_reg_exp">testtest</div>

                    </p>



                    <p class="login_label"><label for="delete_pw_input">비밀번호</label>
                    <input type="password" id="delete_pw_input" name="user_pw"required></p>
                    <button id="login_bt"> 로그인 </button>
            </form>
        </div>
    </div>

  
   
