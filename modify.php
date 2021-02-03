<?php
include 'mysql_conn.php';
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';


while ($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    echo $sql;

    $modify_link = '<a href="modify.php?id='.$_GET['id'].'">modify</a>';
}

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


    <form action="process_modify.php" , method="POST">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <p><input type="text" name="title" placeholder="Title" value="<?= $article['title']?>" </p>
        <p><textarea name="description" placeholder="Description"><?= $article['description'] ?></textarea></p>
        <p><input type="submit"></p>
    </form>
</body>

</html>