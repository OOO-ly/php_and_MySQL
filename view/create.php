
<?php 

$_SESSION['user-id'] = 'hello';
?>

    <p contenteditable="true" class="article_title" id="editable_title" >
        제목을 입력해주세요
    </p>
    <P class="article_info">
        by  <a href="#">
                <?= $_SESSION['user-id'] ?>
            </a> 
    </P>
    <hr>
    <p contenteditable="true"  class="article_content" id="editable_text"> 
        내용을 입력해주세요
    </p>


<form id="form" action="../view/board.php?board_name=topic" method="POST" onsubmit="return getContent()">
    <input type="hidden" name="control_flag" value="read">
    <input id="form_title" style="display: none" name="test_title" />
    <textarea id="form_textarea" style="display:none" name="test_description"></textarea> 
    <input type="submit" />
</form>


<?php 
// session_destroy();
?>