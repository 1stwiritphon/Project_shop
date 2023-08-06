<?php
session_start();
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="member.php" class="brand-link">
      <img src="assets/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">จัดการผู้ใช้</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="./profile.php" class="d-block" aria-current="page" href="./profile.php">คุณ   <?php echo $_SESSION['User_first']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
         
          <li class="nav-item">
            <a href="./profile.php" class="nav-link <?php if($menu=="#"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>แก้ไขข้อมูลส่วนตัว</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="./status.php" class="nav-link <?php if($menu=="#"){echo "active";} ?> ">
            <i class="nav-icon fas fa-box"></i>
              <p>สถานะคำสั่งซื้อ</p>
            </a>
          </li>     
          <li class="nav-item">
            <a href="./order_history.php" class="nav-link <?php if($menu=="#"){echo "active";} ?> ">
              <i class="nav-icon fas fa-list"></i>
              <p>ประวัติการสั่งซื้อ</p>
            </a>
          </li>         
          <li class="nav-header mt-5">ออกจากระบบ</li>
          <li class="nav-item">
            <a href="../../backend/logout.php" class="nav-link"  onclick="return confirm('ยืนยันออกจากระบบ !!');">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">ออกจากระบบ</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>