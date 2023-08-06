<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
include("connectDB.php");

$Menu_ID = isset($_GET['Menu_ID']) ? $_GET['Menu_ID'] : '';

if($Menu_ID!='') {

    $sql="DELETE FROM menu where Menu_ID='".$Menu_ID."'";
    if($Menu_ID!='') {

        $sql="DELETE FROM menu where Menu_ID='".$Menu_ID."'";
    
        if($con->query($sql)==TRUE){
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'ยินดีด้วย',
                    text: 'คุณลบ ลบเมนู $Menu_ID ออกแล้ว ',
                    icon: 'success',
                    timer: 5000,
                    showConfirmButton: true,
                }).then((result) => {
                    // Go to login page
                    window.location.href = '../fontend/admin/menu.php';
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


