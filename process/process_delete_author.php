<?php
include '../data/mysql_conn.php';
//settype($_POST['id'],'integer');
$filtered = array(
    'id' => mysqli_real_escape_string($conn, $_POST['id']),
    'name' => mysqli_real_escape_string($conn, $_POST['name']),
    'password' => mysqli_real_escape_string($conn, $_POST['password']),
);


$sql = "
    select * 
    from author
    where 
       id = '{$filtered['id']}' &&
       name = '{$filtered['name']}' &&
       password = '{$filtered['password']}'
";


var_dump($filtered);
$account_result = mysqli_query($conn, $sql);


if(mysqli_num_rows($account_result) ){
        $sql = "
        delete from topic
        where
            author_id = '{$filtered['id']}'
        ";

    $result = mysqli_query($conn, $sql);
    $sql = "
        delete from author
        where
            id = '{$filtered['id']}'
        ";

    $result = mysqli_query($conn, $sql);
    if ($result == false){
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($conn));
    
    } else {
        //echo '삭제했습니다. <a href="author.php">돌아가기</a>';
        header("Location: author.php");
    }
}
else{
    echo '아이디 혹은 비밀번호가 일치하지 않습니다.';
    error_log(mysqli_error($conn));

}


//echo $sql;
