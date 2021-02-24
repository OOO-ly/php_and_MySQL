<?php
include "../model/mysql_conn.php";
session_start();

// die(var_dump(
// $_POST['edit_title'],
// $_POST['']

// ));
$filtered = array(

    'title' => mysqli_real_escape_string($conn, $_POST['edit_title']),
    'description' => mysqli_real_escape_string($conn, $_POST['edit_description']),
    //'author_id' => mysqli_real_escape_string($conn, $_POST['author_id']),//legacy
    'board_name' => 
    mysqli_real_escape_string($conn, $_POST['board_name']),
    'user_id' => mysqli_real_escape_string($conn, $_SESSION['user_id'])
);




$sql = "
    INSERT INTO {$filtered['board_name']}
    (title, description, author_id, created)
    VALUES( 
        '{$filtered['title']}',
        '{$filtered['description']}',
        '{$filtered['user_id']}',
        NOW()
        )
";

$sql = "
    INSERT INTO {$filtered['board_name']}";


// $result =
die(var_dump(
     mysqli_query($conn, $sql)
        ));

if ($result == false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    echo mysqli_error($conn);
    error_log(mysqli_error($conn));
    unset($filtered);
} 
else {
    // $test = mysqli_query($conn, "SELECT * from topic order by id  desc limit 1");
    // $row = mysqli_fetch_array($test);
    $sql =
    "SELECT MAX(id) FROM {$filtered['board_name']} where name='{$filtered['user_id']}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <script>
        var form = document.createElement("form");

        form.setAttribute("charset", "UTF-8");
        form.setAttribute("method", "Post");  
        form.setAttribute("action", "../view/board.php?board_name<?= $filtered['board_name'] ?>&id=<?= $row[0] ?>"); 

        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", control_flag);
        hiddenField.setAttribute("value", read);
        form.appendChild(hiddenField);

        document.body.appendChild(form);

        form.submit();
    </script>
<?php



} ?>



