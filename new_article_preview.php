<?php
set_include_path(" C:\Users\tnj200##\Documents\php_and_MySQL;");
include 'data/mysql_conn.php';
function new_article_create($conn, $board_name, $limit = 5, $rand = false)
{
        
        $sql = "SELECT 
    {$board_name}.id, {$board_name}.title, 
    {$board_name}.description, 
    {$board_name}.created,
    {$board_name}.author_id,
    author.name,
    author.profile 
    FROM {$board_name}        
    LEFT JOIN author
    ON {$board_name}.author_id = author.id
    ORDER BY ";
   
    if($rand == false)
    {
        $sql .="created DESC LIMIT {$limit}";
    }
    else
    {
        $sql .= "rand() LIMIT {$limit}";
    }
    
    

    $result = mysqli_query($conn, $sql);
    $list = '';

    echo 
    '<table class="board_table">
    <thead>
        <tr class="column_title">
            <td>글 번호
            </td>
            <td>글 제목
            </td>
            <td>작성자
            </td>
            <td>작성일
        </tr>
    </thead>';
        
    while ($row = mysqli_fetch_array($result)) {

        $escaped_title = htmlspecialchars($row['title']);

        // list 방식
        //$list .=  "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";

        // 테이블 방식
        $list .= "
        <tbody>
            <tr class=\"board_content\">
                <td>{$row['id']}</td>
                <td><a href=\"../NEW_VIEW/board.php?board_name={$board_name}&id={$row['id']}\">{$escaped_title}</a></td>
                <td>{$row['name']}</td>
                <td>{$row['created']}</td>
            </tr>
        </tbody>";
    }
    
      echo  $list. 
    '</table>';
}