<?php
session_start();
include '../model/mysql_conn.php';


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
    if($row['name'] == $filtered['user_id'] && $row['password'] == $filtered['user_pw'])
    {
        $prevPage = $_SERVER['HTTP_REFERER'];
        header('location:'.$prevPage);
        die();
    }
    else{
        echo "DB : ". nl2br("{$row['name']} {$row['password']}\n");
        
        echo "SS : ". nl2br("{$filtered['user_id']} {$filtered['user_pw']}\n");
        echo "<hr>";
    }
}

session_destroy();
unset($filtered);
session_start();
$_SESSION['flag'] = 'failed_sign';

$prevPage = $_SERVER['HTTP_REFERER'];
header('location:'.$prevPage);

?>


