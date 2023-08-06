

<?php
// เชื่อมต่อกับฐานข้อมูล
// คุณต้องมีการเชื่อมต่อกับฐานข้อมูล MySQL ก่อน
// และสร้างตัวแปร $con ให้เป็นการเชื่อมต่อกับฐานข้อมูล
include("../../backend/connectDB.php");
header('Content-Type: application/json');

// คำสั่ง SQL สำหรับดึงข้อมูล


// Perform the SQL query
$sql = "SELECT c.INV_Name AS รายชื่อ, c.INV_Unit AS หน่วย, SUM(c.INV_qty * od.d_qty) AS ยอดรวมที่ใช้
FROM ingredient c
INNER JOIN menu m ON c.Menu_Name = m.Menu_Name
INNER JOIN order_detail od ON od.menu_id = m.menu_id
INNER JOIN order_head oh ON oh.o_id = od.o_id
WHERE MONTH(oh.o_dttm) = MONTH(CURRENT_DATE)
GROUP BY c.INV_Name, c.INV_Unit


";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Fetch data and store in an array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Return data as JSON
    echo json_encode($data);
} else {
    echo "No data found";
}

$con->close();
