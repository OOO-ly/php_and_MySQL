<?php
// var_dump($_POST);
$conn = mysqli_connect("localhost", 'root', '12341234', 'tnj_tutorial');

$filtered = array(

    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description'])

);

$sql = "
    INSERT INTO topic
    (title, description, created)
    VALUES(
        '{$filtered['title']}',0
        '{$filtered['description']}',
        NOW()
    )
";

$result = mysqli_query($conn, $sql);
if ($result == false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
} else {
    // $test = mysqli_query($conn,"SELECT * from topic order by id  desc limit 1")->num_rows; 
    
    echo '성공했습니다. <a 
    href="index.php?id="'
    .$result['id'].
    '">
    돌아가기</a>';
}
//echo $sql;
?>