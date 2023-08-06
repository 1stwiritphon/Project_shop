<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
include("connectDB.php");

$User_ID = isset($_GET['User_ID']) ? $_GET['User_ID'] : '';

if($User_ID!='') {

    $sql="DELETE FROM user where User_ID='".$User_ID."'";
    if($User_ID!='') {

        $sql="DELETE FROM user where User_ID='".$User_ID."'";
    
        if($con->query($sql)==TRUE){
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'ยินดีด้วย',
                    text: 'คุณลบ ผู้ใช้ไอดีที่ $User_ID ออกแล้ว ',
                    icon: 'success',
                    timer: 5000,
                    showConfirmButton: true,
                }).then((result) => {
                    // Go to login page
                    window.location.href = '../fontend/admin/user.php';
                });
            })
        </script>";
        }else{
            echo "ERROR" .$sql. "<BR>".$con->error;
        }

    }
}


?>
</body>
</html>


