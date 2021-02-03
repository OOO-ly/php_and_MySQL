<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello, world!</title>
     <link rel="stylesheet" href="./modal_style.css" type="text/css">
</head>

<body>
    <h1>Hello, world!</h1>

    <button id="open">Open</button>
    <div class="modal hidden">
        <div class="modal_overlay"></div>
        <div class="modal__content">
            <h3>삭제할 아이디를 입력해주세요</h3>
            <button> 취소 </button>
        </div>
    </div>
    <script language="javascript" type="text/javascript" src="./modal.js"></script>
</body>

</html>