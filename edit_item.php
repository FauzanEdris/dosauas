<?php
include "config.php";

$id = $_GET['id'];
//create connection
$conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB);

//cek koneksi
if(!$conn){
	die("Connection failed: ".$conn->connect_error);
}
else{
	if(isset($id)){
		$query = "select * from item where id=$id";
		$exec = $conn->query($query);
		$produk = $exec->fetch_object();
	}
}

 ?>

<!DOCTYPE html>
<html>
 <head>
  <h1>FORM EDIT</h1>
 </head> 
 <body>
  <form action="update_item.php" method="POST" enctype="multipart/form-data">
  	<input type="hidden" name="id" value="<?php echo $produk->id; ?>">
   <div>
   	<label for="image">Gambar</label>
   	 <input type="file" name="image">
   </div>
   <div>
   	<label for="nama">Nama</label>
   	<input type="text" name="nama" value="<?php echo $produk->nama; ?>" required>
   </div>
   <div>
    <label for="harga">Harga</label>
    <input type="text" name="harga" value="<?php echo $produk->harga; ?>" required>
   </div>
   <input type="submit" name="update" value="Update">
  </form>
  <img src="uploads/<?php echo $produk->image; ?>" width="200px">
 </body>
</html>	 