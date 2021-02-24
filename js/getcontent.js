function getContent() {
   
    document.getElementById("form_title").value = document.getElementById("editable_title").innerHTML;
    document.getElementById("form_textarea").value = document.getElementById("editable_text").innerHTML;
   
    if (div_val == '') {
        alert("제목을 입력해주세요");
        return false;
        //empty form will not be submitted. You can also alert this message like this.
    }

}