function submit(hiddenField_name, hiddenField_value) {
//동적으로 보내야할 값만큼 늘려서 사용 가능할 것으로 보임 일단 은 
//정적으로 1개만 사용


    var form = document.createElement("form");

    form.setAttribute("charset", "UTF-8");

    form.setAttribute("method", "Post");  //Post 방식

    form.setAttribute("action", "/user/signup"); //요청 보낼 주소



    var hiddenField = document.createElement("input");

    hiddenField.setAttribute("type", "hidden");

    hiddenField.setAttribute("name", hiddenField_name);

    hiddenField.setAttribute("value", hiddenField_value);

    form.appendChild(hiddenField);



    // hiddenField = document.createElement("input");

    // hiddenField.setAttribute("type", "hidden");

    // hiddenField.setAttribute("name", "mEmail");

    // hiddenField.setAttribute("value", hiddenField_vlaue);

    // form.appendChild(hiddenField);



    document.body.appendChild(form);

    form.submit();

 }