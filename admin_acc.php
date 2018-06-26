<?php
	session_start();
	
	if(empty($_SESSION['username'])){
		echo "<script>location.href = 'index.php'</script>";
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
    	<title></title>
        <link rel="stylesheet" href="style_admin.css">
        <link rel="stylesheet" href="owl.carousel.min.css">
        <link rel="stylesheet" href="owl.theme.default.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
	<div id="top">
    	<ul>
          <li><a class="active" href="admin.php">T-Shirt</a></li>
          <li><a href="admin_acc.php">Aksesoris</a></li>
          <li><a href="admin_item.php">Item</a></li>
          <li style="color:#FFF;margin-top:14px;margin-left:60%;">Selamat datang : <?php echo $_SESSION['username']; ?></li>
          <li><a href="logout.php"><input type="button" value="Logout"></a></li>
        </ul>
    </div>
    	
    <div id="content">
    	<a href="#tambah"><input type="button" align="texttop" value="+" style="font-size:25px;width:36px;height:36px;"></a>
        <div class="container">
        	<div class="row">
                <?php 
                    include "config.php";
                    $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB);

                    $query = "select * from aksesoris";
                    $exec = $conn->query($query);
                    $rows = $exec->num_rows;

                    if ($rows > 0) {
                                 
                ?>
                <?php while($item = $exec->fetch_assoc()): ?>
                <div class="col-md-3" style="margin-bottom: 50px;">
                    <div class="item-container">
                    	<div class="thumb" style="background: url(<?php echo "uploads/".$item['image']; ?>)"></div>
                        <table border="0" width="100%">
                    	<tr>
                        	<td align="right">Nama</td>
                            <td>:</td>
                            <td><?php echo $item['nama']; ?></td>
                        </tr>
                        <tr>
                        	<td align="right">Jenis</td>
                            <td>:</td>
                            <td><?php echo $item['jenis']; ?></td>
                        </tr>
                        <tr>
                        	<td align="right">Berat</td>
                            <td>:</td>
                            <td><?php echo $item['berat']; ?></td>
                        </tr>
                        <tr>
                        	<td align="right">Bahan</td>
                            <td>:</td>
                            <td><?php echo $item['bahan']; ?></td>
                        </tr>
                         <tr>
                            <td align="right">Harga</td>
                            <td>:</td>
                            <td><?php echo $item['harga']; ?></td>
                        </tr>
                        <tr align="right">
                            <td><a href="edit_acc.php?id=<?php echo $item['id'] ?>">Edit</a>
                            <a href="delete_acc.php?id=<?php echo $item['id'] ?>">Delete</a></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <?php endwhile; } ?>        
            </div>
        </div>
        
     <!-- POP UP INPUT -->
    	 	<a href="" class="overlay" id="tambah"></a>
        <div class="popup">
            <h2>INPUT</h2>
            <p>Please enter your details here</p>
           		<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                       	 <label for="detail">Detail</label>
                         	
                            <div>
                                <label for="nama">Gambar</label>
                                <input type="file" name="image" accept="image/*">
                            </div>
                            <div>
                            	<label for="nama">Nama</label>
                                <input type="text" name="nama" placeholder="nama">
                            </div>
                         	<div>
                            	<label for="jenis">Jenis</label>
                                <input type="text" name="jenis" placeholder="size">
                            </div>
                            <div>
                            	<label for="berat">Berat</label>
                                <input type="text" name="berat" placeholder="bahan">
                            </div>
                            <div>
                            	<label for="bahan">Bahan</label>
                                <input type="text" name="bahan" placeholder="harga">
                            </div>
                            <div>
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" placeholder="harga">
                            </div>
                            <input type="submit" name="button" value="input">
                        </div>
                        </form>
     <!-- POP UP INPUT -->
     <!-- -->
     	 <?php 
                            include "config.php";
                        
                            //create connection
                            $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB);
                        
                            $nama = $jenis = $berat = $bahan = $harga ="";
                            
                            //check connection
                            if(!$conn){
                                die("Connection failed: ".$conn->connect_error);
                            }
                            else{
                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $nama = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $jenis = filter_input(INPUT_POST, "jenis", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $berat = filter_input(INPUT_POST, "berat", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $bahan = filter_input(INPUT_POST, "bahan", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $harga = filter_input(INPUT_POST, "harga", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $image = $_FILES['image'];

                                    $filename = $image['name'];
                                    $tmpname = $image['tmp_name'];
                                    $folder = 'uploads/';
                                    unset($image);

                                    move_uploaded_file($tmpname, $folder.$filename);			
                                   
                                    
                                    //validasi kesamaan data yg di input dengan isi di database
                                    $sql_cek = "select * from aksesoris where nama='$nama'";
                                    $cek_result = $conn->query($sql_cek);
                                    
                                    if(!$cek_result){
                                        echo "Errormessage: %s\n", $conn->error;
                                    }
                                    else{
                                        if($cek_result->num_rows > 0){
                                            echo "Nama: ".$nama." Sudah Ada!";
                                        }
                                        else{
                                            $sql_insert = "insert into aksesoris(nama,jenis,berat,bahan,harga,image) values('$nama','$jenis','$berat','$bahan','$harga','$filename')";
                                        
                                            if(!$conn->query($sql_insert)){
                                                echo "Errormessage: %s\n", $conn->error;
                                            }
                                            else{
                                                echo "<script>alert('data tersimpan!');location.href='admin_acc.php';</script>";
                                            }
                                        }
                                    }
                                }
                            }
                          ?>
     <!-- -->
     
    </div>
      
</body>
</html>