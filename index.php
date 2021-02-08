<?php
include 'mysql_conn.php';
session_start();

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while ($row = mysqli_fetch_array($result)) {
    //<li><a href="index.php?id=5">Mysql</a></li>
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}
$article = array(
    'title' => "Welcome",
    'description' => "Hello php & MySQL"
); //,
//'author' => ""); 없이 구현 방법은 여러가지

$modify_link = '';
$delete_link = '';
$author = '';
if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    // $sql = "SELECT * FROM topic WHERE id={$filtered_id}"; // sql 에  ; 제외 가능
    // $sql = "select 
    //             topic.id, topic.title, 
    //             topic.description, 
    //             topic.created,
    //             topic.author_id,
    //             author.name,
    //             author.profile 
    //         from topic 
    //         left join author 
    //         on topic.author_id = author.id
    //         WHERE topic.id={$filtered_id}
    //         ";
    $sql = "select * 
            from topic 
            left join author 
            on topic.author_id = author.id 
            where topic.id={$filtered_id}";


    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);


    //본문 내용
    //-------------
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    //여기서 저자 앞에 문자열 수정 중 
    //$article['author'] = htmlspecialchars("by ".$row['name']);

    // egoing style
    $article['author'] = htmlspecialchars($row['name']);
    //-------------

    //echo $sql;
    if($row['name'] == $_SESSION['user_id'] ){
    $modify_link = '<a href="modify.php?id=' . $filtered_id . '">modify</a>';
    
    $delete_link = //'<a href="process_delete.php?id='.$filtered_id.'">delete</a>';
        '<form action="process_delete.php" method="POST" >
    <input type="hidden" name="id" value="' . $_GET['id'] . '">
    <input type="submit" value="delete">
    </form>';
    }
    //egoing style 저자 출력
    $author = "<p>by {$article['author']}</p>";
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
    <h1><a href="index.php">test</a></h1>
    <p><a href="author.php">회원 정보 및 회원 가입</a></p>
    
    <?php
    
    if(!isset($_SESSION['user_id'])){
        echo '<a href="login.php">login</a>';
    }
    else{
        echo $_SESSION['user_id'].'님 안녕하세요 :) <a href="logout.php">로그아웃</a>';
    }
    ?>
    
    
    <ol>
        <?= $list ?>
    </ol>

    <?php
    if(isset($_SESSION['user_id'])){
        echo '  <a href="create.php">create</a>';
    }
    ?>

    <?= $modify_link ?>
    <?= $delete_link ?>



    <h2><?= $article['title'] ?></h2>
    <p><?= $article['description'] ?></p>
    <p><?= $author ?></p> 
    


</body>

</html>