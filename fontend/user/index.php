<?php

include("../../backend/connectDB.php");

$sql = "SELECT * FROM `menu`";
$menuResult = mysqli_query($con, $sql);
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>หน้าแรก</title>
    <!-- Favicon-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="assets/logo.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai">
    <style>
        body {
            font-family: 'IBM Plex Sans Thai';
            font-size: 20px;
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-warning" href="index.php"><strong>CHAMNONG PASTRY SHOP</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active text-black-50" aria-current="page" href="index.php">หน้าแรก</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">สินค้าของเรา</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">สินค้าทั้งหมด</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="index.php">สินค้าขายดี</a></li>
                            <li><a class="dropdown-item" href="index.php">สินค้าใหม่</a></li>
                        </ul>
                    <li class="nav-item"><a class="nav-link" href="contact.php">ติดต่อเรา</a></li>
                    </li>
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <?php if (isset($_SESSION['User_first'])) : ?>
                            <li class="nav-item"><a class="nav-link active mt-2 text-black" aria-current="page" href="./profile.php"><?php echo $_SESSION['User_first']; ?></a></li>
                            <li class="nav-item"><a class="nav-link active" href="../../backend/logout.php">ออกจากระบบ</a></li>
                        <?php else : ?>
                            <li class="nav-item"><a class="nav-link active" href="fromlogin.php">เข้าสู่ระบบ/สมัครสมาชิก</a></li>
                        <?php endif; ?>
                    </ul>
                    <button class="btn btn-outline-warning" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        ตะกร้าสินค้า
                        <span class="badge bg-warning text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>

            </div>
        </div>
    </nav>

    <!-- Header-->
    <header class="bg-dark py-0">
        <div class="text-center text-white ">
            <a href="">
                <img src="assets/page1.jpg" width="100%" class="zoom">
            </a>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                // คำนวณหน้าที่เริ่มต้นและจำนวนเมนูต่อหน้า
                $itemsPerPage = 5;
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($currentPage - 1) * $itemsPerPage;
                $end = $start + $itemsPerPage;

                // ดึงข้อมูลเมนูทั้งหมด
                $menu = [];

                while ($row = mysqli_fetch_assoc($menuResult)) {
                    $menu[] = $row;
                }

                // วนลูปแสดงเมนูตามหน้าที่กำหนด
                for ($i = $start; $i < $end && $i < count($menu); $i++) {
                    $row = $menu[$i];
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img src="../admin/<?php echo $row['menu_pic']; ?>" width='75%' height='150' class="card-img-top" alt="...">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $row['Menu_Name'] ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <?php echo $row['Menu_price'] ?> บาท
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <div class="text-center"><a href="fromlogin.php" class="btn btn-outline-dark mt-auto">หยิบใส่ตะกร้า</a></div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <?php
                    $totalPages = ceil(count($menu) / $itemsPerPage);
                    if ($totalPages > 1) {
                        for ($i = 1; $i <= $totalPages; $i++) {
                            $activeClass = ($i == $currentPage) ? "active" : "";
                    ?>
                            <li class="page-item <?php echo $activeClass; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </section>
    <!-- Footer-->
    <?php
    include("footer.php");
    ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>