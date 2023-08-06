  <nav class="main-header navbar navbar-expand navbar-pimary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-warning" href="member.php"><strong>CHAMNONG PASTRY SHOP</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-black-50" aria-current="page" href="member.php">หน้าแรก</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">สินค้าของเรา</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="member.php">สินค้าทั้งหมด</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="member.php">สินค้าขายดี</a></li>
                                <li><a class="dropdown-item" href="member.php">สินค้าใหม่</a></li>
                            </ul>
                            <li class="nav-item"><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
                        </li>
                    </ul>
                    <form class="d-flex" action="cart.php">
                    
                        
                        <button class="btn btn-outline-warning" type="submit">
                            <i class="bi-cart-fill me-1" ></i>
                            ตะกร้าสินค้า
                            <span class="badge bg-warning text-white ms-1 rounded-pill"><?php echo $cartCount; ?></span>
                        </button>
                        </li>
                    </form>
                </div>
            </div>
        </nav>
    </ul>

    
  </nav>