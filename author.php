<?php

$conn = mysqli_connect("localhost", "root", "12341234", "tnj_tutorial");
$sql = "SELECT * from author";
$result = mysqli_query($conn, $sql);

//table 정의
$table_row_def='';  


    while ($row = mysqli_fetch_array($result)
    ) {
        $filterd = array(
            'id' => htmlspecialchars($row['id']),
            'name' => htmlspecialchars($row['name']),
            'profile' => htmlspecialchars($row['profile'])
        );
        //"if(!confirm("sure?")){return false;}
        $delete_author_bt = '
        <form action="process_delete_author.php" method="POST" onsubmit="if(!confirm(\'진짜?\')){return false;};">
        <input type="hidden" name="id" value="'.$filterd['id'].'">
        <input type="submit" value="delete">
        </form>';
    $table_row_def .= "
        <tr>
            <td>{$filterd['id']}</td>
            <td>{$filterd['name']}</td>
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
    $form_author= '
    <form action="process_create_author.php" method="post">
    <p><input type="text" name="name" placeholder="Name"></p>
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
    <form action="process_update_author.php" method="post">
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
    <h1><a href="author.php">dynimic SQL</a></h1>
    <p><a href="index.php">topic</a></p>

    <table border="1">
    
        <tr>
            <td>id
            </td>
            <td>name
            </td>
            <td>profile
            </td>
            <td>
            </td>
            <td>
            </td>
        </tr>
    <?= $table_row_def ?>

    </table>



    <?=$form_author ?>
    <?=$delete_author_bt?>
</body>

</html>