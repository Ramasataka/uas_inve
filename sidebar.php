<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
</head>

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
                <a href="homepage.php" class="nav-link " aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    HOME
                </a>
            </li>
            <br>
            <li>
                <a href="barang-tampil-data.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    BARANG
                </a>
            </li>
            <br>
            <li>
                <a href="vendor-tampil-data.php" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    VENDOR
                </a>
            </li>
            <br>
            <li>
                <a href="tampil-data-user.php" class="nav-link text-white">
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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Tambahkan script jQuery untuk menandai halaman aktif -->
<script>
    $(document).ready(function () {
        // Mendapatkan nama halaman saat ini dari URL
        var current_page = window.location.pathname.split("/").pop();

        // Temukan elemen tautan yang sesuai dengan halaman saat ini dan tambahkan kelas "active"
        $('.nav-link[href$="' + current_page + '"]').addClass('active');
    });
</script>