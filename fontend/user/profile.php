<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/x-icon" href="assets/logo.png" />

  </head>
<?php $menu = "profile";?>
<?php include("head.php"); 

session_start();
$User_id = $_SESSION['User_ID'];

if ($_SESSION['userstatus'] !='Member'){  //check session

  Header("Location: fromlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{ ?>
 

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("navbar.php"); ?> 
  <!-- /.navbar -->
  <?php include("menu.php"); ?> 
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">แก้ไขข้อมูลส่วนตัว</h2>
              <form name="regis" action="../../backend/proces-update-user.php" method="post">
                
                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">ชื่อ</label>
                  <input name="User_first" type="text" class="form-control form-control-lg" id="User_first" required value="<?php echo $_SESSION["User_first"]; ?>">
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">นามสกุล</label>
               <input name="User_last" type="text" class="form-control form-control-lg" id="User_last" required value="<?php echo $_SESSION["User_last"]; ?>">
                  
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">ที่อยู่</label>
               <input name="User_address" type="text" class="form-control form-control-lg" id="User_address" required value="<?php echo $_SESSION["User_address"]; ?>">
                  
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">เบอร์มือถือ</label>
               <input name="User_tel" type="text" class="form-control form-control-lg" id="User_tel" required value="<?php echo $_SESSION["User_tel"]; ?>">
                  
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">อีเมลล์</label>
               <input name="User_email" type="text" class="form-control form-control-lg" id="User_email" required value="<?php echo $_SESSION["email"]; ?>">
                  
                    <select hidden id="inputStatus" class="form-control custom-select" name="userstatus" >
                        <option value="Member" selected>Member</option>
                    </select>
                </div>



                <div class="d-flex justify-content-center">
                  
                    <input class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white" type=submit name="submit" value="บันทึกข้อมูล">
                </div>

                            </form>
                    </div>
            </div>
        </div>
    </div>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <!-- ./col -->
           <div class="col-md-12">
            <?php 
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            if ($act == 'add') {
            include('');
            }elseif ($act == 'edit') {
            include('');
            }
            else{
            include(''); 
            }
            ?>
          </div>
        </div>
        <!-- /.row -->
      
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
<?php } ?>
</html>
