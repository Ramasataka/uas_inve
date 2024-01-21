<?php
$title = 'KOMPUTER.CO | HOMEPAGE';
include '../../header.php';
$check = $system->checkLogin();
if (!$check) {
    $redirectUrl = "../../index.php";
    header("Location: $redirectUrl");
    exit;
}
if (isset($_POST['logout'])) {
    $system->logout();
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<body>

<main class="d-flex text-bg-dark">
    <!-- sidebar -->
    <div id="mainbody" class="d-flex flex-column p-3 vh-100 text-bg-dark" 
            style="width: 280px; height: 100%; overflow-y: auto; width: 280px;
                    height: 100%;
                    overflow-y: auto;
                    box-shadow: 5px 0px 10px rgba(0, 0, 0, 0.2);">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"></svg>
            <span class="fs-4">Side Menu</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#homepage.php" class="nav-link active" aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    HOME
                </a>
            </li>
            <br>
            <li>
                <a href="barang-tambah-data.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    BARANG
                </a>
            </li>
            <br>
            <li>
                <a href="vendor-tambah-data.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    VENDOR
                </a>
            </li>
            <br>
            <li>
                <a href="user-tambah.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    KARYAWAN
                </a>
            </li>
            <br>
            <li>
                <a href="barsuk.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    BARANG MASUK
                </a>
            </li>
            <br>
            <li>
                <a href="barkel.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    BARANG KELUAR
                </a>
            </li>
        </ul>
        <br>
        <hr class="mt-4">
        <div class="dropdown">
            <form action="" method="POST">
                <button type="input" name="logout" class="btn btn-primary">LOGOUT</button>
            </form>
        </div>
    </div>
    <!-- sidebar -->

    <!-- content -->
    <div class="container-fluid flex-grow-1">
        <h1 class="m-3">DASHBOARD</h1>

        <div class="container mb-3">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card bg-info">
                        <!-- Your card content here -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="justify-content-start">
                                    <h1 class="ms-4" style="font-size:120px"></h1>
                                    <p class="ms-4">TOTAL MAHASISWA</p>
                                </div>
                                <i class="fa-solid fa-user-group m-4" style="font-size:100px"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card bg-info">
                        <!-- Your card content here -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="justify-content-start">
                                    <h1 class="ms-4" style="font-size:120px"></h1>
                                    <p class="ms-4">TOTAL DOSEN</p>
                                </div>
                                <i class="fa-solid fa-school m-4" style="font-size:100px"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card bg-info">
                        <!-- Your card content here -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="justify-content-start">
                                    <h1 class="ms-4" style="font-size:120px"> </h1>
                                    <p class="ms-4">TOTAL JURUSAN</p>
                                </div>
                                <i class="fa-solid fa-graduation-cap m-4" style="font-size:100px"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
</main>

</body>
