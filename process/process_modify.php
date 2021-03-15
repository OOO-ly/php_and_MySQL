<?php
include '../data/mysql_conn.php';
settype($_POST['id'],'integer');
$filtered = array(
    'board_name' => mysqli_real_escape_string($conn, $_POST['board_name']),
    'id' => mysqli_real_escape_string($conn, $_POST['board_id']),
    'title' => mysqli_real_escape_string($conn, $_POST['edit_title']),
    'description' => mysqli_real_escape_string($conn, $_POST['edit_description'])
);


$sql = "
    UPDATE {$filtered['board_name']}
    SET 
        title = '{$filtered['title']}',
        description = '{$filtered['description']}'
    WHERE
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