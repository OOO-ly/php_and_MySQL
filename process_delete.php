<?php
//delete 와 같이 링크로 움직이면 안되는 민감한 행동은 POST로

$conn = mysqli_connect("localhost", 'root', '12341234', 'tnj_tutorial');
//settype($_POST['id'],'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    // 'title' => mysqli_real_escape_string($conn, $_POST['title']),
    // 'description' => mysqli_real_escape_string($conn, $_POST['description'])
);



$sql = "
    delete from topic
    where
        id = '{$filtered['id']}'
    ";

$result = mysqli_query($conn, $sql);
if ($result == false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    error_log(mysqli_error($conn));
   
} else {
    echo '삭제했습니다. <a href="index.php">돌아가기</a>';

}

//echo $sql;
?>