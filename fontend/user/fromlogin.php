<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>ลงชื่อเข้าใช้</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai">
          <style>
            body {
        font-family: 'IBM Plex Sans Thai';
        font-size: 20px;
      }
    </style>

</head>

<body style="background-image: url('assets/bg.jpg');">
    <div class="wrapper">
        <header class="text-center mt-5">
            <a href="login.php">
                <img src="assets/logo.png" width="160px">
            </a>
        </header>
    </div>
    <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">เข้าสู่ระบบ</h2>

                <form action="../../backend/login.php" method="post">
                        <div class="form-group">
                        <label for="">ชื่อผู้ใช้</label>
                            <input type="text" name="username" class="form-control"required>
                        </div>
                        <div class="form-group">
                        <label for="">รหัสผ่าน</label>
                            <input type="password" name="password" class="form-control" minlength="5" maxlength="10" id="password" required>
                            
                        </div>
                      <div class="text-center mt-5">
                        <button name="submit" type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                        <a href="register.php" class="btn btn-danger"> สมัครสมาชิก </a>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>