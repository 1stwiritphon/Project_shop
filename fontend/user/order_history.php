<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/x-icon" href="assets/logo.png" />

  </head>
<?php $menu = "profile"; ?>
<?php include("head.php");
include("../../backend/connectDB.php");

session_start();
// ดึงข้อมูล
$user_id = $_SESSION['User_ID'];
$sql = "SELECT DISTINCT c.o_dttm, a.Menu_name, b.d_qty, b.d_subtotal, b.status 
        FROM menu a 
        INNER JOIN order_detail b ON a.menu_id = b.menu_id
        INNER JOIN order_head c ON b.o_id = c.o_id
        INNER JOIN user u ON u.User_ID = b.User_ID
        WHERE u.User_ID = $user_id "; 
$order = mysqli_query($con, $sql);
if ($_SESSION['userstatus'] !='Member'){  //check session

  Header("Location: fromlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{ ?>

  <div class="wrapper">

    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- /.navbar -->
    <?php include("menu.php"); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>ประวัติการสั่งซื้อ</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ประวัติการสั่งซื้อ</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="order" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>สินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
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
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    
    <!-- /.content-wrapper -->
    <?php include("footer.php"); ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <?php include("script.php"); ?>
</body>
</html>
<?php } ?>