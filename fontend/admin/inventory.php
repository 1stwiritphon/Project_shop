<?php

include("../../backend/connectDB.php");
include("sidebar.php");


$sql = "SELECT * FROM `inventory`" or die("ERROR : " . $mysqli->error);
$inven = mysqli_query($con, $sql);

session_start();
if ($_SESSION['userstatus'] != 'Admin') {  //check session

  Header("Location:../user/fromlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {


?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>คลังสินค้า</title>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block"> สวัสดี : <?php print_r($_SESSION["userstatus"]) ?></a>
          </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php echo getMainMenu('3'); ?>
    </aside>

    <body class="hold-transition sidebar-mini">

      <?php
      // Connect to your database

      // Check conection
      // Query the database for products with expiration dates within the next week or that have already expired

      $today = date("Y-m-d");
      $next30Days = date("Y-m-d", strtotime("+30 days"));
      $sql1 = " SELECT INV_name, INV_date FROM inventory WHERE INV_date BETWEEN '$today' AND '$next30Days'";

      $result = mysqli_query($con, $sql1);

      // Loop through each record and display a SweetAlert if the expiration date has passed or is within the next week



      $sql1 = "SELECT INV_name, INV_date FROM inventory WHERE INV_date BETWEEN '$today' AND '$next30Days'";

      $result = mysqli_query($con, $sql1);

      // Query the database for products with expiration dates within the next week or that have already expired
      $sql = "SELECT INV_name, INV_date FROM inventory WHERE INV_date < DATE_ADD(NOW(), INTERVAL 1 WEEK)";
      $result = mysqli_query($con, $sql);

      // Define an empty array to hold the expiring products
      $expiringProducts = [];

      // Loop through each record and add expiring products to the array
      while ($row = mysqli_fetch_assoc($result)) {
        $expirationDate = strtotime($row["INV_date"]);
        $productName = $row["INV_name"];
        $daysUntilExpiration = round(($expirationDate - time()) / (60 * 60 * 24));

        if ($daysUntilExpiration <= 3 && $daysUntilExpiration >= 0) {
          $expiringProducts[] = ["name" => $productName, "INV_date" => $row["INV_date"], "days_until_expiration" => $daysUntilExpiration];
        }
      }

      // Loop through the expiring products array and display SweetAlerts
      foreach ($expiringProducts as $product) {
        $productName = $product["name"];
        $expirationDate = $product["INV_date"];
        $daysUntilExpiration = $product["days_until_expiration"];

        echo "<script>swal('Reminder', 'วันหมดอายุของ $productName คือ $expirationDate ( เหลืออีก $daysUntilExpiration วัน )!', 'info')</script>";
      }
      mysqli_close($con);
      ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>คลังสินค้า</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">คลังสินค้า</li>
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
                    <h3 class="card-title">คลังสินค้า</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="order" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>วัตถุดิบ</th>
                          <th>จำนวน</th>
                          <th>หน่วย</th>
                          <th>วันหมดอายุ</th>
                          <th>แก้ไขวัตถุดิบภายในคลัง</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($row = mysqli_fetch_array($inven)) { ?>
                          <tr>
                            <td>
                              <p><?php echo $row['INV_name'] ?></p>
                            </td>
                            <td>
                              <p><?php echo $row['INV_qty'] ?></p>
                            </td>
                            <td>
                              <p><?php echo $row['INV_Unit'] ?></p>
                            </td>
                            <td>
                              <p><?php echo $row['INV_date'] ?></p>
                            </td>
                            <td><a href="Form-update-ing.php?INV_ID=<?php echo $row['INV_ID'] ?>"><button type="submit" value="Edit" class="btn btn-primary" name="edit"><i class="fas fa-edit"></i></button></a>
                          </tr>
                        <?php } ?>
                      </tbody>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

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
    </body>
  <?php } ?>

  </html>