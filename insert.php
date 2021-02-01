<?php
// $mysqli = mysqli_connect("example.com", "user", "password", "database");
// $res = mysqli_query($mysqli, "SELECT 'Please, do not use ' AS _msg FROM DUAL");
// $row = mysqli_fetch_assoc($res);
// echo $row['_msg'];

$conn = mysqli_connect("localhost","root","12341234","tnj_tutorial");
$sql = "
INSERT INTO  topic
(title, description, created)
value(
    'MySQL TEST 2',
    'MySQL TEST 2 is...',
    NOW()
    )
";
if(!mysqli_query($conn,$sql)){
    echo mysqli_error($conn);
}


?>