<?php

include("../../backend/connectDB.php");
include("sidebar.php");
$user_id = $_GET['user_id'];
$o_id = $_GET['o_id'];


$sql = "SELECT distinct  c.o_dttm,a.Menu_name,b.d_qty,b.d_subtotal , b.status ,p.p_img ,p. o_number ,c.o_number,c.o_total from menu a, order_detail b, order_head c , user u ,payment p
where a.menu_id = b.menu_id 
AND DATE(c.o_dttm) = CURDATE()
AND B.o_id = c.o_id
AND c.o_dttm = (select max(c.o_dttm) from order_head)
AND u.User_ID = b.User_ID
AND b.o_id = c.o_id
AND p.o_number = c.o_number
AND u.User_ID = $user_id
AND c.o_id = $o_id
";

$order = mysqli_query($con, $sql);
$detailorder = mysqli_query($con, $sql);
$detail = mysqli_fetch_array($detailorder);


session_start();
if ($_SESSION['userstatus'] != 'Admin') {  //check session

  Header("Location: ../user/fromlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายการออร์เดอร์จากลูกค้า</title>
    <link rel="icon" type="image/x-icon" href="../user/assets/logo.png">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dist/css/adminlte.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai">
    <style>
      body {
        font-family: 'IBM Plex Sans Thai';
        font-size: 20px;
      }
    </style>
  </head>


  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-pimary elevation-4">
      <!-- Brand Logo -->
      <a href="home.php" class="brand-link" bg-teal>
        <img src="../user/assets/logo.png" alt="แม่จำนงค๋ Logo" class="brand-image img-circle elevation-3" style="opacity:1">
        <span class="brand-text font-weight-light">แม่จำนงค์</span>
      </a>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php echo getMainMenu('2,22'); ?>
    </aside>

    <body class="hold-transition sidebar-mini">
      <form action="../../backend/process-cut stock-ing.php" method="post" name="update" id="update">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>ออร์เดอร์จากลูกค้า</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">ออร์เดอร์จากลูกค้า</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">ออร์เดอร์จากลูกค้า</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="order" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Menu Name</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          $i = 1;
                          while ($row = mysqli_fetch_array($order)) {
                          ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>
                                <p><?php echo $row['Menu_name'] ?></p>
                              </td>
                              <td>
                                <p><?php echo $row['d_qty'] ?></p>
                              </td>
                              <td>
                                <p><?php echo $row['d_subtotal'] ?></p>
                              </td>
                            </tr>
                          <?php
                            $i++;
                          }
                          ?>
                        </tbody>

                        <tfoot>
  <tr>
    <td colspan="4">
      <table>
        <tr>
          <td>Status:</td>
          <td><?php echo $detail['status'] ?></td>
        </tr>
        <tr>
          <td>Order date:</td>
          <td><?php echo $detail['o_dttm'] ?></td>
        </tr>
        <tr>
          <td>หลักฐานการชำระเงิน</td>
          <td>
            <center><img src="../../backend/<?php echo $detail['p_img'] ?>" width="40%" height="75%"></center>
          </td>
        </tr>
        <tr>
          <td>Total:</td>
          <td><?php echo $detail['o_total'] ?></td>
        </tr>
        <tr>
          <td>
            <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
            <button type="submit" class="btn btn-warning float-right">Update Status</button>
          </td>
          <td>
            <button type="button" class="btn btn-danger float-right" onclick="cancelOrder()">Cancel Order</button>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</tfoot>


                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
      </form>
      <!-- /.card -->
      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- bs-custom-file-input -->
      <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <!-- Page specific script -->
      <script>
        $(function() {
          bsCustomFileInput.init();
        });
      </script>
      <script>
  function cancelOrder() {
    if (confirm("Are you sure you want to cancel this order?")) {
      window.location.href = "../../backend/process-cancel-order.php?o_id=<?php echo $o_id; ?>";
    }
  }
</script>

 <?php } ?>

    </body>

  </html>