<?php
include '../model/mysql_conn.php';
settype($_POST['delete_id'],'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['delete_id']),
    'board' => mysqli_real_escape_string($conn, $_POST['delete_board'])
  );



$sql = "
    delete from {$filtered['board']}
    where
        id = '{$filtered['id']}'
    ";
  


$result = mysqli_query($conn, $sql);
if ($result == false){
    echo '삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
   
} else {
    echo '삭제했습니다. <a href="index.php">돌아가기</a>';
    session_destroy();
    // $prevPage = $_SERVER['HTTP_REFERER'];
    // header('location:'.$prevPage);
    header("location: ../view/board.php?board_name={$filtered['board']}");
}

?>