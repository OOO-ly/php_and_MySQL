<?php
include 'mysql_conn.php';
$filtered = array(

    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'profile' => mysqli_real_escape_string($conn, $_POST['profile']),
    'id' => mysqli_real_escape_string($conn, $_POST['id'])
);


$sql = "
    UPDATE author
    SET
        name =  '{$filtered['name']}',
        profile = '{$filtered['profile']}'
    WHERE 
        id='{$filtered['id']}'
";

$result = mysqli_query($conn, $sql);

if ($result == false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    echo mysqli_error($conn);
    error_log(mysqli_error($conn));
} else {
    header("Location: ./author.php");
}
