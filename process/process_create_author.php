<?php
include '../data/mysql_conn.php';



$filtered = array(

    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'password' => mysqli_real_escape_string($conn, $_POST['password']),
    'profile' => mysqli_real_escape_string($conn, $_POST['profile']),
);



$sql = "
    INSERT INTO author
    (name, password, profile)
    VALUES(
        '{$filtered['name']}',
        '{$filtered['password']}',
        '{$filtered['profile']}'
        )
";



$result = mysqli_query($conn, $sql);


if (!$result) {
    if(mysqli_errno($conn) == 1062)
    {
        echo "중복 아이디 입니다.";
        echo '<a href="author.php">돌아가기</a>';
        die();
    }
    else if($filtered['name'] = '')
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    echo mysqli_errno($conn);
    echo mysqli_error($conn);
    error_log(mysqli_error($conn));
} else {
    header("Location: ./author.php");
}
