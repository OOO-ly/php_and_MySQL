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

        switch($board_name)
        {
            case 'topic':
                $board_title = '공지사항';
                break;
            case 'topic2':
                $board_title = 'Q &amp; A';
                break;

        }
            
    echo '
    <p>
    <h2 class="board_title create_board">
    <a href="'.__rootpath.'/view/board.php?board_name='.$board_name.'">
   '.$board_title.'
    </a>
    </h2>
    </p>
   <p class="article_title">'.$article['title'].'</p>
    <P class="article_info">by <a href="./author_modify.php">'.$article['name'].'</a> <time> 작성일  '.$article['created'].'</time></P>
    <hr>
    <p class="article_content"> '.$article['description'].' </p><hr>';
    $_SESSION['article_author'] = $article['name'];
}
