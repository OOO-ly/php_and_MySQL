<?php

if(isset($_POST['test_title']))
{

    echo 
    '<hr>
    <p class="article_title">'.$_POST['test_title'].'</p>
  
    <hr>
    <p class="article_content"> '.$_POST['test_description'].' </p>';
}

?>
<!-- 
<P class="article_info">by <a href="#">'.$article['name'].'</a> <time> 작성일  '.$article['created'].'</time></P> -->