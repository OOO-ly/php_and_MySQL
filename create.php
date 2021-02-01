<?php
$conn = mysqli_connect("localhost", "root", "12341234", "tnj_tutorial");

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';

//SQL_INJECTION을 막기 위해 mysqli_real_escape_string($sql 접속정보, $사용자 정의 정보)를 사용
//htmlspecialchars cross site scripting 을 막기 위해 htmlspecialchars( 사용자 정의 데이터) 를 사용함

while ($row = mysqli_fetch_array($result)) {
    //<li><a href="index.php?id=5">Mysql</a></li>
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}
$article = array(
    'title' => "Welcome",
    'description' => "Hello php & MySQL");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><a href="index.php">dynimic SQL</a></h1>
    <ol>
        <?= $list ?>
    </ol>


    <form action="process_create.php", method="POST">
    
    <p><input type="text" name="title" placeholder="Title"></p>
    <textarea name="description" placeholder="Description"></textarea>
    <p><input type="submit"></p>
    </form>
</body>

</html>
