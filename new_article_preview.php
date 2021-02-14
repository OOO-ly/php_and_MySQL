<?php

include './data/mysql_conn.php';

$sql = "SELECT 
topic.id, topic.title, 
topic.description, 
topic.created,
topic.author_id,
author.name,
author.profile 
FROM topic        
LEFT JOIN author
ON topic.author_id = author.id
ORDER BY created DESC
LIMIT 5";

$result= mysqli_query($conn, $sql);

// die(var_dump($result = mysqli_query($conn, $sql)));
//$result = mysqli_query($conn, $sql);
$list = '';

?>
<table class="topic_table">
    <tr class="column_title">
        <td>글번호
        </td>
        <td>글 제목
        </td>
        <td>작성자
        </td>
        <td>작성일
    </tr>
<?php



while ($row = mysqli_fetch_array($result)) {

    $escaped_title = htmlspecialchars($row['title']);

    // list 방식
    //$list .=  "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";

    // 테이블 방식
    $list .= "
        <tr class=\"topic_content\">
            <td>{$row['id']}</td>
            <td><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></td>
            <td>{$row['name']}</td>
            <td>{$row['created']}</td>
        </tr>";
}
?>
<?= $list ?>
</table>