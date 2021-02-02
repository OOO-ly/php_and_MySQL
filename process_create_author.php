<?php
$conn = mysqli_connect("localhost", 'root', '12341234', 'tnj_tutorial');

$filtered = array(

    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'profile' => mysqli_real_escape_string($conn, $_POST['profile']),
    //'author_id' => mysqli_real_escape_string($conn, $_POST['author_id'])
);


$sql = "
    INSERT INTO author
    (name, profile)
    VALUES(
        '{$filtered['name']}',
        '{$filtered['profile']}'
        )
";

$result = mysqli_query($conn, $sql);

if ($result == false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    echo mysqli_error($conn);
    error_log(mysqli_error($conn));
} else {
    //echo '성공했습니다 <a href="author.php">돌아가기</a>';
    header("Location: ./author.php");
}
