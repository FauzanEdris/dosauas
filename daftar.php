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