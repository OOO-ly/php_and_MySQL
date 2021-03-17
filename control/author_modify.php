<?php
include '../model/mysql_conn.php';
settype($_POST['board_id'],'integer');
$password_hashed = password_hash($_POST['user_pw'],PASSWORD_DEFAULT);
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'user_id' => mysqli_real_escape_string($conn, $_POST['user_id']),
    'user_pw' => mysqli_real_escape_string($conn, $password_hashed),
    'user_profile' => mysqli_real_escape_string($conn, $_POST['user_profile'])   
);
if(isset($_POST['member_lv'])){
    $filtered = array( 'member_lv' =>mysqli_real_escape_string($conn, $_POST['member_lv']));
}



$member_lv = 1;
if(isset($_SESSION['member_lv']))
{
        $member_lv  = $_SESSION['member_lv'];
}


// die(var_dump($filtered));
$sql = "
    UPDATE author
    SET 
        name = '{$filtered['user_id']}',
        password = '{$filtered['user_pw']}',
        profile = '{$filtered['user_profile']}'";
if($member_lv == 2){
    $sql .= ", member_lv = '{$filtered['member_lv']}'";
}

$sql .= "WHERE
        id = {$filtered['id']}
    ";

$result = mysqli_query($conn, $sql);
if ($result == false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
   
} else {
    // echo '성공했습니다. <a href="index.php?id='.$filtered['id'].'">돌아가기</a>';
    // header("Location: ./index.php?id={$filtered['id']}");
    // header("Location: ./board.php?id={$filtered['id']}");
    $prevPage = $_SERVER['HTTP_REFERER'];
    header('location:'.$prevPage);
}
//echo $sql;
?>