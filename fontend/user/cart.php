<?php
session_start();
include("../../backend/connectDB.php"); 
//echo"<pre>";
//print_r($_SESSION);
//echo"</pre>";


if ($_SESSION['userstatus'] !='Member'){  //check session

	  Header("Location: fromlogin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{ 

	@$Menu_ID = mysqli_real_escape_string($con,$_GET['Menu_ID']); 
	@$act = mysqli_real_escape_string($con,$_GET['act']);

	if($act=='add' && !empty($Menu_ID))
	{
		if(isset($_SESSION['cart'][$Menu_ID]))
		{
			$_SESSION['cart'][$Menu_ID]++;
		}
		else
		{
			$_SESSION['cart'][$Menu_ID]=1;
		}
	}

	if($act=='remove' && !empty($Menu_ID))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$Menu_ID]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $Menu_ID=>$amount)
		{
			$_SESSION['cart'][$Menu_ID]=$amount;
		}
	}
?>
<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<title>Shopping Cart</title>

		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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
                    <form class="d-flex pl-5" action="cart.php">
                        <a class="nav-link active mt-2 text-dark" aria-current="page" href="./profile.php"> <?php echo $_SESSION['User_first']; ?></a>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                            <li class="nav-item"><a class="nav-link active mt-2" aria-current="page" href="../../backend/logout.php">ออกจากระบบ</a></li>
                        </ul>
                        </li>
                    </form>
                </div>
            </div>
        </nav>
		<div class="wrapper">
			<header class="text-center mt-5">
				<a href="login.php">
					<img src="assets/logo.png" width="160px">
				</a>
			</header>
		</div>
		<!-- Section-->
		<section class="vh-100 bg-image style= background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
			<div class="mask d-flex align-items-center">

				<div class="card container" style="border-radius: 15px; width:700px">
					<div class="card-body p-5">
						<h2 class="text-uppercase text-center mb-5">ตะกร้าสินค้า</h2>
						<form id="frmcart" name="frmcart" method="post" action="?act=update">
							<table width="600" border="0" align="center" class="square">
								<tr>
									<td colspan="5" bgcolor="#CCCCCC">
										<b>ตะกร้าสินค้า</span>
									</td>
								</tr>
								<tr >
									<td bgcolor="#EAEAEA">สินค้า</td>
									<td align="center" bgcolor="#EAEAEA">ราคา</td>
									<td colspan="5" align="center" bgcolor="#EAEAEA">จำนวน</td>
									
								</tr>
								<?php
								$total = 0;
								if (!empty($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $Menu_ID => $qty) {
										$sql = "SELECT * FROM menu WHERE Menu_ID=$Menu_ID";
										$query = mysqli_query($con, $sql);
										$row = mysqli_fetch_array($query);
										$sum = $row['Menu_price'] * $qty;
										$total += $sum;
										echo "<tr>";
										echo "<td width='334'>" . $row["Menu_Name"] . "</td>";
										echo "<td width='46' align='right'>" . number_format($row["Menu_price"], 2) . "</td>";
										echo "<td width='57' align='right'>";
										echo "<td><input type='number' name='amount[$Menu_ID]' value='$qty' size='2'/></td>";

										//remove product
										echo "<td width='46' align='center'><a href='cart.php?Menu_ID=$Menu_ID&act=remove'>ลบ</a></td>";
										echo "</tr>";
									}
									echo "<tr>";
									echo "<td colspan='3' bgcolor='#CEE7FF' align='center mt-3'><b>ราคารวม</b></td>";
									echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
									echo "<td align='left' bgcolor='#CEE7FF'></td>";
									echo "</tr>";
								}
								?>
								<tr>
									<td><a class="btn btn-danger" href="member.php">กลับหน้ารายการสินค้า</a></td>
									<td colspan="4" align="right">
										<input class="btn btn-primary mt-3" type="submit" name="button" id="button" value="รีเฟรช" />
										<input class="btn btn-success mt-3" type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='../../backend/confirm.php';" />
									</td>
								</tr>
							</table>
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
		<?php
        include("footer.php");
        ?>
		<!-- Footer-->
		<!-- Bootstrap core JS-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- Core theme JS-->
		<script src="js/scripts.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
<?php } ?>

	</html>