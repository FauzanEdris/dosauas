<?php
	session_start();
	require("koneksi.php");

	$username = $_POST["username"];
	$password = $_POST["password"];

	$admin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
	$user = "SELECT * FROM user WHERE nama = '$username' AND password = '$password'";
	/*
	if (mysqli_num_rows(mysqli_query($conn, $admin)) == 1) {
		echo("Halaman Admin");
	} else if (mysqli_num_rows(mysqli_query($conn, $user)) == 1) {
		echo("Halaman User");
	} else {
		echo("Login Gagal");
	}*/

	$resultAdmin = $conn->query($admin);
	$resultUser = $conn->query($user);

	if ($resultAdmin->num_rows == 1) {
		$_SESSION['username'] = $username;
		echo "<script>alert('selamat datang $username'); location.href='admin.php';</script>";
	} else if ($resultUser->num_rows == 1) {
		echo ("Halaman User");
	} else {
		
	}
		/*
          include "config.php";
          $conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
          
          if(!$conn){
           die("data is not connected".$conn->connect_error); 
          }else{
          if($_SERVER["REQUEST_METHOD"]=="POST"){  
          $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
          $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

          $sql_show ="SELECT * FROM admin where username = '$username' AND password ='$password' ";
          $query_show = $conn->query($sql_show);
          
          if($query_show->num_rows > 0){            
            while($row = $query_show->fetch_assoc()){
             if($username==$row["username"] AND $password==$row["password"]){
               $_SESSION['username']=$username;
               $_SESSION['password']=$password;
			   
			   echo "<script>alert('selamat datang'); location.href='admin.php';</script>";
			  // session_start();                 
             }
            }
          }else{
               echo "<script>alert('maaf, username atau Password anda belum terdaftar, silahkan daftar terlebih dahulu')</script>";
              }
         }
		} 
		*/
?>