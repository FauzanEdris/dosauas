<?php 
                            include "config.php";
                        
                            //create connection
                            $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB);
                        
                            $nama = $size = $bahan = $harga = "";
                            
                            //check connection
                            if(!$conn){
                                die("Connection failed: ".$conn->connect_error);
                            }
                            else{
                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $id = $_POST['id'];
                                    $nama = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_STRING, 
                                            FILTER_FLAG_NO_ENCODE_QUOTES);
                                    $size = filter_input(INPUT_POST, "size", FILTER_SANITIZE_STRING, 
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
                                    
                                    //validasi kesamaan data yg di input dengan isi di database
                                    $sql_cek = "select * from produk where nama='$nama'";
                                    $cek_result = $conn->query($sql_cek);
                                    
                                    if(!$cek_result){
                                        echo "Errormessage: %s\n", $conn->error;
                                    }
                                    else{
                                        if($cek_result->num_rows > 0){
                                            echo "Nama: ".$nama." Sudah Ada!";
                                        }
                                        else{
                                            if ($filename) {

                                                $sql_update = "update produk set nama='$nama', size='$size', bahan='$bahan', harga='$harga', image='$filename' where id=$id";
                                                $exec = $conn->query($sql_update);
                                                unlink($folder.$filename);
                                                if(!$exec){
                                                    echo "Errormessage: %s\n", $conn->error;
                                                }
                                                else{
                                                    move_uploaded_file($tmpname, $folder.$filename);
                                                    echo "<script>alert('data tersimpan!');location.href='admin.php';</script>";
                                                }

                                            }else{
                                                $sql_update = "update produk set nama='$nama', size='$size', bahan='$bahan', harga='$harga' where id=$id";
                                                $exec = $conn->query($sql_update);
                                                if(!$exec){
                                                    echo "Errormessage: %s\n", $conn->error;
                                                }
                                                else{
                                                    move_uploaded_file($tmpname, $folder.$filename);
                                                    echo "<script>alert('data tersimpan!');location.href='admin.php';</script>";
                                                }                                                
                                            }
                                        }
                                    }
                                }
                            }
                          ?>
     <!-- -->