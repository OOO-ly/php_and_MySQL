<?php
$conn = mysqli_connect("localhost", "root", "12341234", "tnj_tutorial");
session_start();
$escaped_userid = htmlspecialchars($_SESSION['user_id']);

//글목록 업로드 
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';

while ($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}
//---------
//로그인 한 저자 전송
$sql = " 
select id from author
where name  = '{$escaped_userid}'
";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


//--------

//저자 선택
// $sql = "SELECT * FROM author";
// $result = mysqli_query($conn,$sql);
// $select_form = '<select name="author_id">';
// while($row = mysqli_fetch_array($result)){
//     $select_form.= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
// }
// $select_form .= '</select>';
//----------------

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
    <form action="process_create.php" , method="POST">
        <input type="hidden" name="user_id" value="<?=$row['id']?>">
        
        <p><input type="text" name="title" placeholder="Title"></p>
        
        <!-- 저자 출력 -->
        <!-- <p><s$select_form?></p> -->
        <p>작성자 : <?=$escaped_userid?></p>
        
        <textarea name="description" placeholder="Description"></textarea>
     
        <p><input type="submit"></p>
    </form>
</body>

</html>