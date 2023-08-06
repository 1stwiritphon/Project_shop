<?php
session_start();
session_unset();
session_destroy();
header("Location: ../fontend/user/index.php");
exit();
?>