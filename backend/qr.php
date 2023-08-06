<?php
session_start();
include("connectDB.php");


if ($_SESSION['userstatus'] != 'Member') {  //check session

  Header("Location: logout.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>ยืนยันการสั่งซื้อ</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai">


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

  <body style="background-color:#FFFFCC">
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
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="member.php">สินค้าขายดี</a></li>
                                <li><a class="dropdown-item" href="member.php">สินค้าใหม่</a></li>
                            </ul>
                        <li class="nav-item"><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
                        </li>
                    </ul>
                    <form class="d-flex pl-2" action="cart.php">
                        <a class="nav-link active mt-2 text-dark" aria-current="page" href="./profile.php"> <?php echo $_SESSION['User_first']; ?></a>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                            <li class="nav-item"><a class="nav-link active mt-2" aria-current="page" href="./logout.php">ออกจากระบบ</a></li>
                        </ul>
                        </li>
                    </form>
                </div>
            </div>
        </nav>
    <body onload="startCountDown()">


      <div class="wrapper">
        <header class="text-center mt-5">
          <a>
            <img src="../fontend/user/assets/logo.png" width="160px">
          </a>
        </header>
      </div>
      <section class="vh-100 bg-image style= background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center">

          <div class="card container" style="border-radius: 15px; width:700px">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">QR code</h2>
              <h4 class="text-uppercase text-center mb-5">
                <div id="timer"></div>
              </h4>
              <div id="popup" style="display: none;">
                <div>
                  <p>หมดเวลาแล้ว กรุณากดยอมรับเพื่อไปยังหน้า member.php</p>
                  <button onclick="submitForm()">ยอมรับ</button>
                </div>
              </div>
              <?Php
              require_once("lib/PromptPayQR.php");



              if (isset($_POST['total'])) {
                $total = $_POST['total'];
                $PromptPayQR = new PromptPayQR(); // new object
                $PromptPayQR->size = 5; // Set QR code size to 8
                $PromptPayQR->id = '0958916772'; // PromptPay ID
                $PromptPayQR->amount = $total; // Set amount to user input
                echo '<center><img src="' . $PromptPayQR->generate() . '" />';
              }

              ?>
              <form id="myForm" name="myForm" method="post" enctype="multipart/form-data" name="upfile" id="upfile" action="saveorder.php">



                <div class="container my-5">
                  <div class="row justify-content-center">
                    <div class="col-lg-9">
                      <h4 class="mb-3">รายละเอียดการโอน</h4>
                      <div class="row g-3">
                        <div class="col-md-12">
                          <label for="your-name" class="form-label">อัปโหลดสลีป</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="p_img" required accept="image/*" onchange="previewFile()">
                            <label class="custom-file-label" for="customFile" id="customFileLabel">Choose file</label>
                          </div>
                          <img src="" alt="Image preview" id="imagePreview" style="max-width: 200px; max-height: 200px; display: none;">
                        </div>
                        <div class="col-md-12">
                          <label for="your-date" class="form-label"><br>วันที่</label>
                          <input name="p_date" type="date" id="p_date" class="form-control" required value="">
                        </div>
                        <div class="col-md-12">
                          <label for="time" class="form-label"><br>เวลา</label>
                          <input name="p_time" type="time" id="p_time" class="form-control " required value="">


                          <input type="hidden" name="total" value="<?php echo $total; ?>">

                          <input hidden name="name" type="text" id="name" class="form-control" required value="<?php echo $_SESSION["user"]; ?>">
                          <input hidden name="email" type="email" id="email" class="form-control " required value="<?php echo $_SESSION["email"]; ?>">
                          <textarea hidden class="form-control" id="address" name="address" rows="5" required><?php echo $_SESSION["User_address"]; ?></textarea>
                          <input hidden class="form-control" name="phone" type="text" id="phone" required value="<?php echo $_SESSION["User_tel"]; ?>">

                          <?php
                          $total = 0;
                          foreach ($_SESSION['cart'] as $Menu_ID => $qty) {
                            $sql  = "SELECT * FROM menu WHERE Menu_ID=$Menu_ID";
                            $query  = mysqli_query($con, $sql);
                            $row  = mysqli_fetch_array($query);
                            $menu_id = $row['Menu_ID'];
                            $sum  = $row['Menu_price'] * $qty;
                            $total  += $sum;
                          }

                          ?>

                        </div>


                        <div class="col-12 mt-3">
                          <div class="row">
                            <div class="col-md-12">
                              <button type="submit" name="Submit2" class="btn btn-success w-100 fw-bold">ยืนยัน</button><br>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-12">
                            <button type="button" onclick="cancel()" class="btn btn-danger w-100 fw-bold">ยกเลิก</button>                            </div>
                          </div>
                        </div>
                      </div>
              </form>
            </div>
          </div>
        </div>
        </form>
        </div>
        </div>
        </div>
      </section>
      <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
        include("footer.php");
        ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Core theme JS-->
      <script src="js/scripts.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      <script>
        function previewFile() {
          var preview = document.querySelector('#imagePreview');
          var file = document.querySelector('input[type=file]').files[0];
          var fileName = document.querySelector('#customFileLabel');

          var reader = new FileReader();

          reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
          }

          if (file) {
            reader.readAsDataURL(file);
            fileName.textContent = file.name;
          } else {
            preview.src = '';
            preview.style.display = 'none';
            fileName.textContent = 'Choose file';
          }
        }
      </script>
<script>
  var countDownDate = new Date().getTime() + (2.5 * 60 * 1000); // 2 minutes from now
  var x;

  function startCountDown() {
    x = setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now;

      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("timer").innerHTML = "ระยะเวลาในการทำรายการ  <br><br>" + minutes + " นาที " + seconds + " วินาที ";

      if (distance < 0) {
        expire();
      }
    }, 1000);
  }

  function expire() {
  clearInterval(x);
  document.getElementById("timer").innerHTML = "หมดระยะเวลาทำรายการ";
  alert("หมดเวลาในการทำรายการ"); // แสดง alert
  window.location.href = "../fontend/user/member.php"; // นำทางไปยังหน้า member
}

  function submitForm() {
    clearInterval(x);
    document.forms["myForm"].action = "../fontend/user/member.php";
    document.forms["myForm"].submit();
  }
</script>

<script>
  function cancel() {
    document.getElementById("myForm").reset(); // เคลียร์ค่าฟอร์ม
    window.location.href = "../fontend/user/member.php"; // ไปยังหน้า member
  }
</script>




    </body>
  <?php } ?>

  </html>