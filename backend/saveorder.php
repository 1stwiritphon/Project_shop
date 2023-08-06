<?php
session_start();
include("connectDB.php");
$user_id = $_SESSION['User_ID'];
$username = $_SESSION['username'];
if(isset($_SESSION['cart'])) {
	$cart = $_SESSION['cart'];
 } else {
	$cart = array();
 }
 


?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Confirm</title>
</head>

<body>
	<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
	<?php

	// สร้างฟังก์ชั่นสุ่มเลขที่ใบสั่งซื้อ
	function generate_order_number()
	{
		$prefix = "MCNS"; // เพิ่ม prefix ที่ต้องการ
		$length = 8; // กำหนดความยาวของเลขที่ใบสั่งซื้อ
		$characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // กำหนดตัวเลขที่ใช้สุ่ม
		$random_string = $prefix; // เพิ่ม prefix ลงในเลขที่ใบสั่งซื้อ
		for ($i = 0; $i < $length; $i++) {
			$random_string .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $random_string;
	}

	// สร้างฟังก์ชั่นตรวจสอบเลขที่ใบสั่งซื้อซ้ำ
	function check_order_number($random_string, $con)
	{
		// ใช้ mysqli_real_escape_string() เพื่อป้องกัน SQL injection
		$random_string = mysqli_real_escape_string($con, $random_string);

		// สร้างคำสั่ง SQL เพื่อตรวจสอบเลขที่ใบสั่งซื้อ
		$sql = "SELECT * FROM order_head WHERE o_number = '$random_string'";

		// ส่งคำสั่ง SQL ไปยังฐานข้อมูล
		$result = mysqli_query($con, $sql);


		// ตรวจสอบว่าคำสั่ง SQL ทำงานได้สำเร็จหรือไม่
		if ($result) {
			// ตรวจสอบว่ามีเลขที่ใบสั่งซื้อนี้อยู่ในฐานข้อมูลหรือไม่
			if (mysqli_num_rows($result) > 0) {
				// เลขที่ใบสั่งซื้อซ้ำ สุ่มเลขใหม่แล้วตรวจสอบอีกครั้ง
				$new_order_number = generate_order_number();
				return check_order_number($new_order_number, $con);
			} else {
				// เลขที่ใบสั่งซื้อไม่ซ้ำ ส่งค่ากลับ
				return $random_string;
			}
		} else {
			// คำสั่ง SQL ทำงานไม่สำเร็จ แสดง error message
			echo "Error: " . mysqli_error($con);
		}
	}
	//$fileupload = $_POST['p_img']; //รับค่าไฟล์จากฟอร์ม	
	$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');


	//ฟังก์ชั่นวันที่
	date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");
	//ฟังก์ชั่นสุ่มตัวเลข
	$numrand = (mt_rand());
	//เพิ่มไฟล์
	$upload = $_FILES['p_img'];
	if ($upload != '') {   //not select file
		//โฟลเดอร์ที่จะ upload file เข้าไป 
		$path = "fileupload/payment/";

		//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
		$type = strrchr($_FILES['p_img']['name'], ".");

		//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
		$newname = "payment"."-" . $username. "-" .$date . $type;
		$path_copy = $path . $newname;
		$path_link = "fileupload/payment/" . $newname;

		move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
	}

	$name = $_POST["name"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$total = $_POST["total"];
	$date = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
	$dttm = $date->format('Y-m-d G:i:s');
	$o_number = generate_order_number();
	$o_number = check_order_number($o_number, $con); // ตรวจสอบเลขที่ใบสั่งซื้อซ้ำ
	$p_date = $_POST["p_date"];
	$p_time = $_POST["p_time"];

	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($con, "BEGIN");
	$sql1	= "INSERT INTO order_head 
	values(null, 
	'$dttm', 
	'$name', 
	'$address', 
	'$email', 
	'$phone', 
	'$total',
	'$o_number')";
	$query1	= mysqli_query($con, $sql1); // or die ("Error in Query :" . mysqli_error($sql1));




	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "SELECT MAX(o_id) as o_id 
	FROM order_head 
	WHERE o_name='$name' 
	AND email='$email' 
	AND o_dttm='$dttm' ";

	$query2	= mysqli_query($con, $sql2);
	$row = mysqli_fetch_array($query2);
	$o_id = $row["o_id"];


	//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach ($_SESSION['cart']  as $Menu_ID => $qty) {
		$sql3	= "SELECT * FROM menu  where Menu_ID=$Menu_ID ";
		$query3	= mysqli_query($con, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$menutotal	= $row3['Menu_price'] * $qty;

		$sql4	= "INSERT INTO order_detail 
		VALUES
		(
		null,
		$o_id,
		$user_id,
		$Menu_ID,
		$qty, 
		$menutotal,
		1,
		null
		)";

		$query4	= mysqli_query($con, $sql4);


	}

	$sqlbill	= "INSERT INTO payment 
	values(null,  
	'$o_number', 
	'$p_date', 
	'$p_time', 
	'$total',
	'$path_link')";
	$querybill	= mysqli_query($con, $sqlbill); // or die ("Error in Query :" . mysqli_error($sql1));


	print_r($sql4);
	


	if ($query1 && $querybill) {
		mysqli_query($con, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach ($_SESSION['cart'] as $Menu_ID) {
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	} else {
		mysqli_query($con, "ROLLBACK");
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
	}
	?>
	<script type="text/javascript">
		alert("<?php echo $msg; ?>");
		window.location = '../fontend/user/member.php';
	</script>






</body>

</html>