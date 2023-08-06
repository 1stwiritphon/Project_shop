<?php

function getTitle($v)
{
  $ret = " Chamnong Chinese pastry Shop " . $v;
  return $ret;
}

function getFooter()
{

  $ret = '
    <!-- Main Footer -->
    <footer class="main-footer">
    <position = fixed>
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Chamnong Chinese pastry Shop</strong>
    </footer>
    ';

  return $ret;
}


function MainMenu()
{
  $ret = '
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home.php" class="nav-link activeM1">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item openM2">
            <a href="#" class="nav-link activeM2">
              <i class="nav-icon bi bi-cart-check"></i>
              <p>
                การสั่งซื้อ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          
              <li class="nav-item">
                <a href="order-customer.php" class="nav-link activeM22">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ออร์เดอร์จากลูกค้า</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="inventory.php" class="nav-link activeM3">
              <i class="nav-icon bi bi-box-seam"></i>
              <p>คลังวัตถุดิบ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="menu.php" class="nav-link activeM6">
              <i class="nav-icon bi bi-list"></i>
              <p>เมนู</p>
              </a>
          </li>

          <li class="nav-item openM4">
            <a href="#" class="nav-link activeM4">
              <i class="nav-icon fas fa-tools"></i>
              <p>
					        จัดการข้อมูล
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link activeM41">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลลูกค้า</p>
                </a>
              </li>
             
            <li class="nav-item">
                <a href="from-add-menu.php" class="nav-link activeM43">
                    <i class="far fa-circle nav-icon"></i>
                    <p>เพิ่มเมนู</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="from-add-menu.php" class="nav-link activeM44">
                <i class="far fa-circle nav-icon"></i>
                    <p>เพิ่มวัตถุดิบ</p>
                </a>
                </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="../web/php/logout.php" class="nav-link activeM7">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Log out</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
    ';

  return $ret;
}


function getMainMenu($a = '1')
{
  $arry = explode(',', trim($a));

  if (!is_array($arry)) {
    $arry[0] = $a;
  }

  $arry_active = array(
    'activeM1' => '',
    'openM2' => '',
    'activeM21' => '',
    'activeM22' => '',
    'activeM23' => '',
    'activeM24' => '',
    'activeM3' => '',
    'activeM20' => '',
    'openM4' => '',
    'activeM4' => '',
    'activeM41' => '',
    'activeM43' => '',
    'activeM44' => '',
    'openM5' => '',
    'activeM51' => '',
    'activeM52' => '',
    'activeM53' => '',
    'activeM6' => '',
    'activeM7' => '',



  );

  for ($i = 0; $i < count($arry); $i++) {
    $key = 'activeM' . trim($arry[$i]);
    if (isset($arry_active[$key])) {
      $arry_active[$key] = 'active';
    }

    $val = (int)trim($arry[$i]);
    if ($val <= 5) {
      $key = 'openM' . $val;
      if (isset($arry_active[$key])) {
        $arry_active[$key] = 'menu-open';
      }
    }
  }

  $tmp_url = MainMenu();
  $url = strtr($tmp_url, $arry_active);

  return $url;
}

?>

<script>
  window.addEventListener("beforeunload", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/logout.php", true);
    xhr.send();
  });
</script>