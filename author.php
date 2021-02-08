<?php

include 'mysql_conn.php';

$sql = "SELECT * from author";
$result = mysqli_query($conn, $sql);

//table 정의
$table_list = '';


while ($row = mysqli_fetch_array($result)) {
    $filterd = array(
        'id' => htmlspecialchars($row['id']),
        'name' => htmlspecialchars($row['name']),
        'pw' => htmlspecialchars($row['password']), // 당연히 숨겨야됨 
        'profile' => htmlspecialchars($row['profile'])
    );
    //"if(!confirm("sure?")){return false;}

    //저자 삭제 버튼 정의
    // $delete_author_bt = '
    // <form action="process_delete_author.php" method="POST" onsubmit="if(!confirm(\'진짜?\')){return false;};">
    // <input type="hidden" name="id" value="'.$filterd['id'].'">
    // <input type="submit" value="delete">
    // </form>';


    // $delete_author_bt = '
    // <form action="process_delete_author.php" method="POST">
    // <input type="hidden" name="id" value="'.$filterd['id'].'">
    // <input type="submit" value="delete">
    // </form>';



    // delete modal 
    // 스타일과 기능을 반복 ( 클래스는 상수로 )


    $delete_author_bt = '
    <style type="text/css">
.modal' . $filterd['id'] . '{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal_overlay' . $filterd['id'] . '{
    background-color: rgba(0, 0, 0, 0.6);
    width: 100%;
    height: 100%;
    position: absolute;
}
.modal__content' . $filterd['id'] . '{
    background-color: salmon;
    padding: 50px 100px;
    text-align: center;
    position: relative;
    top: 0px;
    width: 20%;
    
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19),0 6px 6px  rgba(0, 0, 0, 0.23);
    border-radius: 10px;   


}
h3{
    margin: 0;
}
.hidden' . $filterd['id'] . '{
    display: none;
}
</style>


        <button id="delete' . $filterd['id'] . '">delete</button>
        <div class="modal' . $filterd['id'] . ' hidden' . $filterd['id'] . '">
            <div class="modal_overlay' . $filterd['id'] . '"></div>
            <div class="modal__content' . $filterd['id'] . '">
                <h3>삭제할 아이디를 입력해주세요</h3>
                    <form id="detete_form" action="process_delete_author.php" method="POST">
                        <input type="hidden" name="id" value="' . $filterd['id'] . '">
                        <p><label for="delete_id_input">아이디</label>
                        <input type="text" id="delete_id_input" name="name"></p>
                        <p><label for="delete_pw_input">비밀번호</label>
                        <input type="password" id="delete_pw_input" name="password"></p>
                        <input type="submit"  value="저자 삭제" onclick="doublecheck();">
                    </form>
                <button> 취소 </button>
            </div>
        </div>

        <script>
        

        
        
        const openBt' . $filterd['id'] . ' = document.getElementById("delete' . $filterd['id'] . '");
        const modal' . $filterd['id'] . ' = document.querySelector(".modal' . $filterd['id'] . '");
        const overlay' . $filterd['id'] . ' = modal' . $filterd['id'] . '.querySelector(".modal_overlay' . $filterd['id'] . '");
        const closebt' . $filterd['id'] . ' = modal' . $filterd['id'] . '.querySelector("button");

        const openModal' . $filterd['id'] . '= () => {
            modal' . $filterd['id'] . '.classList.remove("hidden' . $filterd['id'] . '");
        }
        const closeModal' . $filterd['id'] . '= () =>{
            modal' . $filterd['id'] . '.classList.add("hidden' . $filterd['id'] . '");
        }

        overlay' . $filterd['id'] . '.addEventListener("click",closeModal' . $filterd['id'] . ');
        closebt' . $filterd['id'] . '.addEventListener("click",closeModal' . $filterd['id'] . ');
        openBt' . $filterd['id'] . '.addEventListener("click",openModal' . $filterd['id'] . ');

        
        </script>';
    //-----

    // <h3>삭제할 아이디를 입력해주세요</h3>
    //     <form action="process_delete_author.php" method="POST">
    //     <input type="hidden" name="id" value="'.$filterd['id'].'">
    //     <input type="submit" value="delete">
    //     </form>;


    //저자 리스트 
    $table_list .= "
        <tr>
            <td>{$filterd['id']}</td>
            <td>{$filterd['name']}</td>
            <td>{$filterd['pw']}</td>
            <td>{$filterd['profile']}</td>
            <td><a href=\"author.php?id={$filterd['id']}\">update</a></td>
            <td>
            {$delete_author_bt}
            </td>

        </tr>";
}
//'<a href="process_delete.php?id='.$filtered_id.'">delete</a>';


$escaped = array(
    'name' => '',
    'profile' => '',
    'id' => ''
);

$form_author = '';
$label_submit = 'Create_author';
//id 가 있으면 create 없으면 수정
//update가 db다시 접근하면서 느려짐...
if (!isset($_GET['id'])) {
    //저자 생성 폼
    $form_author = '
    <form action="process_create_author.php" method="post"';
    //$form_author .=submit_flag();
    $form_author .= '>
    <p><label for="input_id">아이디</label>
    <input type="text" name="name" id=" input_id" ></p>
    <p><label for="input_id">비밀번호</label>
    <input type="password" name="password" id="input_pw"></p>
    <p><textarea name="profile"  cols="30" rows="10" placeholder="Profile"></textarea></p>
    <p><input type="submit" id="oncecreate_test" value="' . $label_submit . '" onclick="insert();"></p>
    </form>';
} else {

    $filterd_id = mysqli_real_escape_string($conn, $_GET['id']);
    settype($filterd_id, 'integer');
    $label_submit = 'Update_submit';
    $sql = "SELECT * from author where id={$filterd_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $escaped = array(
        'name' => htmlspecialchars($row['name']),
        'profile' => htmlspecialchars($row['profile']),
        'id' => htmlspecialchars($row['id'])
    );
    $form_author = '
    <form action="process_update_author.php" method="post" onsubmit="<?php submit_flag() ?>">
    <input type="hidden" name="id" value="' . $escaped['id'] . '">
    <p><input type="text" name="name" value="' . $escaped['name'] . '"></p>
    <p><textarea name="profile" cols="30" rows="10" placeholder="Profile">' . $escaped['profile'] . '</textarea></p>
    <p><input type="submit"value="' . $label_submit . '"></p>
    </form>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>회원가입</title>
    <script src="./doublesubmitcheck.js"></script>

</head>

<body>
    <h1><a href="author.php">회원가입</a></h1>
    <p><a href="index.php">게시판</a></p>
    <table border="1">

        <tr>
            <td>id
            </td>
            <td>name
            </td>
            <!-- 비밀번호 삭제 요망 -->
            <td>pw
            </td>
            <td>profile
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
        <?= $table_list ?>

    </table>
    





    <?= $form_author ?>

</body>

</html>