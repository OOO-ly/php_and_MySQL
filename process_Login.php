<?php
session_start();

$id = $_GET['user_id'];
$_SESSION['user_id'] = $id;

if(isset($id))
{

    
    header("Location: login.php");
}
else{
    echo "아이디를 입력해주세요";
}
?>