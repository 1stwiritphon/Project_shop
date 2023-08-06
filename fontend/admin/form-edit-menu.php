<?php

include("../../backend/connectDB.php");
include("sidebar.php");
$Menu_ID = $_GET['Menu_ID'];
$sql = "SELECT * FROM menu where Menu_ID=$Menu_ID" or die("ERROR : " . $mysqli->error);
$menu = mysqli_query($con, $sql);
$result = mysqli_fetch_array($menu);
//echo $sql;
session_start();
if ($_SESSION['userstatus'] != 'Admin') {  //check session

  Header("Location: ../user/fromlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {

?>
  <!DOCTYPE html>
  <!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เปลี่ยนแปลงเมนู</title>
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

      h3 {
        font-size: 25px;
      }
    </style>
  </head>

  <body class="hold-transition sidebar-mini">
    <form action="../../backend/process-update-menu.php " method="post" enctype="multipart/form-data" name="upfile" id="upfile">

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
              <?php echo getMainMenu('4,43'); ?>
        </aside>

        <body class="hold-transition sidebar-mini">
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>ข้อมูลลูกค้า</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">แก้ไขข้อมูลลูกค้า</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>


            <section class="content">
              <div class="row">
                <div class="col-md-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">เพิ่มเมนู</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputName">ชื่อเมนู</label>
                        <input type="hidden" id="inputName" class="form-control" name="Menu_ID" required value="<?php echo $result["Menu_ID"]; ?>">
                        <input type="text" id="Menu_name" class="form-control" name="Menu_Name" required value="<?php echo $result["Menu_Name"]; ?>">
                      </div>
                      <div class="form-group">
                        <label for="inputClientCompany">ราคา</label>
                        <input type="text" id="Menu_price" class="form-control" name="Menu_price" required value="<?php echo $result["Menu_price"]; ?>">
                      </div>
                      <div class="form-group">
                        <label for="prod_image">Picture</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="menu_pic" required accept="image/*">

                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <div class="form-group">
                          <label for="prod_image"></label>
                          <div class="custom-file">
                            <a href="product.php" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Add Product" class="btn btn-success float-right">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputName">รูปภาพเมนูก่อนหน้านี้</label>
                          <img src="<?php echo $result['menu_pic']; ?>" width='500' height='600' class="card-img-top" alt="...">
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->


          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->

      </div>

      <!-- ./wrapper -->

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
      </script>
    <?php } ?>
  </body>

  </html>