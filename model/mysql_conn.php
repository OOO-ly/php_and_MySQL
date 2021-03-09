<?php
// mysql 경로
//C:\Bitnami\wampstack-8.0.1-0\mysql\bin
//접속 명령어 ./mysql -uroot -p

// $conn = mysqli_connect("localhost", "root", "12341234", "tnj_tutorial");
$conn = mysqli_connect("0.0.0.0", "root", "12341234", "tnj_tutorial");
// $conn =mysqli_connect("localhost", "tnj_guest", "@@##WWEE", "tnj_tutorial");

    if(isset($_SESSION['user_id'])){
        $sql = "select id
        from author
        where name=\"{$_SESSION['user_id']}\"";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
}


?>