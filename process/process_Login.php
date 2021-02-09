<?php
session_start();
include '../data/mysql_conn.php';

$_SESSION['user_id'] = $_POST['user_id'];
$_SESSION['user_pw'] = $_POST['user_pw'];

$filtered = array(

    'user_id' => htmlspecialchars($_SESSION['user_id']),
    'user_pw' => htmlspecialchars($_SESSION['user_pw'])
);



$sql = 'select name,password from author';
$result = mysqli_query($conn,$sql);




while($row = mysqli_fetch_array($result))
{
    if($row['name'] == $filtered['user_id'] && 
       $row['password'] == $filtered['user_pw'])
    {
        header("Location: ../index.php");
        die();
    }
}
if(($filtered['user_id'] == '' ))
{
    session_destroy();
    echo "아이디를 입력해주세요 <a href=\"index.php\">돌아가기</a>";
}
else
{
    session_destroy();
    echo "아이디 혹은 비밀번호를 확인해주세요. <a href=\"index.php\">돌아가기</a>";
}

?>