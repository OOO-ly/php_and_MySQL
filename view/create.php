


<p contenteditable="true" class="article_title" id="editable_title" ></p>
    <P class="article_info">by <a href="#"><?= $_SESSION['user-id'] ?></a> </P>
    <hr>
    <p contenteditable="true"  class="article_content" id="editable_text"> '.$article['description'].' </p>';


<form id="form" action="../view/board.php?board_name=topic" method="POST" onsubmit="return getContent()">
    <input type="hidden" name="cotrol_read" value="read">
    <input id="form_title" style="display: none" name="test_title" />
    <textarea id="form_textarea" style="display:none" name="test_description"></textarea> 
    <input type="submit" />
</form>

