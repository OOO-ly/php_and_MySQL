<?php


$filtered = array(

    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description']),
    //'author_id' => mysqli_real_escape_string($conn, $_POST['author_id']),//legacy
    'user_id' => mysqli_real_escape_string($conn, $_POST['user_id'])
);


$sql = "
    INSERT INTO topic2
    (title, description, author_id, created)
    VALUES( 
        '{$filtered['title']}',
        '{$filtered['description']}',
        '{$filtered['user_id']}',
        NOW()
        )
";

$result = mysqli_query($conn, $sql);

if ($result == false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    echo mysqli_error($conn);
    error_log(mysqli_error($conn));
} else {
    $test = mysqli_query($conn, "SELECT * from topic order by id  desc limit 1");
    $row = mysqli_fetch_array($test);
    echo '성공했습니다. <a href="../index.php?id='
        . $row['id'] .
        '">
    돌아가기</a>';
}
