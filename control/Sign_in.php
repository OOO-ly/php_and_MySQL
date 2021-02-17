<?php
session_start();
include '../model/mysql_conn.php';



$filtered = array(

    'user_id' => htmlspecialchars($_POST['user_id']),
    'user_pw' => htmlspecialchars($_POST['user_pw'])
);



$sql = 'select name,password from author';
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result))
{
    if($row['name'] == $filtered['user_id'] && $row['password'] == $filtered['user_pw'])
    {
        unset($_SESSION['user_pw'],$filtered['user_pw']);
        $_SESSION['user_id'] = $_POST['user_id'];
        $prevPage = $_SERVER['HTTP_REFERER'];
        header('location:'.$prevPage);
        die();
    }
}

session_destroy();
unset($filtered);
session_start();
$_SESSION['flag'] = 'failed_sign';
$prevPage = $_SERVER['HTTP_REFERER'];
header('location:'.$prevPage);

?>


