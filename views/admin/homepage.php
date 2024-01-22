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
    <?php
    include '../../sidebar.php';
    ?>

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
