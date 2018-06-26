<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
    	<title>HOME</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="owl.carousel.min.css">
        <link rel="stylesheet" href="owl.theme.default.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>
	<div id="top">
    	<ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="t-shirt.php">T-Shirt</a></li>
          <li><a href="aksesoris.php">Aksesoris</a></li>
          <li><a href="item.php">Item</a></li>
          <!--
          <form action="<?php //htmlspecialchars($_SERVER["PHP_SELF"]); ?> proses_login.php" method="post">
          <li style="margin-top:14px;margin-left:250px;;color:#FFF;">Username <input type="text" name="username" placeholder="username"> Password <input type="password" name="password" placeholder="password">

          	<input type="submit" name="submit" value="Login">
          -->
          
          <li>
          <!-- CART -->
          	<input type="button" style="background-image:url(cart2.png);margin-top:14px;height:30px;width:35px; ">
          <!-- CART -->
          </li>
          </form>
        </ul>
    </div>
    <!-- POP UP REGISTER -->
    	 	<a href="#x" class="overlay" id="register"></a>
        <div class="popup">
            <h2>Sign Up</h2>
            <p>Please enter your details here</p>
           		 <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                 		<div>
                         <label for="nama">Nama</label>
                         <input type="text" name="nama" class="nama">
                        </div>
                        <div>
                         <label for="password">Password</label>
                         <input type="password" name="password" class="password">
                        </div>
                        <div>
                         <label for="email">Email</label>
                         <input type="text" name="email" class="email">
                        </div>
                        <div>
                         <label for="no_telpon">No Telpon</label>
                         <input type="text" name="no_telpon" class="notelpon">
                        </div>
                        <div>
                       	 <label for="alamat">Alamat</label>
                         <textarea name="alamat" class="alamat" rows="2"></textarea>
                        </div>
                        <div>
                         <label for="id_steam">Id Steam</label>
                         <input type="text" name="id_steam" class="idsteam">
                        </div>
                        <?php  
							include "proses_login.php";
						            ?>
                       <input type="submit" name="button" value="Register">
              </form>
               <a class="close" href="#close"></a>
        </div>
     <!-- POP UP REGISTER -->
     <!-- POP UP SIGN UP -->
        <a href="#x" class="overlay1" id="signup"></a>
        <div class="popup1">
            <h2>Sign Up</h2>
            <p>Please enter your details here</p>
               <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div>
                      <label for="username">Username</label>
                      <input type="text" name="username" placeholder="username">
                    </div>
                    <div>
                      <label for="password">Password</label>
                      <input type="password" name="password" placeholder="password">
                    </div>
                    <input type="submit" name="submit" value="Sign in" style="width:100%;">
              </form>
              <a class="close1" href="#close1"></a>
        </div>
     <!-- POP UP REGISTER -->

     <!-- PROSES DAFTAR -->
						   <?php 
                            include "config.php";
                        
                            //create connection
                            $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB);
                        
                            $nama = $password = $email = $no_telpon = $alamat = $id_steam = "";
                            
                            //check connection
                            if(!$conn){
                                die("Connection failed: ".$conn->connect_error);
                            }
                            else{
                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $nama = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $no_telpon = filter_input(INPUT_POST, "no_telpon", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);						
                                    $alamat = filter_input(INPUT_POST, "alamat", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $id_steam = filter_input(INPUT_POST, "id_steam", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    
                                    
                                    //validasi format email
                                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        die("Invalid Email Format!");
                                    }
                                    
                                    //validasi kesamaan data yg di input dengan isi di database
                                    $sql_cek = "select * from user where email='$email'";
                                    $cek_result = $conn->query($sql_cek);
                                    
                                    if(!$cek_result){
                                        echo "Errormessage: %s\n", $conn->error;
                                    }
                                    else{
                                        if($cek_result->num_rows > 0){
                                            echo "Email: ".$email." Sudah Ada!";
                                        }
                                        else{
                                            $sql_insert = "insert into user(nama,password,email,no_telpon,alamat,id_steam) values('$nama','$password','$email','$no_telpon','$alamat','$id_steam')";
                                        
                                            if(!$conn->query($sql_insert)){
                                                echo "Errormessage: %s\n", $conn->error;
                                            }
                                            else{
                                                echo "<script>alert('data tersimpan!');location.href='index.php';</script>";
                                            }
                                        }
                                    }
                                }
                            }
                          ?>
    <!-- PROSES DAFTAR -->
  <div id="kata-kata">
  	<div style="margin-top:250px;">
    	<a href="#signup"><input type="button" value="Sign Up"></a>
        <a href="#register"><input type="button" value="Register"></a>
    	Welome to DOSA (Dota Store Accesories)<br>
		blablablablalbalbala 
    </div>
  </div>
    
    <!-- SLIDER -->
    	<div id="slider" style="width: 100%; height:500px;">
    			<div class="owl-carousel owl-theme">
        			<div class="item" style="max-height: 500px;">
            			<img src="img/3.jpg" height="100%">
        			</div>
        			<div class="item" style="max-height: 500px">
            			<img src="img/dota_2_grey_wallpaper_by_ekaansh-d6nxtuz.jpg" height="100%">
        			</div>
        			<div class="item" style="max-height: 500px">
            			<img src="img/invoker_dota2_chibi_by_koronalucifer-d8a3y0j.png" height="100%">
        			</div>
    			</div>
			</div>
			<script src="jquery-3.3.1.js"></script>
			<script src="owl.carousel.min.js"></script>
			<script type="text/javascript">
            $(document).ready(function(e) {
                $('div#slider').find('.owl-carousel').owlCarousel({
                    nav: false,
                    autoplay: true,
                    loop: true,
					smartSpeed: 500,
					responsive: {
						0: {
							items: 1	
						},
						500: {
							items: 1	
						},
						1000: {
							items: 1	
						},	
					}
				});
			});
			</script>
      <!-- SLIDER -->


      <!-- T-SHIRT -->
        <div id="conten-baju">
            <div style="font-size: 50px;color:#FFFFFF;text-align:center;">
                T-Shirt
            </div>
        <div class="container" style=" box-shadow: 10px 10px 8px 10px #888888;">
          <div class="row">
                <?php 
                    include "config.php";
                    $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB);

                    $query = "select * from produk";
                    $exec = $conn->query($query);
                    $rows = $exec->num_rows;

                    if ($rows > 0) {
                                 
                ?>
                <?php while($item = $exec->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="item-container">
                      <div class="thumb" style="background: url(<?php echo "uploads/".$item['image']; ?>)"></div>
                        <table border="0" width="100%">
                      <tr>
                          <td align="right">Nama</td>
                            <td>:</td>
                            <td><?php echo $item['nama']; ?></td>
                        </tr>
                        <tr>
                          <td align="right">Size</td>
                            <td>:</td>
                            <td><?php echo $item['size']; ?></td>
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
                        <tr>
                          <td><input type="button" name="button" value="Cart"></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <?php endwhile; } ?>        
            </div>
            </div>
      <!-- T-SHIRT -->
      
      <!-- AKSESORIS -->
      <div id="content-acc">
            <div style="font-size: 50px;color:#FFFFFF;text-align:center;">
                Aksesoris
            </div>
        <div class="container" style="box-shadow: 10px 10px 8px 10px #888888;">
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
                <div class="col-md-3">
                    <div class="item-container">
                      <div class="thumb" style="background: url(<?php echo "uploads/".$item['image']; ?>)"></div>
                        <table border="0" width="100%">
                      <tr>
                          <td align="right">Nama</td>
                            <td>:</td>
                            <td><?php echo $item['nama']; ?></td>
                        </tr>
                        <tr>
                          <td align="right">Size</td>
                            <td>:</td>
                            <td><?php echo $item['size']; ?></td>
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
                        <tr>
                          <td><input type="button" name="button" value="Cart"></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <?php endwhile; } ?>        
            </div>
        </div>
        </div>
      <!-- T-SHIRT -->

       <!-- ITEM -->
        <div id="conten-item">
            <div style="font-size: 50px;color:#FFFFFF;text-align:center;">
                T-Shirt
            </div>
        <div class="container" style=" box-shadow: 10px 10px 8px 10px #888888;">
          <div class="row">
                <?php 
                    include "config.php";
                    $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB);

                    $query = "select * from item";
                    $exec = $conn->query($query);
                    $rows = $exec->num_rows;

                    if ($rows > 0) {
                                 
                ?>
                <?php while($item = $exec->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="item-container">
                      <div class="thumb" style="background: url(<?php echo "uploads/".$item['image']; ?>)"></div>
                        <table border="0" width="100%">
                      <tr>
                          <td align="right">Nama</td>
                            <td>:</td>
                            <td><?php echo $item['nama']; ?></td>
                        </tr>
                        <tr>
                          <td align="right">Harga</td>
                            <td>:</td>
                            <td><?php echo $item['harga']; ?></td>
                        </tr>
                        <tr>
                          <td><input type="button" name="button" value="Cart"></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <?php endwhile; } ?>        
            </div>
            </div>
      <!-- ITEM -->
 
      
      
</body>
</html>