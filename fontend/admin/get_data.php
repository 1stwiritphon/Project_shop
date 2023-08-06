<?php
// เชื่อมต่อกับฐานข้อมูล
// คุณต้องมีการเชื่อมต่อกับฐานข้อมูล MySQL ก่อน
// และสร้างตัวแปร $con ให้เป็นการเชื่อมต่อกับฐานข้อมูล
include("../../backend/connectDB.php");
header('Content-Type: application/json');

// คำสั่ง SQL สำหรับดึงข้อมูล


// Perform the SQL query
$sql = "SELECT a.menu_id, a.menu_name, SUM(b.d_qty) AS total_qty
        FROM menu a
        INNER JOIN order_detail b ON a.menu_id = b.menu_id
        INNER JOIN order_head c ON b.o_id = c.o_id
        WHERE c.o_dttm >= DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')
        GROUP BY a.menu_id, a.menu_name
        ORDER BY total_qty DESC";

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
