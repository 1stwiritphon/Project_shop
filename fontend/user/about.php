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
  <title>เกี่ยวกับเรา</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/logo.png" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai">
  <style>
    body {
      font-family: 'IBM Plex Sans Thai', sans-serif;
      font-size: 20px;

    }

    p {
      font-family: 'IBM Plex Sans Thai';
      font-size: 22.5px;
    }
  </style>
</head>

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
  <header class=" py-5 mt-5 " style="margin-left: 150px;">
    <h1><b>เกี่ยวกับเรา</b></h1>
  </header>
  <!-- Section-->
  <section class="py-0">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="sb-illustration-2 sb-mb-90">
            <div class="sb-interior-frame border-radius-custom">
              <img src="assets/product1.jpg" class="w-100" style="object-position: center" height="500px">
            </div>

          </div>
        </div>
        <div class="col-lg-6 align-self-top sb-mb-60 mb-nmb">
          <h3 class="sb-mb-30 mb-nmb"><b>
              A PART OF ALL THE CHINESE PASTRY STORIES </b></h3>
          <!-- <p class="sb-text sb-mb-30 font-size-custom-24 mb-fs-20"> -->
          <p class="sb-text sb-mb-30 mb-fs-20 bow_about_desc mt-3">
            "ขนมเปี๊ยะ"เป็นขนมที่มักใช้ประกอบในเทศกาลต่างๆของชาวจีน ซึ่งความหมายของขนมเปี๊ยะและขนมบางอย่างนั้นเป็นตำนานการกู้ชาติ
            เช่น ขนมไหว้พระจันทร์ของจีน ที่ชาวจีนผู้กล้าหาญได้จัดตั้งขบวนการใต้ดินเพื่อกู้ชาติจากมองโกล ซึ่งในสมัยนั้นในวันเพ็ญเดือนแปด
            ชาวจีนมีประเพณีสักการะเจ้าแม่กวนอิม โดยทำขนมเปี๊ยะแลกกันในหมู่ญาติ ขบวนการใต้ดินจึงใช้ขนมเปี๊ยะสอดไส้ใส่จดหมายนัดแนะให้
            พร้อมใจกันต่อสู้ เป็นต้น อาหารที่ใช้ในงานมงคลของจีนนั้นมักจะถูกเลือกอย่างพิถีพิถัน เพื่อความเป็นมงคลของงาน ส่วนใหญ่จะเลือกจาก
            ชื่อและลักษณะของอาหาร ประเพณีการเลือกรับประทานขนมนี้เกิดจากความเชื่อที่มาจากชื่อและลักษณะของขนม และการแปลความหมาย
            ที่ออกเป็นความหมายที่ดี เป็นสิริมงคลแก่ชีวิต ซึ่งยังเป็นส่วนหนึ่งของความเชื่อและประเพณีด้วย เรียกว่า “ ตั้งแต่เกิดจนตายทุกวาระจะมี
            อาหารเข้าไปเกี่ยวข้องเสมอ ”
            ขนมเปี๊ยะเป็นขนมที่คนจีนนิยมใช้ในงานมงคล ทั้งงานหมั้น งานแต่งงาน หรือเป็นของขวัญ รวมไปถึงการเซ่นไหว้บรรพบุรุษ
          </p>
        </div>
      </div>
    </div>
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
        <div class="row ">
          <div class="col-lg-6 align-self-center">
            <h3 class="sb-mb-30 mb-nmb"><b>ร้านขนมเปี๊ยะแม่จำนงค์</b></h3>
            <!-- <p class="sb-text sb-mb-30 font-size-custom-24 mb-fs-20"> -->
            <p class="sb-text sb-mb-25 mb-fs-20 bow_about_desc mt-3">
              "ร้านขนมเปี๊ยะแม่จำนงค์" ตั้งอยู่บ้านเลขที่ 3/1 หมู่ที่ 2 ตำบลบ้านนา อำเภอบ้านนา จังหวัดนครนายก เป็นร้านที่จำหน่ายขนมเปี๊ยะแบบดั้งเดิม
              และแบบใหม่อย่างหลากหลายโดยทางร้านได้จำหน่ายขนมเปี๊ยะหลายชนิดและหลากหลายไส้โดยทางร้านจะมีเป็นขนมเปี๊ยะแบบดั้งเดิมทั้งลูกเล็กและลูกใหญ่
              ขนมเปี๊ยะนมข้น ขนมเปี๊ยะสีรุ้ง ขนมเปี๊ยะจิ๋วและเปี๊ยะลาวา โดยทางร้านได้เปิดจำหน่ายมาแล้วเป็นเวลา 30 ปีตั้งแต่รุ่นของคุณย่าและได้มีการทำสืบต่อกันมา
              ปัจจุบันทางร้านมีทั้งหมด 2 สาขาโดยสาขาแรกจะอยู่ที่บ้านเลขที่ 3/1 หมู่ที่ 2 ตำบลบ้านนา อำเภอบ้านนา จังหวัดนครนายก และได้มีสาขาที่ 2 อยู่ตรง
              สี่แยกบ้านนา อำเภอบ้านนา จังหวัดนครนายก โดยสาขาที่ 2 จะเปิดให้บริการในวันที่ 20 กุมภาพันธ์ พ.ศ.2566 เป็นวันแรก
            </p>

          </div>
          <div class="col-lg-6 align-self-top sb-mb-60 mb-nmb">
            <div class="sb-illustration-7">
              <div class="sb-interior-frame border-radius-custom">
                <img src="assets/shop.jpg" class="w-100 h-100">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
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