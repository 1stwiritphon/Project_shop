<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!doctype html>
<html>
    <head>
        <title> รับค่าการแก้ไข้ข้อมูล </title>
</head>
<body>
<?php 
include("connectDB.php");
session_start();
$User_ID = $_SESSION['User_ID'];
$User_first = $_POST['User_first'];
$User_last = $_POST['User_last'];
$User_address = $_POST['User_address'];
$User_tel = $_POST['User_tel'];
$User_email = $_POST['User_email'];


$check = "SELECT email FROM user WHERE email='$User_email' AND User_ID != $User_ID";
$result1 = mysqli_query($con, $check) or die(mysqli_errno($con));
$num = mysqli_num_rows($result1);

if ($num > 0) {
    echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ขออภัย',
                        text: 'Email ซ้ำ กรุณกรอกใหม่อีกครั้ง',
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
        
} else{
	
    $sql_update = "UPDATE user SET
    User_first = '$User_first',
    User_last = '$User_last',
    User_address = '$User_address',
    User_tel = '$User_tel',
    email = '$User_email'
    WHERE User_ID = $User_ID AND NOT EXISTS (SELECT * FROM user WHERE email='$User_email' AND User_ID != $User_ID)
    ";
    




 //ปิดการเชื่อมต่อ database 
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
if (mysqli_query($con, $sql_update) === TRUE) {
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'ยินดีด้วย',
            text: 'คุณสามารถ Login ด้วนชื่อผู้ใช้นี้ได้',
            icon: 'success',
            timer: 5000,
        }).then((result) => {
            // Go to login page
            window.location.href = '../fontend/admin/user.php';
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
mysqli_close($con);
?>
</body>
</html>
<meta http-equiv = "refresh" content = "1;URL = ../fontend/admin/user.php">

