<?php
include("../../backend/connectDB.php");
include("sidebar.php");


session_start();
if ($_SESSION['userstatus'] != 'Admin') {  //check session

  Header("Location: ../user/fromlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {

  //echo $sql;
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashbroad</title>
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

  <body class="hold-transition sidebar-mini">
    <form action="../../backend/process-update-inv.php" method="post" name="update" id="update">

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
                <a href="#" class="d-block"> สวัสดี : <?php print_r($_SESSION["userstatus"]) ?></a>
              </div>
            </div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <?php echo getMainMenu('1'); ?>
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"><br>
          <!-- Content Header (Page header) -->


          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">เมนู</span>
                      <span class="info-box-number">
                        <?php echo number_format($con->query("SELECT * FROM menu")->num_rows) ?>
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-invoice"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">ออร์เดอร์จากลูกค้าวันนี้</span>
                      <span class="info-box-number"><?php echo number_format($con->query("SELECT distinct c.o_dttm, a.user_id, a.username,a.user_first,a.user_last,a.user_address from order_detail b,user a , order_head c where b.user_id = a.user_id AND DATE(c.o_dttm) = CURDATE()AND b.o_id = c.o_id
")->num_rows) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">ข้อมูลลูกค้า</span>
                      <span class="info-box-number"><?php echo number_format($con->query("SELECT * FROM user where userstatus='Member'")->num_rows) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">

                  <!-- /.info-box -->
                </div>







                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">ยอดขายทั้งหมด</span>
                      <span class="info-box-number"><?php echo number_format($con->query("SELECT distinct c.o_dttm, a.user_id, a.username,a.user_first,a.user_last,a.user_address from order_detail b,user a , order_head c where b.user_id = a.user_id")->num_rows) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="nav-icon bi bi-box-seam"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">วัตถุดิบ</span>
                      <span class="info-box-number">
                        <?php
                        $result = $con->query("SELECT INV_name,INV_qty FROM inventory");
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo $row["INV_name"] .  "  เหลือ  "  . $row["INV_qty"] . "<br>";
                          }
                        } else {
                          echo "0 results";
                        }
                        ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            </div>
          </section>










        </div>
      </div>
      </div>
      <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->




      </div>
      <!-- ./wrapper -->

      <!-- REQUIRED SCRIPTS -->

      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- ChartJS -->
      <script src="plugins/chart.js/Chart.min.js"></script>
      <script>
        $(function() {
          /* ChartJS
           * -------
           * Here we will create a few charts using ChartJS
           */

          //--------------
          //- AREA CHART -
          //--------------

          // Get context with jQuery - using jQuery's .get() method.
          var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

          var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Digital Goods',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [28, 48, 40, 19, 86, 27, 90]
              },
              {
                label: 'Electronics',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [65, 59, 80, 81, 56, 55, 40]
              },
            ]
          }

          var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
              display: false
            },
            scales: {
              xAxes: [{
                gridLines: {
                  display: false,
                }
              }],
              yAxes: [{
                gridLines: {
                  display: false,
                }
              }]
            }
          }

          // This will get the first returned node in the jQuery collection.
          new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
          })

          //-------------
          //- LINE CHART -
          //--------------
          var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
          var lineChartOptions = $.extend(true, {}, areaChartOptions)
          var lineChartData = $.extend(true, {}, areaChartData)
          lineChartData.datasets[0].fill = false;
          lineChartData.datasets[1].fill = false;
          lineChartOptions.datasetFill = false

          var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
          })

          //-------------
          //- DONUT CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
          var donutData = {
            labels: [
              'Chrome',
              'IE',
              'FireFox',
              'Safari',
              'Opera',
              'Navigator',
            ],
            datasets: [{
              data: [700, 500, 400, 600, 300, 100],
              backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
          }
          var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
          })

          //-------------
          //- PIE CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieData = donutData;
          var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          })

          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })

          //---------------------
          //- STACKED BAR CHART -
          //---------------------
          var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
          var stackedBarChartData = $.extend(true, {}, barChartData)

          var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              xAxes: [{
                stacked: true,
              }],
              yAxes: [{
                stacked: true
              }]
            }
          }

          new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
          })
        })
      </script>
  </body>
<?php } ?>

  </html>