<?php

include 'mysql_conn.php';

$sql = "SELECT * from author";
$result = mysqli_query($conn, $sql);



include 'submit_flag.php';



//table 정의
$table_list='';  


    while ($row = mysqli_fetch_array($result)
    ) {
        $filterd = array(
            'id' => htmlspecialchars($row['id']),
            'name' => htmlspecialchars($row['name']),
            'pw' => htmlspecialchars($row['password']), // 당연히 숨겨야됨 
            'profile' => htmlspecialchars($row['profile'])
        );
        //"if(!confirm("sure?")){return false;}

        //저자 삭제 버튼 정의
        $delete_author_bt = '
        <form action="process_delete_author.php" method="POST" onsubmit="if(!confirm(\'진짜?\')){return false;};">
        <input type="hidden" name="id" value="'.$filterd['id'].'">
        <input type="submit" value="delete">
        </form>';
        
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

$form_author ='';
$label_submit = 'Create_author';
//id 가 있으면 create 없으면 수정
//update가 db다시 접근하면서 느려짐...
if(!isset($_GET['id'])){
    //저자 생성 폼
    $form_author= '
    <form action="process_create_author.php" method="post"';
    //$form_author .=submit_flag();
    $form_author .= '>
    <p><label for="input_id">아이디</label>
    <input type="text" name="name" id=" input_id" ></p>
    <p><label for="input_id">비밀번호</label>
    <input type="password" name="password" id="input_pw"></p>
    <p><textarea name="profile"  cols="30" rows="10" placeholder="Profile"></textarea></p>
    <p><input type="submit"value="'.$label_submit.'"></p>
    </form>';
}else{
    
    $filterd_id = mysqli_real_escape_string($conn,$_GET['id']);
    settype($filterd_id,'integer');
    $label_submit = 'Update_submit';    
    $sql = "SELECT * from author where id={$filterd_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result); 
    $escaped = array(
        'name' => htmlspecialchars($row['name']),
        'profile' => htmlspecialchars($row['profile']),
        'id' => htmlspecialchars($row['id'])
    );
    $form_author ='
    <form action="process_update_author.php" method="post" onsubmit="<?php submit_flag() ?>">
    <input type="hidden" name="id" value="'.$escaped['id'].'">
    <p><input type="text" name="name" value="'.$escaped['name'].'"></p>
    <p><textarea name="profile" cols="30" rows="10" placeholder="Profile">'.$escaped['profile'].'</textarea></p>
    <p><input type="submit"value="'.$label_submit.'"></p>
    </form>';

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><a href="author.php">test</a></h1>
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



    <?=$form_author ?>
    <?=$delete_author_bt?>
</body>

</html>