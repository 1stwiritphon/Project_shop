<!doctype html>
<html>
    <head>
        <title> รับค่าการแก้ไข้ข้อมูล </title>
</head>
<body>
<?php 
include("connectDB.php");

$INV_name = $_POST['INV_name'];
$INV_qty = $_POST['INV_qty'];
$INV_ID =$_POST['INV_ID'];


$sql = " UPDATE inventory set

INV_name = '$INV_name',
INV_qty = '$INV_qty'
WHERE INV_ID = $INV_ID

";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
 
mysqli_close($con); //ปิดการเชื่อมต่อ database 
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = user.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
        echo "window.location = 'user.php'; ";
	echo "</script>";
}
?>
</body>
</html>
<meta http-equiv = "refresh" content = "1;URL = ../fontend/admin/user.php">

