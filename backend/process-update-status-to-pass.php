<!doctype html>
<html>

<head>
    <title> รับค่าการแก้ไข้ข้อมูล </title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    include("connectDB.php");

    $o_id = $_POST['o_id'];


    $sql = " UPDATE order_detail 
    SET status = 3 , update_time = NOW()
    WHERE o_id = $o_id
        
";
        $result = mysqli_query($con, $sql);
    
    $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
    if ($result) {
        echo "<script>
      $(document).ready(function() {
          Swal.fire({
              title: 'สำเร็จ',
              text: 'Update สถานะสำเร็จ',
              icon: 'success',
              timer: 5000,
              showConfirmButton: true
          });
      })
  </script>";
    }
    mysqli_close($con);
    ?>
</body>

</html>
<meta http-equiv="refresh" content="1;URL = ../fontend/admin/order-customer.php">