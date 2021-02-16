<?php 
function read_article($conn, $board_name,$article_id)
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
        where {$board_name}.id={$article_id}";
    
        $result = mysqli_query($conn, $sql);
        $article = mysqli_fetch_array($result);


    echo 
        
   '<p class="article_title">'.$article['title'].'</p>
    <P class="article_info">by <a href="#">'.$article['name'].'</a> <time> 작성일  '.$article['created'].'</time></P>
    <hr>
    <p class="article_content"> '.$article['description'].' </p>';

}
