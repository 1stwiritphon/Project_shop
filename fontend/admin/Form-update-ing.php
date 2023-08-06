<?php
include("../../backend/connectDB.php");
include("sidebar.php");
$INV_ID = $_GET['INV_ID'];
$sql= "SELECT * FROM inventory where INV_ID=$INV_ID" or die("ERROR : ".$mysqli->error);
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_array($query);

session_start();
if ($_SESSION['userstatus'] !='Admin'){  //check session

	  Header("Location: ../user/fromlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{ 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>อัพเดทวัตถุดิบภายในคลัง</title>
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
  <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai">
          <style>
            body {
        font-family: 'IBM Plex Sans Thai';
        font-size: 20px;
      }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<form action="../../backend/process-update-inv.php" method="post"  name="update" id="update">

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
     <img src="../user/assets/logo.png" alt="แม่จำนงค๋ Logo"  class="brand-image img-circle elevation-3" style="opacity:1">
      <span class="brand-text font-weight-light">แม่จำนงค์</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"> สวัสดี :  <?php print_r($_SESSION["userstatus"])?></a>
        </div>
      </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <?php echo getMainMenu('3,32'); ?>
  </aside>

<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>จัดการวัตถุดิบภายในคลัง</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">แก้ไขวัตถุดิบภายในคลัง</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">วัตถุดิบ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                  <input type="hidden" id="inputName" class="form-control" name="INV_ID"  required value="<?php echo $result["INV_ID"];?>">
                    <label for="exampleInputEmail1">ชื่อวัตถุดิบ</label>
                    <input type="text" id="INV_name" class="form-control" name="INV_name"  required value="<?php echo $result["INV_name"];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">จำนวน</label>
                    <input type="text" id="INV_qty" class="form-control" name="INV_qty"  required value="<?php echo $result["INV_qty"];?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning  float-right">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
<?php } ?>
</html>