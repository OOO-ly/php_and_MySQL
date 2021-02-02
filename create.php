<?php
$conn = mysqli_connect("localhost", "root", "12341234", "tnj_tutorial");

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';

while ($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$sql = "SELECT * FROM author";
$result = mysqli_query($conn,$sql);
$select_form = '<select name="author_id">';
while($row = mysqli_fetch_array($result)){
    $select_form.= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
$select_form .= '</select>';
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
        <p><input type="text" name="title" placeholder="Title"></p>
        <p><?=$select_form?></p>
        <textarea name="description" placeholder="Description"></textarea>
     
        <p><input type="submit"></p>
    </form>
</body>

</html>