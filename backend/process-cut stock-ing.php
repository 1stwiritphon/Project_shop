<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

include("connectDB.php");

if (isset($_POST['o_id'])) {
  $o_id = $_POST['o_id'];

  // Start a transaction to ensure that all updates are successful before committing
  mysqli_autocommit($con, false);

  // Define the SQL query to check the inventory quantity
  $sql_check_inventory = "SELECT i.INV_qty, c.INV_qty as required_qty FROM inventory i, ingredient c WHERE i.INV_name = c.INV_name AND c.Menu_Name IN (SELECT m.Menu_Name FROM order_detail o, menu m WHERE o.o_id = '$o_id' AND o.menu_id = m.menu_id)";

  // Execute the SQL query to check the inventory quantity
  $result_check_inventory = mysqli_query($con, $sql_check_inventory) or die("Error in query: $sql_check_inventory " . mysqli_error($con));

  // Check if the required inventory quantity is available
  $inventory_available = true;
  while ($row = mysqli_fetch_assoc($result_check_inventory)) {
    if ($row['INV_qty'] < $row['required_qty']) {
      $inventory_available = false;
      break;
    }
  }

  if ($inventory_available) {
    // Define the SQL query to update the inventory quantity
    // Define the SQL query to update the inventory quantity
    $sql_update_inventory = "UPDATE inventory i
INNER JOIN (
    SELECT c.INV_Name, c.INV_qty * od.d_qty AS required_qty
    FROM ingredient c
    INNER JOIN menu m ON c.Menu_Name = m.Menu_Name
    INNER JOIN order_detail od ON od.menu_id = m.menu_id
    WHERE od.o_id = '$o_id'
) AS sub
ON i.INV_name = sub.INV_Name
SET i.INV_qty = (i.INV_qty - sub.required_qty)";



    // Execute the SQL query to update the inventory quantity
    $result_update_inventory = mysqli_query($con, $sql_update_inventory);

    // Check if the inventory update was successful
    if (mysqli_affected_rows($con) > 0) {
      // Define the SQL query to update the order status
      $sql_update_order_status = "UPDATE order_detail SET status = 2, update_time = NOW() WHERE o_id = '$o_id'";

      // Execute the SQL query to update the order status
      $result_update_order_status = mysqli_query($con, $sql_update_order_status);

      // Check if the order status update was successful
      if (mysqli_affected_rows($con) > 0) {
        // Commit the transaction if all updates were successful
        mysqli_commit($con);
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'แจ้งเตือน',
                text: 'สำเร็จ ',
                icon: 'success',
                timer: 5000,
                showConfirmButton: true,
                }).then((result) => {
                // Go to login page
                window.location.href = '../fontend/admin/order-progress.php';
            });
        })
      </script>";
      } else {
        // Rollback the transaction if the order status update failed
        mysqli_rollback($con);
        echo "Order status update failed. Inventory updated successfully but order status was not updated.";
      }
    } else {
      // Rollback the transaction if the inventory update failed
      mysqli_rollback($con);
      echo "Order status update failed. Inventory update failed.";
    }
  } else {
    // Rollback the transaction if the required inventory is not available
    mysqli_rollback($con);

    // Define the SQL query to rollback the inventory quantity update
    $sql_rollback_inventory = "UPDATE inventory i
                         SET i.INV_qty = (i.INV_qty + (SELECT c.INV_qty * od.d_qty
                                                      FROM ingredient c
                                                      INNER JOIN menu m ON c.Menu_Name =m.Menu_Name
                                                      INNER JOIN order_detail od ON od.menu_id = m.menu_id
                                                      WHERE c.INV_Name = i.INV_name AND od.o_id = '$o_id'))
                         WHERE i.INV_name IN (SELECT c.INV_Name
FROM ingredient c
INNER JOIN menu m ON c.Menu_Name =m.Menu_Name
INNER JOIN order_detail od ON od.menu_id = m.menu_id
WHERE od.o_id = '$o_id')";

    if (mysqli_query($con, $sql_rollback_inventory)) {
      // Rollback successful
      echo "<script>
  $(document).ready(function() {
      Swal.fire({
          title: 'แจ้งเตือน',
          text: 'วัตถุดิบไม่เพียงพอ ',
          icon: 'warning',
          timer: 5000,
          showConfirmButton: true,
          }).then((result) => {
          // Go to login page
          window.location.href = '../fontend/admin/order-customer.php';
      });
  })
</script>";
      $sql_update_order_status = "UPDATE order_detail SET status = 1, update_time = NOW() WHERE o_id = '$o_id'";
      $result_update_order_status = mysqli_query($con, $sql_update_order_status);
    } else {
      // Rollback failed
      echo "<script>
  $(document).ready(function() {
          Swal.fire({
            title: 'Error',
            text: 'Inventory rollback failed',
            icon: 'error',
          });
        })
        </script>";
    }
  }
}
mysqli_error($con);
?>