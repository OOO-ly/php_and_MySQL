<?php
//delete 와 같이 링크로 움직이면 안되는 민감한 행동은 POST로

$conn = mysqli_connect("localhost", 'root', '12341234', 'tnj_tutorial');
//settype($_POST['id'],'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    // 'title' => mysqli_real_escape_string($conn, $_POST['title']),
    // 'description' => mysqli_real_escape_string($conn, $_POST['description'])
);


//테이블 별 column명이 같으면 의도와 다르게 다른 테이블의 해당 컬럼이 날아갈 수 있음 
//sql 작성시 테이블을 잘 고려애야함
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
    header("Location: index.php");
}

//echo $sql;
?>