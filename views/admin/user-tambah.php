<?php

$title = 'KOMPUTER.CO | TAMBAH KARYAWAN';
include '../../header.php';
$check = $system->checkLogin();
$user = new User();
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
if (isset($_POST['simpan_data'])){
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email= $_POST['email'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $foto = $_FILES['foto'];
    $user->tambahData($nama, $username, $password, $email, $alamat, $telp, $foto);
}

?>

<body>
<div class="flash">
        <?= Flasher::flash() ?>
    </div>

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
                <a href="#homepage.php" class="nav-link " aria-current="page">
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
                <a href="user-tambah.php" class="nav-link active text-white">
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


    <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-md-8">
                    <div class="card text-bg-dark" style="border: none; box-shadow: none; ">
                        <div class="card-body">


                            <form action="#" method="POST" enctype="multipart/form-data" class="container">
                            <h2 class="card-title text-center">Tambahkan Data Karyawan</h2>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Karyawan</label>
                                        <input type="text" class="form-control text-bg-dark" name="nama_user">
                                    </div>

                                    <div class="mb-3">
                                        <label for="user" class="form-label">username</label>
                                        <input type="text" class="form-control text-bg-dark" name="username">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control text-bg-dark" name="password">
                                    </div>
                                </div>

                                <div class="card col-md-6 text-bg-dark">
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">FOTO</label>
                                        <input type="file" id="formFile" class="form-control text-bg-dark" name="foto" onchange="prevImage()">
                                        <img id="prevImg" class="mx-auto w-25">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control text-bg-dark" name="email">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control text-bg-dark" name="alamat">
                            </div>

                            <div class="mb-3">
                                <label for="telp" class="form-label">Telpon</label>
                                <input type="number" class="form-control text-bg-dark" name="telp">
                            </div>

<br>

                            <div class="d-grid gap-2">
                                <input type="submit" class="btn btn-primary" name="simpan_data" value="kirim">
                            </div>
                        </form>

</div>
</div>
</div>
</div>
</div>



</main>

</body>

<script>
            function prevImage() {
            const formFile = document.getElementById('formFile');
            const [file] = formFile.files;
            if (file) {
                document.getElementById('prevImg').src = URL.createObjectURL(file)
            }
        }
</script>