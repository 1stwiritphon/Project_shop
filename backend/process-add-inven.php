<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//1. เชื่อมต่อ database: 
include('connectDB.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้
$inv_names = $_POST['inv_name'];
$inv_qtys = $_POST['inv_qty'];
$inv_units = $_POST['inv_unit'];


foreach ($inv_names as $key => $inv_name) {
    $sql_check_duplicate = "SELECT * FROM inventory WHERE INV_name = '" . $inv_name . "' LIMIT 1";
    $result_check_duplicate = mysqli_query($con, $sql_check_duplicate);
    //var_dump($result_check_duplicate);
    if ($result_check_duplicate && mysqli_num_rows($result_check_duplicate) > 0) {
        continue; // ถ้าชื่อวัตถุดิบซ้ำกับข้อมูลที่มีอยู่แล้วให้ข้ามไป
    }
    // ถ้าไม่ซ้ำให้เพิ่มข้อมูลลงในฐานข้อมูล
    $sql_insert = "INSERT INTO inventory (INV_name, INV_qty, INV_Unit, INV_date) 
    VALUES ('" . $inv_name . "', '" . $inv_qtys[$key] . "', '" . $inv_units[$key] . "', DATE_ADD(NOW(), INTERVAL 7 DAY))";
    mysqli_query($con, $sql_insert);

}
	
if($con)
{
    echo "<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'ยินดีด้วย',
            text: 'เพิ่มวัตถุดิบสำเร็จ',
            icon: 'success',
            timer: 5000,
        }).then((result) => {
            // Go to login page
            window.location.href = '../fontend/admin/inventory.php';
        });
    })
</script>";
}
else{
echo "<script>
$(document).ready(function() {
Swal.fire({
    title: 'ขออถัย',
    text: 'เพิ่มวัตถุดิบไม่สำเร็จ',
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
mysqli_close($con);
?>