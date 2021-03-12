<?php
// mysql 경로
//C:\Bitnami\wampstack-8.0.1-0\mysql\bin
//접속 명령어 ./mysql -uroot -p
// $ip = gethostbyname($_SERVER["HTTP_HOST"]);
// $port = "53216";
//  echo gethostbyname($_SERVER["HTTP_HOST"]); // 공인 아이피 받아오기 
//  echo $_SERVER["HTTP_HOST"]; // 도메인 받아오기 
//  echo $_SERVER['SERVER_PORT'];

//13.125.238.215
// $conn = mysqli_connect("localhost", "root", "12341234", "tnj_tutorial");
// $conn = mysqli_connect("{$ip}:53216", "root", "12341234", "tnj_tutorial");
$conn = mysqli_connect("54.180.26.214:58604", "root", "12341234", "tnj_tutorial");
// $conn =mysqli_connect("localhost", "tnj_guest", "@@##WWEE", "tnj_tutorial");
	
if(	mysqli_connect_error() )
{
?>
			<!-- <script> alert("접속 aht했어요");</script> -->
<?php
}
else
{
	?>
			<!-- <script> alert("접속 tjdrhd했어요");</script> -->
<?php
}

    if(isset($_SESSION['user_id'])){
        $sql = "select id
        from author
        where name=\"{$_SESSION['user_id']}\"";
    	$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		}


?>