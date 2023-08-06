<!doctype html>
<html>
    <head>
        <title> รับค่าการแก้ไข้ข้อมูล </title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 

include("connectDB.php");

//$fileupload = $_POST['menu_pic']; //รับค่าไฟล์จากฟอร์ม	
$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');


//ฟังก์ชั่นวันที่
        date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
         $numrand = (mt_rand());
//เพิ่มไฟล์
$upload=$_FILES['menu_pic'];
if($upload !='') 
    {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
            $path="../fontend/admin/fileupload/";  

        //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
            $type = strrchr($_FILES['menu_pic']['name'],".");
            
//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
            $newname = $date.$numrand.$type;
            $path_copy=$path.$newname;
            $path_link="fileupload/".$newname;

            move_uploaded_file($_FILES['menu_pic']['tmp_name'],$path_copy); 
     }



$Menu_Name = $_POST['Menu_Name'];
$Menu_price= $_POST['Menu_price'];
$Menu_ID = $_POST['Menu_ID'];

$sql = "UPDATE menu set 

Menu_Name = '$Menu_Name', 
Menu_price = '$Menu_price',
menu_pic = '$path_link'
where Menu_ID = $Menu_ID
       
";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));
if($result) {
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'สำเร็จ',
            text: 'Update เมนูสำเร็ส',
            icon: 'success',
            timer: 5000,
            showConfirmButton: true
        });
    })
</script>"; }
mysqli_close($con);
?>
</body>
</html>
<meta http-equiv = "refresh" content = "1;URL = ../fontend/admin/menu.php">

