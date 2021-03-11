<?php

function new_article_create($conn, $board_name, $limit = 5, $rand = false )
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
	if($result == false){
	?>
	<!-- <script> alert("못불러왔어요");</script> -->
	
	<?php
	}
    
    switch($board_name){
        case "topic":
            echo  '<p>
            <h2 class="board_title">
            <a href="
			'.__rootpath.'
			/view/board.php?board_name=topic">
            공지사항
            </a>
            </h2>
            </p>';
            break;
        case "topic2";
            echo  '<p>
            <h2 class="board_title">
            <a href="
			'.__rootpath.'/view/board.php?board_name=topic2">
            Q &amp; A
            </a>
            </h2>
            </p>';
    }
    
  


    echo 
    '<table class="board_table">
    <thead>
        <tr class="column_title">
            <th>글 번호
            </th>
            <th>글 제목
            </th>
            <th>작성자
            </th>
            <th>작성일
        </tr>
    </thead>';
        
    while ($row = mysqli_fetch_array($result)) {
		
        $escaped_title = htmlspecialchars($row['title']);

        // list 방식
        //$list .=  "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";


        //a 태그 
        //<a href=\"../VIEW/board.php?board_name={$board_name}&id={$row['id']}\">{$escaped_title}</a>
        // 테이블 방식
        $list .= "
        <tbody>
            <tr class=\"board_content\">
                <td>{$row['id']}</td>
                <td> 
                    <form action=\"".__rootpath."/view/board.php?board_name={$board_name}&id={$row['id']}\" method=\"post\">
                        <input type=\"hidden\" name=\"control_flag\" value=\"read\">
                        <button type=\"submit\"class=\"board_content\" >{$escaped_title}</button>  
                    </form> 
                </td>
                <td>{$row['name']}</td>
                <td>{$row['created']}</td>
            </tr>
        </tbody>";
    }
    
      echo  $list. 
    '</table>';
}
