<?php
$title = 'KOMPUTER.CO | BARANG';
include '../../header.php';
$check = $system->checkLogin();
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
$vendor = new Vendor();
$barang = new Barang();

$getVendor = $vendor->getVendor();

if (isset($_POST['simpan_data'])){
    $nama = $_POST['nama_barang'];
    $stock = $_POST['stock'];
    $selectVendor = $_POST['vendor'];
    $image = $_FILES['image'];
    $barang->tambahBarang($nama, $stock, $selectVendor, $image);
}
?>

 <!-- Add the Select2 stylesheet -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <!-- Add your custom styles -->
    <style>
         .select2-container--bootstrap {
            background-color: #212529; /* Match your text-bg-dark background color */
            border: 1px solid #ced4da;
            border-radius: .25rem;
            color: #fff; /* Match your text color in text-bg-dark */
        }

        .select2-container--bootstrap .select2-selection--single {
            height: calc(2.25rem + 2px);
        }

        .select2-container--bootstrap .select2-selection--single .select2-selection__rendered {
            line-height: 1.5;
        }

        .select2-container--bootstrap .select2-selection--single .select2-selection__arrow {
            height: calc(2.25rem + 2px);
            position: absolute;
            top: 1px;
            right: 1px;
        }

        .select2-container--bootstrap .select2-dropdown {
            background-color: #212529; /* Match your text-bg-dark background color */
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        .select2-container--bootstrap .select2-results__option {
            color: #fff; /* Match your text color in text-bg-dark */
        }
        .select2-container--bootstrap .select2-search--dropdown .select2-search__field {
            background-color: #212529; /* Match your text-bg-dark background color */
            color: #fff; /* Match your text color in text-bg-dark */
        }
        .card {
            border: none; 
            box-shadow: none; 
        }
    </style>
<body class="text-bg-dark ">
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
                <a href="homepage.php" class="nav-link text-white" aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16"></svg>
                    HOME
                </a>
            </li>
            <br>
            <li>
                <a href="barang-tambah-data.php" class="nav-link active text-white">
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
            <br><br><br>
            <hr>

        </ul>
        <div class="mt-2">
        <a href="tampil-data-barang.php" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16"></svg>
            LIHAT DATA BARANG
        </a>
    </div>
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
                <div class="col-md-6">
                    <div class="card text-bg-dark">
                        <div class="card-body">
                            <h2 class="card-title text-center">Tambahkan Barang</h2>
                            <br>
                            <form action="" method="POST" enctype="multipart/form-data">

                            <div class="mb-3 text-bg-dark"> 
                                <label for="img" class="form-label">Input Gambar</label>
                                <input type="file" class="form-control text-bg-dark" name="image">
                            </div>

                                <br>

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control text-bg-dark" name="nama_barang" placeholder="Tell us your name">
                                </div>

                                <br>

                                <div class="mb-3">
                                    <label for="stock" class="form-label">stock</label>
                                    <input type="number" class="form-control text-bg-dark" name="stock" value="0" readonly>
                                </div>

                                <br>

                                <div class="mb-3">
                                    <label for="vendor" class="form-label">SELECT VENDOR</label>
                                    <select name="vendor" class="js-example-basic-single form-select text-bg-dark" title="Select the vendor" id="vendor">
                                        <?php
                                        if ($getVendor) {
                                            foreach ($getVendor as $items) {
                                                ?>
                                                <option value="<?= $items['id_vendor'] ?>"><?= $items['nama_vendor'] ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo 'No data';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <br>

                                <div class="d-grid gap-2">
                                    <input type="submit" class="btn btn-primary" name="simpan_data" value="kirim">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer">

                    <p class="text-center mt-3 text-secondary">RAMA ARJI RAMWI </p>
                    <p class="text-center mt-3 text-secondary">2024</p>
                </div>
            </div>



        </div>




                        </main>
    
    

  
    </form>               
</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
     $(document).ready(function() {
            $('.js-example-basic-single').select2({
                theme: 'bootstrap'
            });
        });
</script>
