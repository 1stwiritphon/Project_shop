<?php

include("../../backend/connectDB.php");
include("sidebar.php");
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
        <title>Report</title>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
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
        <form>

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
                            <?php echo getMainMenu('4,45'); ?>
                </aside>

                <body class="hold-transition sidebar-mini">
                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Report : รายงานผล</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">รายงานผล</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>


                        <section class="content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">ยอดขายของเดือนนี้</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <button onclick="generateExcel()" type="submit" value="Edit" class="btn btn-primary" name="edit"> <i class="fas fa-download"></i></button>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">ยอดวัตถุดิบที่ใช้</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <button onclick="ingredient()" type="submit" value="Edit" class="btn btn-success" name="edit"> <i class="fas fa-download"></i></button>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.card -->
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

            <script>
                function addIngredient() {
                    const div = document.createElement('div');
                    div.innerHTML = `<div class="row">
                        <div class="col-md-3">
                          <input type="text" class="form-control" name="inv_name[]" placeholder="Ingredient Name" required>
                        </div>
                        <div class="col-md-3">
                          <input type="number" class="form-control" name="inv_qty[]" placeholder="Quantity" required>
                        </div>
                        <div class="col-md-3">
                          <select class="form-control" name="inv_unit[]">
                            <option value="กรัม">กรัม</option>
                            <option value="มิลลิลิตร">มิลลิลิตร</option>
                            <option value="ฟอง">ฟอง</option>
                            <option value="กิโลกรัม">กิโลกรัม</option>
                          </select>
                        </div>
                          <button type="button" class="btn btn-danger" onclick="removeIngredient(this)">Remove Ingredient</button>`;
                    document.getElementById('ingredients').appendChild(div);
                }

                function removeIngredient(button) {
                    button.parentNode.remove();
                }
            </script>
            <script>
                function generateExcel() {
                    // Retrieve data from SQL using AJAX
                    $.ajax({
                        url: 'get_data.php', // Replace with the URL that points to the PHP script for retrieving SQL data
                        method: 'GET', // Or use the desired HTTP method (e.g., GET, POST)
                        success: function(response) {
                            var data = response; // No need to parse the response since it's already an array of objects

                            // Create a Workbook
                            var wb = XLSX.utils.book_new();

                            // Create a Worksheet
                            var ws = XLSX.utils.json_to_sheet(data);

                            // Add the Worksheet to the Workbook
                            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

                            // Save the Workbook as an Excel file
                            var wbout = XLSX.write(wb, {
                                bookType: 'xlsx',
                                type: 'binary'
                            });

                            // Convert the binary data to a Blob
                            var blob = new Blob([s2ab(wbout)], {
                                type: 'application/octet-stream'
                            });

                            // Download the Excel file
                            saveAs(blob, 'sales_report.xlsx');
                        }
                    });
                }


                // Convert a String to an ArrayBuffer
                function s2ab(s) {
                    var buf = new ArrayBuffer(s.length);
                    var view = new Uint8Array(buf);
                    for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
                    return buf;
                }
            </script>

            <script>
                function ingredient() {
                    // Retrieve data from SQL using AJAX
                    $.ajax({
                        url: 'get-cut-data.php', // Replace with the URL that points to the PHP script for retrieving SQL data
                        method: 'GET', // Or use the desired HTTP method (e.g., GET, POST)
                        success: function(response) {
                            var data = response; // No need to parse the response since it's already an array of objects

                            // Create a Workbook
                            var wb = XLSX.utils.book_new();

                            // Create a Worksheet
                            var ws = XLSX.utils.json_to_sheet(data);

                            // Add the Worksheet to the Workbook
                            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

                            // Save the Workbook as an Excel file
                            var wbout = XLSX.write(wb, {
                                bookType: 'xlsx',
                                type: 'binary'
                            });

                            // Convert the binary data to a Blob
                            var blob = new Blob([s2ab(wbout)], {
                                type: 'application/octet-stream'
                            });

                            // Download the Excel file
                            saveAs(blob, 'sales_report.xlsx');
                        }
                    });
                }


                // Convert a String to an ArrayBuffer
                function s2ab(s) {
                    var buf = new ArrayBuffer(s.length);
                    var view = new Uint8Array(buf);
                    for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
                    return buf;
                }
            </script>



        <?php } ?>
    </body>

    </html>