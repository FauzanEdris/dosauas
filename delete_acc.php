<?php
	include "config.php";

	$id = $_GET['id'];
	
	//create connection
	$conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB);

	$sql_delete = "delete from aksesoris where id=$id;";
	$query = $conn->query($sql_delete);

	if($query){
		echo "<script>location.href='admin_acc.php'</script>";
	}
?>