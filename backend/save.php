<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Set database connection variables
include("connectDB.php");

if (isset($_POST['submit'])) {


    $username =  $_POST['username'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);
    $User_first =  $_POST['User_first'];
    $User_last = $_POST['User_last'];
    $User_address =  $_POST['User_address'];
    $User_tel = $_POST['User_tel'];
    $User_email = $_POST['User_email'];
    $userstatus = $_POST['userstatus'];

    // Check if password and confirm password match
    if ($password != $confirm_password) {
        // Invalid confirm password
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'รหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง',
                        icon: 'error',
                        timer: 5000,
                        showConfirmButton: true,
                        }).then((result) => {
                            // Go back to form
                            setTimeout(function() {
                            window.history.back();
                        }, 500);
                });
            })
        </script>";
    } else {
        // Valid confirm password
        // Check if username and email already exist in database
        $query = "SELECT username , email FROM user WHERE username = '$username' OR email= '$User_email'";
        $result = mysqli_query($con, $query);

        if ($result->num_rows > 0) {
            // Duplicate username or email
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ขออภัย',
                        text: 'ชื่อผู้ใช้ / Email ซ้ำ กรุณกรอกใหม่อีกครั้ง',
                        icon: 'warning',
                        timer: 5000,
                        showConfirmButton: true,
                        }).then((result) => {
                            // Go back to form
                            setTimeout(function() {
                            window.history.back();
                        }, 500);
                });
            })
        </script>";
        } else {
            // Perform form submission or other actions here
            // Insert data into database
            $insert_query = " INSERT INTO user 
            (
            
            User_ID,
            username,
            password,
            User_first,
            User_last,
            User_address,
            User_tel,
            email,
            userstatus
            ) 
    
            VALUES 
            (   
                    '',
                    '$username',
                    '$password',
                    '$User_first',
                    '$User_last',
                    '$User_address',
                    '$User_tel',
                    '$User_email',
                    '$userstatus')
                ";
            if (mysqli_query($con, $insert_query) === TRUE) {
                echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ยินดีด้วย',
                        text: 'คุณสามารถ Login ด้วนชื่อผู้ใช้นี้ได้',
                        icon: 'success',
                        timer: 500,
                    }).then((result) => {
                        // Go to login page
                        window.location.href = '../fontend/user/fromlogin.php';
                    });
                })
            </script>";
            } else {
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'Error',
                            text: 'สมัครสมาชิกไม่สำเร็จ กรุณาลองใหม่อีกครั้ง',
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: true,
                        }).then((result) => {
                            // Go back to form
                            setTimeout(function() {
                            window.history.back();
                        }, 500);
                });
            })
        </script>";
            }
        }
    }
}

// Close database connection
mysqli_close($con);
?>