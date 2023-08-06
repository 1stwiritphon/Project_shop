<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>หน้าแรก</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/logo.png" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai">
  <style>
    body {
      font-family: 'IBM Plex Sans Thai';
      font-size: 20px;
    }
  </style>
</head>
<style>
  a {
    text-decoration: none;
  }
</style>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand text-warning" href="index.php"><strong>CHAMNONG PASTRY SHOP</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
          <li class="nav-item"><a class="nav-link active text-black-50" aria-current="page" href="index.php">หน้าแรก</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">สินค้าของเรา</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="index.php">สินค้าทั้งหมด</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="index.php">สินค้าขายดี</a></li>
              <li><a class="dropdown-item" href="index.php">สินค้าใหม่</a></li>
            </ul>
          <li class="nav-item"><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
          </li>
        </ul>
        <form class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <?php if (isset($_SESSION['User_first'])) : ?>
              <li class="nav-item"><a class="nav-link active mt-2 text-black" aria-current="page" href="./profile.php"><?php echo $_SESSION['User_first']; ?></a></li>
              <li class="nav-item"><a class="nav-link active" href="../../backend/logout.php">ออกจากระบบ</a></li>
            <?php else : ?>
              <li class="nav-item"><a class="nav-link active" href="fromlogin.php">เข้าสู่ระบบ/สมัครสมาชิก</a></li>
            <?php endif; ?>
          </ul>
          <button class="btn btn-outline-warning" type="submit">
            <i class="bi-cart-fill me-1"></i>
            ตะกร้าสินค้า
            <span class="badge bg-warning text-white ms-1 rounded-pill">0</span>
          </button>
        </form>

      </div>
    </div>
  </nav>

  <!-- Header-->
  <header class=" py-5 mt-5 " style="margin-left: 1050px;">
    <h3>ช่องทางการติดต่อ</h3>
  </header>
  <!-- Section-->
  <section class="py-5">
    <section class="accordion-section clearfix mt-3 pb200" aria-label="Question Accordions">
      <div class="container">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-5  mb20">
            <div class="row mt-3">
              <div class="col-2 icon-social-contact-channel">
                <img class="picture-location-2 fr mb-no-fr mb-20" src="https://bowcake.com/wp-content/themes/storefront/bowcake_assets/img/icon/line.png" width="40px">
              </div>
              <div class="col-10 pt13 mb-fs-20 mb-npl mb-pt10 mobi-ml-14">
                LINE ID:<br>
                <span class="location-subname contact_ch_subname">
                  <a data-no-swup="" target="_blank" href="" class="cursor-hover" style="color:black">@ChamnongShop</a>
                </span>
              </div>
            </div>
          </div>
          <div class="col-lg-5 mb20">
            <div class="row mt-3">
              <div class="col-2 icon-social-contact-channel">
                <img class="picture-location-2 fr mb-no-fr mb-20" src="https://bowcake.com/wp-content/themes/storefront/bowcake_assets/img/icon/phone2.png" width="40px">
              </div>
              <div class="col-10 pt13 mb-fs-20 mb-npl mb-pt10 mobi-ml-14">
                โทร:<br>
                <span class="location-subname contact_ch_subname">
                  <a data-no-swup="" target="_blank" href="tel:+66861384542" class="cursor-hover" style="color:black">086-138-4542</a>
                </span>
              </div>
            </div>
          </div>
          <div class="col-lg-1"></div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-5 mb20">
            <div class="row mt-5">
              <div class="col-2 icon-social-contact-channel">
                <img class="picture-location-2 fr mb-no-fr mb-20" src="https://bowcake.com/wp-content/themes/storefront/bowcake_assets/img/icon/facebook-ft.png" width="40px">
              </div>
              <div class="col-10 pt13 mb-fs-20 mb-npl mb-pt10 mobi-ml-14">
                Facebook:<br>
                <span class="location-subname contact_ch_subname">
                  <a data-no-swup="" target="_blank" href="https://www.facebook.com/profile.php?id=100041814072958" class="cursor-hover" style="color:black">www.facebook.com/ChamnongShop</a>
                </span>
              </div>
              <div class="container my-5">
                <div class="row justify-content-center">
                  <div class="col-lg-9">
                    <h1 class="mb-3">Contact Us</h1>
                    <form action="contactsend.php" method="post">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label for="your-name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="your-name" name="uname" required>
                        </div>
                        <div class="col-md-6">
                          <label for="your-surname" class="form-label">Lastname</label>
                          <input type="text" class="form-control" id="your-surname" name="lastname" required>
                        </div>
                        <div class="col-md-12">
                          <label for="your-email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="your-email" name="email" required>
                        </div>

                        <div class="col-12">
                          <label for="your-message" class="form-label">Message</label>
                          <textarea class="form-control" id="your-message" name="message" rows="5" required></textarea>
                        </div>
                        <div class="col-12">
                          <div class="row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-dark w-100 fw-bold">Send</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 mb20">
            <div class="row mt-5">
              <div class="col-2 icon-social-contact-channel">
                <img class="picture-location-2 fr mb-no-fr mb-20" src="https://bowcake.com/wp-content/themes/storefront/bowcake_assets/img/icon/instagram-ft.png" width="40px">
              </div>
              <div class="col-10 pt13 mb-fs-20 mb-npl mb-pt10 mobi-ml-14">
                Instagram:<br>
                <span class="location-subname contact_ch_subname">
                  <a data-no-swup="" target="_blank" href="" class="cursor-hover" style="color:black">www.instagram.com/ChamnongShop</a>
                </span>
              </div>
            </div>
            <div class="col-10 pt13 mb-fs-20 mb-npl mb-pt10 mobi-ml-14" style="width: 90%;">
              <div class="row" style="margin-top: 150px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.887946422478!2d101.01976871475495!3d14.25975659002024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311dbdfd0d9911b9%3A0x6d8e2690b89b036c!2z4Lij4LmJ4Liy4LiZ4LiC4LiZ4Lih4LmA4Lib4Li14LmK4Lii4Liw4LmB4Lih4LmI4LiI4Liz4LiZ4LiH4LiE4LmM!5e0!3m2!1sth!2sth!4v1676912628115!5m2!1sth!2sth" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

              </div>
            </div>
          </div>



    </section>

  </section>
  <!-- Footer-->
  <?php
  include("footer.php");
  ?>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>