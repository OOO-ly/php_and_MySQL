<?php

include '../model/mysql_conn.php';


                $filtered = array(

                    'name' => mysqli_real_escape_string($conn, $_POST['user_id']),
                    'password' => mysqli_real_escape_string($conn, $_POST['user_pw']),
                    'profile' => mysqli_real_escape_string($conn, $_POST['user_profile']),
                );

                // die(var_dump($_POST));

                $sql = "
                    INSERT INTO author
                    (name, password, profile)
                    VALUES(
                        '{$filtered['name']}',
                        '{$filtered['password']}',
                        '{$filtered['profile']}'
                        )
                ";

                $result = mysqli_query($conn, $sql);


                if (!$result) {
                    if(mysqli_errno($conn) == 1062)
                    {   session_start();
                        if($_SESSION['flag'] != 'sign_up_succeed'){       
                            $_SESSION['flag'] = 'failed_sign_up_1062';
                            $prevPage = $_SERVER['HTTP_REFERER'];
                            header('location:'.$prevPage);
                            die();
                        }
                        $prevPage = $_SERVER['HTTP_REFERER'];
                        header('location:'.$prevPage);
                        die();
                    }
                    else if($filtered['name'] = '')
                    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
                    echo mysqli_errno($conn);
                    echo mysqli_error($conn);
                    error_log(mysqli_error($conn));
                    die();
                } else {
                    session_start();
                    $_SESSION['user_id'] = $_POST['user_id'];
                    $_SESSION['flag'] = 'sign_up_succeed';
                    $prevPage = $_SERVER['HTTP_REFERER'];
                    // header('location:'.$prevPage);
                    //혹은 메인 페이지로 갈 수도 있음
                    header('location: ../index.php');
                    die();
                }


   
?>