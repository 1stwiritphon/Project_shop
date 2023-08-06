<?php

include("../../backend/connectDB.php");
include("sidebar.php");


$sql = "SELECT * FROM `menu`" or die("ERROR : " . $mysqli->error);
$menu = mysqli_query($con, $sql);

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
    <title>เมนู</title>
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
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block"> สวัสดี : <?php print_r($_SESSION["userstatus"]) ?></a>
          </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php echo getMainMenu('6'); ?>
    </aside>

    <body class="hold-transition sidebar-mini">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>ข้อมูลเมนู</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">ข้อมูลเมนู</li>
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
                    <h3 class="card-title">ข้อมูลเมนูอาหาร</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="menu" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>ลำดับ</th>
                          <th>ชื่อรสชาติ</th>
                          <th>ราคา</th>
                          <th style="width:10%" height="20%">รูปภาพเมนู</th>
                          <th>แก้ไข</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;

                        while ($row = mysqli_fetch_array($menu)) { ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                              <p><?php echo $row['Menu_Name'] ?></p>
                            </td>
                            <td>
                              <p><?php echo $row['Menu_price'] ?></p>
                            </td>
                            <td>
                              <center><img src="<?php echo $row['menu_pic'] ?>" width="100%" height="100%"> </center>
                            </td>
                            <td><a href="form-edit-menu.php?Menu_ID=<?php echo $row['Menu_ID'] ?>"><button type="submit" value="Edit" class="btn btn-primary" name="edit"><i class="fas fa-edit"></i></button></a>
                            <a href="../../backend/process-del-menu.php?Menu_ID=<?php echo $row['Menu_ID']?>" class="btn btn-danger delete-btn" onclick="confirmDelete(event, 'คุณต้องการลบเมนูนี้')"><i class="fas fa-trash"></i></a>
                          </tr>
                        <?php $i++;
                        } ?>
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

                <script src="plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
                <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
                <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
                <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
                <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
                <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="dist/js/adminlte.min.js"></script>
                <!-- AdminLTE for demo purposes -->
                <!-- Page specific script -->
                <script>
                  $(function() {
                    $("#menu").DataTable({
                      "responsive": true,
                      "lengthChange": false,
                      "autoWidth": false,
                      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#menu_wrapper .col-md-6:eq(0)');
                  });
                </script>
                <script>
function confirmDelete(event, message) {
  event.preventDefault();
  Swal.fire({
    title: 'คุณแน่ใจหรือไม่?',
    text: message,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'ใช่, ลบเลย',
    cancelButtonText: 'ยกเลิก',
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = event.target.href;
    }
  });
}

</script>
    </body>
  <?php } ?>

  </html>