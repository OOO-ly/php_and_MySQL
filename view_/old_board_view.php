<!-- old style -->
<?php   
    //게시판 이름이 유효한 게시판 이름이라면
    if($_GET['board_name'] == "topic2"){
      //게시글 id가 있다면 게시글 출력
        if(isset($_GET['id'])){read_article($conn, $_GET['board_name'],$_GET['id']);}
        //게시글 id가 없다면 게시글 리스트  
        else{new_article_create($conn,$_GET['board_name'],20);} 
    } 
?>