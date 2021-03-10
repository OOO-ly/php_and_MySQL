<?php
// mysql 경로
//C:\Bitnami\wampstack-8.0.1-0\mysql\bin
//접속 명령어 ./mysql -uroot -p

// $conn = mysqli_connect("localhost", "root", "12341234", "tnj_tutorial");
$conn = mysqli_connect("52.79.205.251:54425", "root", "12341234", "tnj_tutorial");
// $conn =mysqli_connect("localhost", "tnj_guest", "@@##WWEE", "tnj_tutorial");
	
if(	mysqli_connect_error() )
{
?>
			<script> alert("접속 aht했어요");</script>
<?php
}
else
{
	?>
			<script> alert("접속 tjdrhd했어요");</script>
<?php
}

    if(isset($_SESSION['user_id'])){
        $sql = "select id
        from author
        where name=\"{$_SESSION['user_id']}\"";
    	$result = mysqli_query($conn, $sql);
		?>
			<script> alert("접속 했어요");</script>
		<?php
		$row = mysqli_fetch_array($result);
		}


?>