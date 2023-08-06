<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
session_start();
        if(isset($_POST['username'])){
				//connection
                  include("connectDB.php");
				//รับค่า user & password
                  $Username = $_POST['username'];
                  $Password = md5($_POST['password']);
				//query 
                  $sql="SELECT * FROM user WHERE username='".$Username."' AND password='".$Password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["User_ID"] = $row["User_ID"];
                      $_SESSION["username"] = $row["username"];
                      $_SESSION["User_first"] = $row["User_first"];
                      $_SESSION["User_last"] = $row["User_last"];
                      $_SESSION["user"] = $row["User_first"]." ".$row["User_last"];
                      $_SESSION["email"] = $row["email"];
                      $_SESSION["User_address"] = $row["User_address"];
                      $_SESSION["User_tel"] = $row["User_tel"];
                      $_SESSION["userstatus"] = $row["userstatus"];

                      if($_SESSION["userstatus"]=="Admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: ../fontend/admin/home.php");

                      }

                      else if ($_SESSION["userstatus"]=="Member"){  //ถ้าเป็น member ให้กระโดดไปหน้า User_page.php

                        Header("Location: ../fontend/user/member.php");

                      }else{
                        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ชื่อผู้ใช้ / รหัสผ่านไม่ถูกต้อง กรุณกรอกใหม่อีกครั้ง',
                        icon: 'error',
                        timer: 5000,
                        showConfirmButton: true
                          });
                          })
                         </script>";
                        header("refresh:1.5; url=../fontend/user/fromlogin.php");
                      }

                  }else{
                    echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'เกิดข้อผิดพลาด',
                            text: 'ชื่อผู้ใช้ / รหัสผ่านไม่ถูกต้อง กรุณกรอกใหม่อีกครั้ง',
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: true
                        });
                    })
                </script>";
                header("refresh:1.5; url=../fontend/user/fromlogin.php");

                  }

        }else{
             
        }
?>