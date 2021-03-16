<?php
session_start();
include '../model/mysql_conn.php';

    $filtered = array(

        'user_id' => htmlspecialchars($_POST['user_id']),
        'user_pw' => htmlspecialchars($_POST['user_pw'])
     
    );



    $sql = 'select name,password from author';
    $result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
    {
        
        if($row['name'] == $filtered['user_id'] && $row['password'] == $filtered['user_pw'])
        {
            unset($_SESSION['user_pw'],$filtered['user_pw']);
            $_SESSION['user_id'] = $_POST['user_id'];
            $prevPage = $_SERVER['HTTP_REFERER'];
            // header('location:'.$prevPage);
            header('location: ../index.php' );
            die();
        }
    }

    session_destroy();
    unset($filtered);
    session_start();
    $_SESSION['flag'] = 'failed_sign';
    $prevPage = $_SERVER['HTTP_REFERER'];
    // header('location:'.$prevPage);
    header('location: ../index.php' );
//    }


        // 중복 방지 플래그 실패
        // $dbsubmitflag = false;

        // function dbsubmitcheck(){
        //     if($dbsubmitflag){
        //         return $dbsubmitflag;
        //     }
        //     else{
        //         $dbsubmitflag = true;
        //         return false;
        //     }
        // }
        // if(dbsubmitcheck()){
        //     
            //  <!-- <script> alert("잠깐"); </script> -->
           
        //     return;
        // }
        // else{
        //     //실행부
        // }


        //세마포어 시작
        // $acceessableCount = 1; //동시접근제한수

        // function Semaphore_test(){
        //     $acceessableCount  = $acceessableCount -1; //count부터 뺀다

        //     if ($acceessableCount <= 0 ) {
        //         alert("이미 작업이 수행중입니다.");
        //         } 
        //         else 
        //         {
        //             sign_in();
        //         }
            
        //     $acceessableCount  = $acceessableCount -1;
        //     //작업이 끝난 후 다시 작업할수 있게하려면 +1을 한다. 회복시키지 않으면 코드제거.
        // }
            
   
?>


