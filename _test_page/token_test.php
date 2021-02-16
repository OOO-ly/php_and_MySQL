
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>로그인 페이지</title>
    </head>
    <body>
        <form action='login_ok.php' method='post'>
            아이디 : <input type='text' name='id'><br>
            비밀번호 : <input type='password' name='pw'> <br>
            <!-- <input type='hidden' name='l_token' value='<?php echo $_SESSION[fake]; ?>'> -->
            <input type='submit' value='로그인'>
            </form>
    </body>
</html>