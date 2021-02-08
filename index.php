<?php
include 'mysql_conn.php';
session_start();

$sql = "SELECT * FROM topic
        LEFT JOIN author
        ON topic.author_id = author.id
        LIMIT 5";
$result = mysqli_query($conn, $sql);
$list = '';


// 게시판 목록 불러오기 
while ($row = mysqli_fetch_array($result)) {
    //<li><a href="index.php?id=5">Mysql</a></li>
    $escaped_title = htmlspecialchars($row['title']);
   // var_dump($row);
    //기존 list 방식
    //$list .=  "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
    // 글 테이블 
    
    $list .="
        <tr>
            <td>{$row[0]}</td>
            <td><a href=\"index.php?id={$row[0]}\">{$escaped_title}</a></td>
            <td>{$row['name']}</td>
            <td>{$row['created']}</td>
        </tr>";
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
    if (isset($_SESSION['user_id']) && $row['name'] == $_SESSION['user_id']) {
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
    <h1><a href="index.php">Index</a></h1>
    <p><a href="author.php">회원 정보 및 회원 가입</a></p>

    <?php

    if (!isset($_SESSION['user_id'])) {
        echo '<a href="login.php">login</a>';
    } else {
        echo $_SESSION['user_id'] . '님 안녕하세요 :) <a href="logout.php">로그아웃</a>';
    }
    ?>
    <hr>
    <table border="2">

    회원게시판
    <tr>
        <td>글번호
        </td>
        <td>글 제목
        </td>
        <!-- 비밀번호 삭제 요망 -->
        <td>작성자
        </td>
        <td>작성일
    </tr>
    <?= $list ?>

    </table>
    <table border="2">
    
    자유게시판
    <tr>
        <td>글번호
        </td>
        <td>글 제목
        </td>
        <!-- 비밀번호 삭제 요망 -->
        <td>작성자
        </td>
        <td>작성일
    </tr>
    <?= $list ?>

</table>




   

   

  

<hr>
    <h2><?= $article['title'] ?></h2>
    <p><?= $article['description'] ?></p>
    <p><?= $author ?></p>
    <hr>
    <p>   
    
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '  <p><a href="create.php">create</a></p>';
    }
    echo $modify_link, $delete_link;
    ?>
   




</body>

</html>