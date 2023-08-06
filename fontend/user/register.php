<?php 
session_start(); 
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>





<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai">
          <style>
            body {
        font-family: 'IBM Plex Sans Thai';
        
      }
    </style>
    <title>สมัครสมาชิก</title>
</head>
<body style="background-image: url('assets/bg.jpg');">

   
<div class="wrapper">
        <header class="text-center mt-5">
          <a href="index.php">
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
              <h2 class="text-uppercase text-center mb-5">สมัครสมาชิก</h2>
              <form name="regis" action="../../backend/save.php" method="post">
              
                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example1cg">ชื่อผู้ใช้</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" required ="กรอกชื่อผู้ใช้"name="username"/>
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example3cg">รหัสผ่าน</label>
                  <input type=password id="password" class="form-control form-control-lg" minlength="5" maxlength="10" required name="password" />
                </div>
                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example3cg">ยืนยันรหัสผ่าน</label>
                  <input type=password id="confirm_password" class="form-control form-control-lg" minlength="5" maxlength="10" required name="confirm_password" />
                </div>
                
                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">ชื่อ</label>
                  <input type="text" id="User_first" class="form-control form-control-lg" required name="User_first" />
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">นามสกุล</label>
                  <input type="text" id="User_last" class="form-control form-control-lg" required name="User_last" />
                  
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">ที่อยู่</label>
                  <input type="text" id="User_address" class="form-control form-control-lg" required name="User_address" />
                  
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">เบอร์มือถือ</label>
                  <input type="text" id="User_tel" class="form-control form-control-lg" required name="User_tel" />
                  
                </div>

                <div class="form-outline mb-4">
               <label class="form-label" for="form3Example4cg">อีเมลล์</label>
                  <input type="email" id="User_email" class="form-control form-control-lg" required name="User_email" />
                  
                    <select hidden id="inputStatus" class="form-control custom-select" name="userstatus" >
                        <option value="Member" selected>Member</option>
                    </select>
                </div>



                <div class="d-flex justify-content-center">
                  
                    <input class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white" type=submit name="submit" value="สมัครสมาชิก">
                </div>

                <p class="text-center text-muted mt-5 mb-0">คุณมีบัญชีแล้ว ? <a href="fromlogin.php"
                    class="fw-bold text-body"><u> เข้าสู่ระบบ </u></a></p>
                            </form>
                    </div>
            </div>
        </div>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
		$(document).ready(function() {
			$('#myForm').submit(function(event) {
				event.preventDefault(); // Prevent the form from submitting normally

				// Get form data
				var formData = $(this).serialize();

				// Send form data to PHP script for validation
				$.ajax({
					url: 'php/save.php',
					type: 'POST',
					data: formData,
					success: function(response) {
						if (response == 'success') {
							// Display success message and redirect to another page
							Swal.fire({
								title: 'Success',
								text: 'Form submitted successfully',
								icon: 'success',
								timer: 5000,
								showConfirmButton: false
							}).then(function() {
								window.location.href = 'another_page.php';
							});
						} else {
							// Display error message
							Swal.fire({
								title: 'Error',
								text: 'Form submitted successfully',
								icon: 'error',
								timer: 5000,
								showConfirmButton: false
							});
						}
					}
				});
			});
		});
	</script>
<?php
        echo'<script>https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js</script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"/>
       <script>
           setTimeout(funtion()){
               swal({
                   title : " ชื่อบัญชีผู้ใช้ หรือ Email ซ้ำ ",
                   text : " กรุณาลองใหม่อีกครั้ง ",
                   type : " success "
               }, funtion(){
                   window.history.back;
               })
               },1000);
       <script/>
       ';
?>

</body>
</html>