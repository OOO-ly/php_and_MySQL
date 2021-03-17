<?php

session_start();
include '../model/mysql_conn.php';


    $filtered = array(
        'user_pw' => htmlspecialchars($_POST['user_pw'])
     
    );



    $sql = 'select password from author';
    $result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
    {
        
        if( $filtered['user_pw'] == $row['password']  or password_verify($filtered['user_pw'],$row['password']))
        {
            unset($_SESSION['user_pw'],$filtered['user_pw']);
            $_SESSION['flag'] = 'confirm';// flag 가 아니라 return 을 보낼 수 있는 법을 배워야함.
            $prevPage = $_SERVER['HTTP_REFERER'];
            // header('location:'.$prevPage)
            header('location: ../view/author_modify.php' ); 
            // header('location: ../index.php' );
            die();
        }
    }
    unset($filtered);
    session_start();
    $_SESSION['flag'] = 'wrong_password';// flag 가 아니라 return 을 보낼 수 있는 법을 배워야함.
    $prevPage = $_SERVER['HTTP_REFERER'];
    // header('location:'.$prevPage);
    header('location: ../index.php' );


?>
