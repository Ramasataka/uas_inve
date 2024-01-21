<?php
$title = 'KOMPUTER.CO | BARANG MASUK';
include '../../header.php';
$check = $system->checkLogin();
$barang = new Barang();
$barsuk = new Barsuk();
$getbarang = $barang->getBarang();
$dataBarsuk = $barsuk->getDataBarangMasuk();
if(!$check)
{
   $redirectUrl = "../../index.php";
   header("Location: $redirectUrl");
   exit;
}
$user_id = $_SESSION['user'];

if (isset($_POST['simpan_data'])){
    $barangId = $_POST['barang'];
    $jumlah = $_POST['jumlah'];
    $barsuk->addBarang($jumlah, $barangId, $user_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
</head>
<body class="text-bg-dark">

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
                <a href="barang-tambah-data.php" class="nav-link  text-white">
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
                <a href="barsuk.php" class="nav-link active text-white">
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


    <div class="container">
      

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
            Tambahkan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Barang Masuk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="barsuk.php" method="POST">
                            <div class="mb-3">
                                <label for="barang" class="form-label">SELECT BARANG</label>
                                <select name="barang" class="js-example-basic-single form-control" title="Select the barang" id="barang">  
                                    <?php
                                        if($getbarang){
                                            foreach($getbarang as $items){
                                                ?>
                                                    <option value="<?=$items['id_barang'] ?>"><?=$items['nama_barang'] ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo'No data';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="simpan_data" value="Kirim">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="container m-2 mt-5 text-bg-dark">    
    <div class="d-flex justify-content-between ">

        <h2>Data Barang Masuk</h2>
        
    </div>
    <br>
        <!-- Tabel untuk menampilkan data barang masuk -->
        <table class="table table-dark text-bg-dark">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Masuk</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($dataBarsuk){
                        $no = 1;
                        foreach($dataBarsuk as $data){
                            echo "<tr>";
                            echo "<th scope='row'>$no</th>";
                            echo "<td>{$data['tanggal_masuk']}</td>";
                            echo "<td>{$data['nama_barang']}</td>";
                            echo "<td>{$data['jumlah']}</td>";
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo '<tr><td colspan="4">Tidak ada data barang masuk.</td></tr>';
                    }
                ?>
            </tbody>
        </table>
                </div>
    </div>

    <div class="flash">
        <?= Flasher::flash() ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    </main> 
</body>
</html>
