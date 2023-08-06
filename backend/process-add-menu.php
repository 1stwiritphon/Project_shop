<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
//1. เชื่อมต่อ database: 
include('connectDB.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$menu_name = $_POST['Menu_name'];
$menu_price = $_POST['Menu_price'];
$inv_names = $_POST['inv_name'];
$inv_qtys = $_POST['inv_qty'];
$inv_units = $_POST['inv_unit'];
//$fileupload = $_POST['Menu_pic']; //รับค่าไฟล์จากฟอร์ม	



//$fileupload = $_POST['Menu_pic']; //รับค่าไฟล์จากฟอร์ม	
$fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');


//ฟังก์ชั่นวันที่
        date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
         $numrand = (mt_rand());
//เพิ่มไฟล์
$upload=$_FILES['Menu_pic'];
if($upload !='') 
    {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
            $path="../fontend/admin/fileupload/";  

        //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
            $type = strrchr($_FILES['Menu_pic']['name'],".");
            
//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
            $newname = $date.$numrand.$type;
            $path_copy=$path.$newname;
            $path_link="fileupload/".$newname;

            move_uploaded_file($_FILES['Menu_pic']['tmp_name'],$path_copy); 
     }

// Insert data into "ingredient" table
$sql_ingredient = "INSERT INTO ingredient (Menu_name, INV_Name, INV_qty, INV_Unit)
                  VALUES (?, ?, ?, ?)";
$stmt_ingredient = $con->prepare($sql_ingredient);


// Insert data into "Menu" table
$sql_menu = "INSERT INTO Menu (Menu_name, Menu_price, Menu_pic)
             VALUES (?, ?, ?)";
$stmt_menu = $con->prepare($sql_menu);

// Loop through each ingredient item and insert into both tables
for ($i = 0; $i < count($inv_names); $i++) {
    // Insert data into "ingredient" table
    $stmt_ingredient->bind_param("ssis", $menu_name, $inv_names[$i], $inv_qtys[$i], $inv_units[$i]);
    $stmt_ingredient->execute();

    // Insert data into "Menu" table (only on the first iteration)
    if ($i == 0) {
        $stmt_menu->bind_param("sds", $menu_name, $menu_price, $path_link);
        $stmt_menu->execute();
    }
}

$stmt_ingredient->close();
$stmt_menu->close();
$con->close();

    //javascript แสดงการ upload file
	
	if($con)
            {
                echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'ยินดีด้วย',
                        text: 'เพิ่มเมนูสำเร็จแล้ว',
                        icon: 'success',
                        timer: 5000,
                    }).then((result) => {
                        // Go to login page
                        window.location.href = '../fontend/admin/menu.php';
                    });
                })
            </script>";
	        }
	else{
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'ขออถัย',
                text: 'เพิ่มเมนูไม่สำเร็จ',
                icon: 'error',
                timer: 5000,
                showConfirmButton: true,
            }).then((result) => {
                // Go back to form
                setTimeout(function() {
                window.history.back();
            }, 500);
    });
})
</script>";
        }
?>


    


















